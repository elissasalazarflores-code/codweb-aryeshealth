<?php
/**
 * Aryes Health — funciones del tema.
 *
 * @package Aryes_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ARYES_VERSION', '1.0.0' );
define( 'ARYES_DIR', get_template_directory() );
define( 'ARYES_URI', get_template_directory_uri() );

require ARYES_DIR . '/inc/content.php';
require ARYES_DIR . '/inc/customizer.php';
require ARYES_DIR . '/inc/equipos.php';
require ARYES_DIR . '/inc/contact.php';

/**
 * Configuración básica del tema.
 */
function aryes_setup() {
	load_theme_textdomain( 'aryes-health', ARYES_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 260,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Menú principal', 'aryes-health' ),
			'footer'  => __( 'Menú del pie de página', 'aryes-health' ),
		)
	);
}
add_action( 'after_setup_theme', 'aryes_setup' );

/**
 * Estilos y scripts.
 */
function aryes_assets() {
	wp_enqueue_style(
		'aryes-fonts',
		'https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Manrope:wght@400;500;600;700&family=Source+Serif+4:opsz,wght@8..60,300;8..60,400;8..60,500&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'aryes-main', ARYES_URI . '/assets/css/styles.css', array( 'aryes-fonts' ), ARYES_VERSION );
	wp_enqueue_style( 'aryes-wp', get_stylesheet_uri(), array( 'aryes-main' ), ARYES_VERSION );
	wp_enqueue_script( 'aryes-main', ARYES_URI . '/assets/js/main.js', array(), ARYES_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'aryes_assets' );

/**
 * Preconexión a Google Fonts.
 */
function aryes_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = 'https://fonts.googleapis.com';
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'aryes_resource_hints', 10, 2 );

/**
 * Favicon por defecto (si no se configuró un "Icono del sitio").
 */
function aryes_favicon() {
	if ( ! has_site_icon() ) {
		echo '<link rel="icon" href="' . esc_url( ARYES_URI . '/assets/img/favicon.svg' ) . '" type="image/svg+xml">' . "\n";
	}
	echo '<meta name="theme-color" content="#0B1520">' . "\n";
}
add_action( 'wp_head', 'aryes_favicon', 2 );

/**
 * Meta descripción en la portada (si no hay un plugin SEO activo).
 */
function aryes_meta_description() {
	if ( ! is_front_page() || defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) ) {
		return;
	}
	$desc = aryes_mod( 'seo_description' );
	if ( $desc ) {
		echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'aryes_meta_description', 1 );

/**
 * Clases del body: distingue la portada de las páginas interiores.
 */
function aryes_body_class( $classes ) {
	$classes[] = is_front_page() ? 'is-home' : 'is-inner';
	return $classes;
}
add_filter( 'body_class', 'aryes_body_class' );

/**
 * Menú por defecto cuando no se ha asignado ninguno.
 * En páginas interiores los enlaces apuntan a las secciones de la portada.
 */
function aryes_default_menu_items() {
	$base = is_front_page() ? '' : home_url( '/' );
	return array(
		$base . '#nosotros'       => __( 'Nosotros', 'aryes-health' ),
		$base . '#especialidades' => __( 'Especialidades', 'aryes-health' ),
		$base . '#equipos'        => __( 'Equipos', 'aryes-health' ),
		$base . '#servicio'       => __( 'Servicio', 'aryes-health' ),
		$base . '#clientes'       => __( 'Clientes', 'aryes-health' ),
	);
}

/**
 * Imprime un menú: el asignado en Apariencia → Menús o el predeterminado.
 *
 * @param string $location Ubicación del menú.
 */
function aryes_menu( $location = 'primary' ) {
	if ( has_nav_menu( $location ) ) {
		wp_nav_menu(
			array(
				'theme_location' => $location,
				'container'      => false,
				'items_wrap'     => '%3$s',
				'depth'          => 1,
				'fallback_cb'    => false,
				'walker'         => new Aryes_Flat_Walker(),
			)
		);
		return;
	}
	foreach ( aryes_default_menu_items() as $url => $label ) {
		printf( '<a href="%s">%s</a>', esc_url( $url ), esc_html( $label ) );
	}
}

/**
 * Walker que imprime enlaces sin <ul>/<li> (para el diseño del menú).
 */
class Aryes_Flat_Walker extends Walker_Nav_Menu {
	public function start_lvl( &$output, $depth = 0, $args = null ) {}
	public function end_lvl( &$output, $depth = 0, $args = null ) {}
	public function end_el( &$output, $data_object, $depth = 0, $args = null ) {}
	public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
		$classes = in_array( 'current-menu-item', (array) $data_object->classes, true ) ? ' class="is-current"' : '';
		$target  = $data_object->target ? ' target="' . esc_attr( $data_object->target ) . '" rel="noopener"' : '';
		$output .= sprintf(
			'<a href="%s"%s%s>%s</a>',
			esc_url( $data_object->url ),
			$classes,
			$target,
			esc_html( $data_object->title )
		);
	}
}

/**
 * Logo de la marca (o el logo personalizado si se subió uno).
 *
 * @param string $extra_class Clase adicional.
 */
function aryes_logo( $extra_class = '' ) {
	get_template_part( 'template-parts/logo', null, array( 'class' => $extra_class ) );
}
