<?php
/**
 * Catálogo de equipos administrable: Equipos → Añadir nuevo.
 *
 * Cada equipo tiene título (modelo), imagen destacada (foto del equipo),
 * una línea (Anestesia, Monitoreo o Ventilación) y una etiqueta corta.
 * Mientras una línea no tenga equipos publicados, la portada muestra los incluidos en el tema.
 * En Equipos → Todos los equipos hay un botón para importarlos y editarlos.
 *
 * @package Aryes_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registra el tipo de contenido y la taxonomía.
 */
function aryes_register_equipos() {
	register_post_type(
		'aryes_equipo',
		array(
			'labels'             => array(
				'name'               => __( 'Equipos', 'aryes-health' ),
				'singular_name'      => __( 'Equipo', 'aryes-health' ),
				'add_new'            => __( 'Añadir nuevo', 'aryes-health' ),
				'add_new_item'       => __( 'Añadir equipo', 'aryes-health' ),
				'edit_item'          => __( 'Editar equipo', 'aryes-health' ),
				'new_item'           => __( 'Nuevo equipo', 'aryes-health' ),
				'all_items'          => __( 'Todos los equipos', 'aryes-health' ),
				'search_items'       => __( 'Buscar equipos', 'aryes-health' ),
				'not_found'          => __( 'No hay equipos.', 'aryes-health' ),
				'not_found_in_trash' => __( 'No hay equipos en la papelera.', 'aryes-health' ),
				'featured_image'     => __( 'Fotografía del equipo', 'aryes-health' ),
				'set_featured_image' => __( 'Elegir fotografía', 'aryes-health' ),
			),
			'public'             => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-heart',
			'menu_position'      => 21,
			'supports'           => array( 'title', 'thumbnail', 'page-attributes' ),
			'publicly_queryable' => false,
			'has_archive'        => false,
			'rewrite'            => false,
		)
	);

	register_taxonomy(
		'aryes_linea',
		'aryes_equipo',
		array(
			'labels'            => array(
				'name'          => __( 'Líneas', 'aryes-health' ),
				'singular_name' => __( 'Línea', 'aryes-health' ),
				'all_items'     => __( 'Todas las líneas', 'aryes-health' ),
				'edit_item'     => __( 'Editar línea', 'aryes-health' ),
				'add_new_item'  => __( 'Añadir línea', 'aryes-health' ),
			),
			'hierarchical'      => true,
			'public'            => false,
			'show_ui'           => true,
			'show_in_rest'      => true,
			'show_admin_column' => true,
			'rewrite'           => false,
		)
	);
}
add_action( 'init', 'aryes_register_equipos' );

/**
 * Crea las líneas predeterminadas al activar el tema.
 */
function aryes_seed_lines() {
	aryes_register_equipos();
	foreach ( aryes_lines() as $slug => $line ) {
		if ( ! term_exists( $slug, 'aryes_linea' ) ) {
			wp_insert_term( $line['tab'], 'aryes_linea', array( 'slug' => $slug ) );
		}
	}
}
add_action( 'after_switch_theme', 'aryes_seed_lines' );

/**
 * Campo "Etiqueta" (texto pequeño sobre el nombre, p. ej. "Neonatal").
 */
function aryes_equipo_meta_box() {
	add_meta_box( 'aryes_etiqueta', __( 'Etiqueta', 'aryes-health' ), 'aryes_equipo_meta_box_html', 'aryes_equipo', 'side' );
}
add_action( 'add_meta_boxes', 'aryes_equipo_meta_box' );

/**
 * HTML del campo Etiqueta.
 *
 * @param WP_Post $post Equipo.
 */
function aryes_equipo_meta_box_html( $post ) {
	wp_nonce_field( 'aryes_etiqueta', 'aryes_etiqueta_nonce' );
	$value = get_post_meta( $post->ID, '_aryes_etiqueta', true );
	printf(
		'<p><input type="text" name="aryes_etiqueta" value="%s" class="widefat" placeholder="%s"></p><p class="description">%s</p>',
		esc_attr( $value ),
		esc_attr__( 'Ej.: Neonatal, Hiperbárico, Anestesia · RM', 'aryes-health' ),
		esc_html__( 'Texto corto que aparece sobre el nombre del equipo. Use "Atributos → Orden" para ordenar los equipos.', 'aryes-health' )
	);
}

/**
 * Guarda la etiqueta.
 *
 * @param int $post_id ID.
 */
