<?php
/**
 * Opciones del Personalizador: Apariencia → Personalizar → Aryes Health.
 *
 * @package Aryes_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Definición de secciones y campos.
 * Tipos: text, textarea, email, image.
 */
function aryes_customizer_fields() {
	$hint = __( 'Escriba *entre asteriscos* el texto que quiera resaltar en cursiva.', 'aryes-health' );

	return array(
		'aryes_hero'     => array(
			'title'  => __( 'Portada', 'aryes-health' ),
			'fields' => array(
				'hero_eyebrow'     => array( 'text', __( 'Texto superior', 'aryes-health' ) ),
				'hero_title'       => array( 'textarea', __( 'Título', 'aryes-health' ), $hint ),
				'hero_lead'        => array( 'textarea', __( 'Descripción', 'aryes-health' ) ),
				'hero_btn1'        => array( 'text', __( 'Botón principal', 'aryes-health' ) ),
				'hero_btn2'        => array( 'text', __( 'Botón secundario', 'aryes-health' ) ),
				'hero_card1_tag'   => array( 'text', __( 'Tarjeta 1 · etiqueta', 'aryes-health' ) ),
				'hero_card1_title' => array( 'text', __( 'Tarjeta 1 · título', 'aryes-health' ) ),
				'hero_card1_text'  => array( 'text', __( 'Tarjeta 1 · texto', 'aryes-health' ) ),
				'hero_card2_tag'   => array( 'text', __( 'Tarjeta 2 · etiqueta', 'aryes-health' ) ),
				'hero_card2_num'   => array( 'text', __( 'Tarjeta 2 · cifra', 'aryes-health' ) ),
				'hero_card2_unit'  => array( 'text', __( 'Tarjeta 2 · unidad', 'aryes-health' ) ),
				'hero_card2_text'  => array( 'text', __( 'Tarjeta 2 · texto', 'aryes-health' ) ),
				'hero_image'       => array( 'image', __( 'Imagen de fondo (vertical, fondo oscuro)', 'aryes-health' ) ),
			),
		),
		'aryes_about'    => array(
			'title'  => __( 'Quiénes somos', 'aryes-health' ),
			'fields' => array(
				'about_title' => array( 'textarea', __( 'Título', 'aryes-health' ), $hint ),
				'about_lead'  => array( 'textarea', __( 'Texto', 'aryes-health' ) ),
				'about_badge' => array( 'text', __( 'Tarjeta sobre la foto', 'aryes-health' ) ),
				'about_image' => array( 'image', __( 'Fotografía', 'aryes-health' ) ),
			),
		),
		'aryes_mv'       => array(
			'title'  => __( 'Misión y visión', 'aryes-health' ),
			'fields' => array(
				'mv_title' => array( 'textarea', __( 'Título', 'aryes-health' ), $hint ),
				'mision'   => array( 'textarea', __( 'Misión', 'aryes-health' ) ),
				'vision'   => array( 'textarea', __( 'Visión', 'aryes-health' ) ),
				'mv_image' => array( 'image', __( 'Fotografía de fondo', 'aryes-health' ) ),
			),
		),
		'aryes_turnkey'  => array(
			'title'  => __( 'Proyectos llave en mano', 'aryes-health' ),
			'fields' => array(
				'turnkey_eyebrow' => array( 'text', __( 'Texto superior', 'aryes-health' ) ),
				'turnkey_title'   => array( 'textarea', __( 'Título', 'aryes-health' ), $hint ),
				'turnkey_text'    => array( 'textarea', __( 'Descripción', 'aryes-health' ), $hint ),
			),
		),
		'aryes_commit'   => array(
			'title'  => __( 'Compromiso, clientes y alianza', 'aryes-health' ),
			'fields' => array(
				'commit_title'   => array( 'textarea', __( 'Compromiso · título', 'aryes-health' ), $hint ),
				'commit_lead'    => array( 'textarea', __( 'Compromiso · texto destacado', 'aryes-health' ) ),
				'commit_text'    => array( 'textarea', __( 'Compromiso · texto', 'aryes-health' ) ),
				'supply_title'   => array( 'text', __( 'Compromiso · título de la tarjeta', 'aryes-health' ) ),
				'clients_title'  => array( 'textarea', __( 'Clientes · título', 'aryes-health' ), $hint ),
				'clients_aside'  => array( 'textarea', __( 'Clientes · texto', 'aryes-health' ) ),
				'alliance_text'  => array( 'textarea', __( 'Alianza estratégica · texto', 'aryes-health' ), $hint ),
				'alliance_image' => array( 'image', __( 'Alianza estratégica · imagen', 'aryes-health' ) ),
			),
		),
		'aryes_contact'  => array(
			'title'  => __( 'Contacto y datos de la empresa', 'aryes-health' ),
			'fields' => array(
				'contact_title'   => array( 'textarea', __( 'Título', 'aryes-health' ), $hint ),
				'contact_text'    => array( 'textarea', __( 'Texto', 'aryes-health' ) ),
				'contact_email'   => array( 'email', __( 'Correo visible (opcional)', 'aryes-health' ), __( 'Si se deja vacío no se muestra en la página.', 'aryes-health' ) ),
				'contact_phone'   => array( 'text', __( 'Teléfono (opcional)', 'aryes-health' ) ),
				'contact_web'     => array( 'text', __( 'Sitio web', 'aryes-health' ) ),
				'contact_city'    => array( 'text', __( 'Sede (opcional)', 'aryes-health' ) ),
				'contact_rfc'     => array( 'text', __( 'RFC', 'aryes-health' ) ),
				'company_name'    => array( 'text', __( 'Razón social', 'aryes-health' ) ),
				'form_recipient'  => array( 'email', __( 'Correo que recibe el formulario', 'aryes-health' ), __( 'No se muestra en la página. Si se deja vacío se usa el correo visible o el del administrador.', 'aryes-health' ) ),
				'tagline'         => array( 'text', __( 'Frase del pie de página', 'aryes-health' ) ),
				'seo_description' => array( 'textarea', __( 'Descripción para buscadores', 'aryes-health' ) ),
			),
		),
	);
}

/**
 * Registra el panel en el Personalizador.
 *
 * @param WP_Customize_Manager $wp_customize Gestor.
 */
function aryes_customize_register( $wp_customize ) {
	$defaults = aryes_defaults();

	$wp_customize->add_panel(
		'aryes_panel',
		array(
			'title'       => __( 'Aryes Health', 'aryes-health' ),
			'description' => __( 'Textos, imágenes y datos de la página de inicio.', 'aryes-health' ),
			'priority'    => 30,
		)
	);

	$priority = 10;
	foreach ( aryes_customizer_fields() as $section_id => $section ) {
		$wp_customize->add_section(
			$section_id,
			array(
				'title'    => $section['title'],
				'panel'    => 'aryes_panel',
				'priority' => $priority,
			)
		);
		$priority += 10;

		foreach ( $section['fields'] as $key => $field ) {
			list( $type, $label ) = $field;
			$description          = isset( $field[2] ) ? $field[2] : '';
			$setting_id           = 'aryes_' . $key;

			switch ( $type ) {
				case 'image':
					$sanitize = 'esc_url_raw';
					break;
				case 'email':
					$sanitize = 'sanitize_email';
					break;
				case 'textarea':
					$sanitize = 'sanitize_textarea_field';
					break;
				default:
					$sanitize = 'sanitize_text_field';
			}

			$wp_customize->add_setting(
				$setting_id,
				array(
					'default'           => isset( $defaults[ $key ] ) ? $defaults[ $key ] : '',
					'sanitize_callback' => $sanitize,
					'transport'         => 'refresh',
				)
			);

			if ( 'image' === $type ) {
				$wp_customize->add_control(
					new WP_Customize_Image_Control(
						$wp_customize,
						$setting_id,
						array(
							'label'       => $label,
							'description' => __( 'Si no elige una imagen se usa la incluida en el tema.', 'aryes-health' ),
							'section'     => $section_id,
						)
					)
				);
			} else {
				$wp_customize->add_control(
					$setting_id,
					array(
						'label'       => $label,
						'description' => $description,
						'section'     => $section_id,
						'type'        => 'email' === $type ? 'email' : $type,
					)
				);
			}
		}
	}
}
add_action( 'customize_register', 'aryes_customize_register' );