function aryes_equipo_save( $post_id ) {
	if ( ! isset( $_POST['aryes_etiqueta_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['aryes_etiqueta_nonce'] ), 'aryes_etiqueta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	$value = isset( $_POST['aryes_etiqueta'] ) ? sanitize_text_field( wp_unslash( $_POST['aryes_etiqueta'] ) ) : '';
	update_post_meta( $post_id, '_aryes_etiqueta', $value );
}
add_action( 'save_post_aryes_equipo', 'aryes_equipo_save' );

/**
 * Equipos de una línea para la portada.
 * Si la línea no tiene equipos publicados, se muestran los incluidos en el tema.
 *
 * @param string $line Slug de la línea.
 * @return array Lista de array( 'name', 'label', 'img', 'alt' ).
 */
function aryes_products( $line ) {
	$items = array();
	$posts = get_posts(
		array(
			'post_type'      => 'aryes_equipo',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => array(
				'menu_order' => 'ASC',
				'title'      => 'ASC',
			),
			'tax_query'      => array( // phpcs:ignore WordPress.DB.SlowDBQuery
				array(
					'taxonomy' => 'aryes_linea',
					'field'    => 'slug',
					'terms'    => $line,
				),
			),
		)
	);

	foreach ( $posts as $p ) {
		$items[] = array(
			'name'  => get_the_title( $p ),
			'label' => get_post_meta( $p->ID, '_aryes_etiqueta', true ),
			'img'   => get_the_post_thumbnail_url( $p, 'medium_large' ),
			'alt'   => get_the_title( $p ),
		);
	}
	if ( $items ) {
		return $items;
	}

	$defaults = aryes_default_products();
	if ( empty( $defaults[ $line ] ) ) {
		return $items;
	}
	foreach ( $defaults[ $line ] as $row ) {
		$items[] = array(
			'name'  => $row[0],
			'label' => $row[1],
			'img'   => aryes_asset( 'img/equipos/' . $row[2] ),
			'alt'   => $row[0],
		);
	}
	return $items;
}

/**
 * Aviso en Equipos: ofrece importar los equipos de ejemplo para editarlos desde el panel.
 */
function aryes_import_notice() {
	$screen = get_current_screen();
	if ( ! $screen || 'edit-aryes_equipo' !== $screen->id || ! current_user_can( 'edit_posts' ) ) {
		return;
	}
	// phpcs:ignore WordPress.Security.NonceVerification
	if ( isset( $_GET['aryes_imported'] ) ) {
		printf(
			'<div class="notice notice-success is-dismissible"><p>%s</p></div>',
			/* translators: %d: número de equipos */
			esc_html( sprintf( __( 'Se importaron %d equipos. Ya puede editarlos, cambiar su foto o añadir nuevos.', 'aryes-health' ), absint( $_GET['aryes_imported'] ) ) ) // phpcs:ignore WordPress.Security.NonceVerification
		);
		return;
	}
	$count = wp_count_posts( 'aryes_equipo' );
	if ( ( (int) $count->publish + (int) $count->draft + (int) $count->private ) > 0 ) {
		return;
	}
	$url = wp_nonce_url( admin_url( 'admin-post.php?action=aryes_import_equipos' ), 'aryes_import_equipos' );
	printf(
		'<div class="notice notice-info"><p><strong>%s</strong> %s</p><p><a href="%s" class="button button-primary">%s</a></p></div>',
		esc_html__( 'La portada muestra los equipos incluidos en el tema.', 'aryes-health' ),
		esc_html__( 'Impórtelos aquí para poder editarlos, ordenarlos o eliminarlos. Cada línea muestra los equipos del tema hasta que tenga al menos un equipo publicado.', 'aryes-health' ),
		esc_url( $url ),
		esc_html__( 'Importar equipos de ejemplo', 'aryes-health' )
	);
}
add_action( 'admin_notices', 'aryes_import_notice' );

/**
 * Importa los equipos incluidos en el tema, con sus fotografías.
 */
function aryes_import_equipos() {
	if ( ! current_user_can( 'edit_posts' ) || ! current_user_can( 'upload_files' ) ) {
		wp_die( esc_html__( 'No tiene permisos para realizar esta acción.', 'aryes-health' ) );
	}
	check_admin_referer( 'aryes_import_equipos' );

	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	aryes_seed_lines();

	$created = 0;
	foreach ( aryes_default_products() as $line => $rows ) {
		$order = 0;
		foreach ( $rows as $row ) {
			$order++;
			$exists = get_posts(
				array(
					'post_type'      => 'aryes_equipo',
					'title'          => $row[0],
					'post_status'    => 'any',
					'posts_per_page' => 1,
					'fields'         => 'ids',
				)
			);
			if ( $exists ) {
				continue;
			}

			$post_id = wp_insert_post(
				array(
					'post_type'   => 'aryes_equipo',
					'post_title'  => $row[0],
					'post_status' => 'publish',
					'menu_order'  => $order,
				)
			);
			if ( ! $post_id || is_wp_error( $post_id ) ) {
				continue;
			}
			wp_set_object_terms( $post_id, $line, 'aryes_linea' );
			update_post_meta( $post_id, '_aryes_etiqueta', $row[1] );

			$source = ARYES_DIR . '/assets/img/equipos/' . $row[2];
			if ( file_exists( $source ) ) {
				$tmp = wp_tempnam( $row[2] );
				if ( $tmp && copy( $source, $tmp ) ) {
					$file   = array(
						'name'     => $row[2],
						'tmp_name' => $tmp,
					);
					$att_id = media_handle_sideload( $file, $post_id, $row[0] );
					if ( is_wp_error( $att_id ) ) {
						wp_delete_file( $tmp );
					} else {
						set_post_thumbnail( $post_id, $att_id );
					}
				}
			}
			$created++;
		}
	}

	wp_safe_redirect( admin_url( 'edit.php?post_type=aryes_equipo&aryes_imported=' . $created ) );
	exit;
}
add_action( 'admin_post_aryes_import_equipos', 'aryes_import_equipos' );
