<?php
/**
 * Contenido predeterminado y utilidades.
 *
 * Los textos marcados como editables se cambian en Apariencia → Personalizar → Aryes Health.
 * Las listas (etapas, pilares, equipamientos, clientes…) se editan en este archivo.
 *
 * En los títulos, el texto entre asteriscos se muestra en cursiva destacada:
 * "Integración hospitalaria *llave en mano*."
 *
 * @package Aryes_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Valores predeterminados de los campos del Personalizador.
 */
function aryes_defaults() {
	return array(
		// Portada.
		'hero_eyebrow'     => 'Aryes Health Technologies SA de CV',
		'hero_title'       => 'Integración hospitalaria *llave en mano*.',
		'hero_lead'        => 'Diseñamos, construimos, equipamos y ponemos en marcha la infraestructura de hospitales y clínicas, con un solo responsable de principio a fin.',
		'hero_btn1'        => 'Conocer el modelo',
		'hero_btn2'        => 'Hablar con un especialista',
		'hero_card1_tag'   => 'Llave en mano',
		'hero_card1_title' => 'Un solo responsable',
		'hero_card1_text'  => 'Del diseño a la puesta en marcha de su hospital o clínica.',
		'hero_card2_tag'   => 'Proyecto integral',
		'hero_card2_num'   => '5',
		'hero_card2_unit'  => 'etapas',
		'hero_card2_text'  => 'Diseñar, construir, equipar, poner en marcha y certificar.',
		'hero_image'       => '',

		// Quiénes somos.
		'about_title'      => 'Proyectos que mejoran la *eficiencia operativa* de un centro de salud.',
		'about_lead'       => 'En Aryes Health nos centramos en los proyectos con la finalidad de mejorar la eficiencia operativa de un centro de salud. Hacemos frente, junto a nuestros clientes, al reto de modernizar sus instalaciones y servicios, proporcionando tecnologías vanguardistas, procedimientos probados y protocolos clínicos actualizados.',
		'about_badge'      => 'Integración hospitalaria llave en mano',
		'about_image'      => '',

		// Misión y visión.
		'mv_title'         => 'Para que cada área opere con la *precisión* que la vida del paciente exige.',
		'mision'           => 'Garantizar a las instituciones de salud el acceso a infraestructura y tecnología médica confiable, acompañándolas desde el diseño y la instalación hasta el mantenimiento, para que cada área opere con la precisión que la vida del paciente exige.',
		'vision'           => 'Ser la marca de referencia en integración hospitalaria en México, reconocida porque, donde está Aryes Health, el equipo clínico trabaja con tranquilidad y confianza absoluta.',
		'mv_image'         => '',

		// Proyectos llave en mano.
		'turnkey_eyebrow'  => 'Integración hospitalaria',
		'turnkey_title'    => 'Proyectos *llave en mano*.',
		'turnkey_text'     => 'Un proyecto de integración hospitalaria llave en mano es una solución integral en la que un solo proveedor o contratista asume la responsabilidad total de *diseñar, construir, equipar, poner en marcha* y, en muchos casos, *gestionar o certificar* la infraestructura de un hospital o clínica.',

		// Compromiso.
		'commit_title'     => 'Servicios completos, *desde la instalación hasta el mantenimiento*.',
		'commit_lead'      => 'Al trabajar con gobiernos, buscamos mejorar la atención primaria para facilitar el acceso a cuidados preventivos y críticos. Nuestra estrategia se basa en empoderar a actores clave.',
		'commit_text'      => 'Contamos con un equipo de gestores e ingenieros experimentados en tecnología médica y servicios clínicos, apoyados por una red internacional de asesores. En Aryes Health ofrecemos servicios completos, desde instalación hasta mantenimiento, como parte de nuestro compromiso con el cliente.',
		'supply_title'     => 'Otros equipamientos que suministramos',

		// Clientes.
		'clients_title'    => 'Presentes en el sector *privado y público.*',
		'clients_aside'    => 'Atendemos a instituciones gubernamentales y privadas, ofreciendo soluciones tecnológicas y servicios adaptados a sus necesidades. Nos enfocamos en garantizar acceso a equipos médicos de alta calidad, optimizando su operación en el sector salud.',

		// Alianza estratégica.
		'alliance_text'    => 'Comprometidos con la excelencia y la innovación, establecemos alianzas con *marcas líderes en tecnología médica* para ofrecerte lo mejor en equipos médicos de diversas especialidades.',
		'alliance_image'   => '',

		// Contacto.
		'contact_title'    => 'Conversemos sobre su *proyecto*.',
		'contact_text'     => 'Cuéntenos sobre su hospital o clínica. Un especialista de Aryes Health le contactará para proponer la solución adecuada.',
		'contact_email'    => '',
		'contact_phone'    => '',
		'contact_web'      => 'www.aryesht.com',
		'contact_city'     => '',
		'contact_rfc'      => 'ATE0304018J3',
		'company_name'     => 'Aryes Health Technologies SA de CV',
		'form_recipient'   => 'admin@aryesht.com',
		'tagline'          => 'Integración hospitalaria llave en mano.',

		// SEO.
		'seo_description'  => 'Aryes Health Technologies desarrolla proyectos de integración hospitalaria llave en mano: diseñamos, construimos, equipamos, ponemos en marcha y certificamos la infraestructura de hospitales y clínicas en México.',
	);
}

/**
 * Imágenes predeterminadas incluidas en el tema.
 */
function aryes_default_images() {
	return array(
		'hero_image'     => 'prisma.webp',
		'about_image'    => 'especialista.webp',
		'mv_image'       => 'quirofano.webp',
		'alliance_image' => 'alianza.webp',
	);
}

/**
 * Devuelve un valor del Personalizador (o su predeterminado).
 *
 * @param string $key Clave.
 * @return string
 */
function aryes_mod( $key ) {
	$defaults = aryes_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	$value    = get_theme_mod( 'aryes_' . $key, $default );
	return ( null === $value ) ? $default : $value;
}

/**
 * URL de una imagen editable (o la incluida en el tema).
 *
 * @param string $key Clave.
 * @return string
 */
function aryes_img( $key ) {
	$custom = get_theme_mod( 'aryes_' . $key );
	if ( $custom ) {
		return $custom;
	}
	$images = aryes_default_images();
	return isset( $images[ $key ] ) ? aryes_asset( 'img/' . $images[ $key ] ) : '';
}

/**
 * URL de un archivo dentro de assets/.
 *
 * @param string $path Ruta relativa.
 * @return string
 */
function aryes_asset( $path ) {
	return ARYES_URI . '/assets/' . ltrim( $path, '/' );
}

/**
 * Escapa un texto y convierte *texto* en <em>texto</em>.
 *
 * @param string $text Texto.
 * @return string HTML seguro.
 */
function aryes_rich( $text ) {
	$html = esc_html( $text );
	return preg_replace( '/\*(.+?)\*/u', '<em>$1</em>', $html );
}

/**
 * Imprime un texto editable con formato.
 *
 * @param string $key Clave.
 */
function aryes_e( $key ) {
	echo aryes_rich( aryes_mod( $key ) ); // phpcs:ignore WordPress.Security.EscapeOutput -- escapado en aryes_rich().
}

/**
 * Correo que recibe las solicitudes del formulario.
 */
function aryes_form_recipient() {
	$to = aryes_mod( 'form_recipient' );
	if ( ! is_email( $to ) ) {
		$to = aryes_mod( 'contact_email' );
	}
	if ( ! is_email( $to ) ) {
		$to = get_option( 'admin_email' );
	}
	return $to;
}

/* --------------------------------------------------------------------------
 * Listas de contenido (editar aquí).
 * Cada lista pasa por un filtro, por lo que también puede modificarse
 * desde un tema hijo o un plugin.
 * ----------------------------------------------------------------------- */

/**
 * Etapas del proyecto llave en mano (también se muestran en la franja de la portada).
 * Iconos disponibles: disenar, construir, equipar, marcha, certificar.
 */
function aryes_stages() {
	return apply_filters(
		'aryes_stages',
		array(
			array( 'Diseñar', 'disenar' ),
			array( 'Construir', 'construir' ),
			array( 'Equipar', 'equipar' ),
			array( 'Poner en marcha', 'marcha' ),
			array( 'Gestionar y certificar', 'certificar' ),
		)
	);
}

/**
 * Pilares de Quiénes somos.
 */
function aryes_pillars() {
	return apply_filters(
		'aryes_pillars',
		array( 'Tecnologías vanguardistas', 'Procedimientos probados', 'Protocolos clínicos actualizados' )
	);
}

/**
 * Otros equipamientos que suministramos.
 */
function aryes_supply() {
	return apply_filters(
		'aryes_supply',
		array( 'Rehabilitación', 'Laboratorio', 'Oncología', 'Quirófanos' )
	);
}

/**
 * Opciones de "Área de interés" en el formulario.
 */
function aryes_interest_options() {
	return apply_filters(
		'aryes_interest_options',
		array_merge( array( 'Proyecto llave en mano' ), aryes_supply() )
	);
}

/**
 * Clientes. Cada elemento: array( nombre, archivo del logo en assets/img/clientes ).
 * Si el archivo se deja vacío se muestra el nombre en texto.
 */
function aryes_clients() {
	return apply_filters(
		'aryes_clients',
		array(
			'privado' => array(
				array( 'Avalia', 'avalia.webp' ),
				array( 'SEE', 'see.webp' ),
				array( 'RookMotion', 'rookmotion.webp' ),
				array( 'Santek Health', 'santek-health.webp' ),
				array( 'Hospital Angeles', 'hospital-angeles.webp' ),
				array( 'Hospitales Star Médica', 'star-medica.webp' ),
				array( 'Hospitales MAC', 'hospitales-mac.webp' ),
			),
			'publico' => array(
				array( 'IMSS', 'imss.webp' ),
				array( 'IMSS-Bienestar', 'imss-bienestar.webp' ),
				array( 'ISSSTE', 'issste.webp' ),
				array( 'Secretaría de Salud', 'salud.webp' ),
				array( 'SEDENA, Secretaría de la Defensa Nacional', 'sedena.webp' ),
				array( 'SEMAR, Secretaría de Marina', 'semar.webp' ),
				array( 'Hospital General de México Dr. Eduardo Liceaga', 'hospital-general-mexico.webp' ),
				array( 'Servicios de Salud de Morelos', 'salud-morelos.webp' ),
			),
		)
	);
}

/**
 * Nombres que recorren la marquesina.
 */
function aryes_marquee() {
	return apply_filters(
		'aryes_marquee',
		array( 'IMSS', 'IMSS-Bienestar', 'ISSSTE', 'Secretaría de Salud', 'SEDENA', 'SEMAR', 'Hospital General de México', 'Servicios de Salud de Morelos', 'Hospital Angeles', 'Hospitales Star Médica', 'Hospitales MAC', 'Santek Health', 'Avalia', 'SEE', 'RookMotion' )
	);
}

/**
 * Iconos SVG de las etapas.
 *
 * @param string $name Nombre del icono.
 * @return string SVG.
 */
function aryes_icon( $name ) {
	$icons = array(
		'disenar'    => '<path d="M8 40 40 8"/><path d="M8 40h32V8"/><path d="M14 40v-4M20 40v-6M26 40v-4M32 40v-6M40 34h-4M40 28h-6M40 22h-4M40 16h-6"/>',
		'construir'  => '<path d="M6 42h36"/><path d="M10 42V18l14-10 14 10v24"/><path d="M19 42V30h10v12"/><path d="M24 18v4M22 20h4"/>',
		'equipar'    => '<rect x="6" y="8" width="36" height="24" rx="3"/><path d="M10 21h7l3-6 4 12 3-6h11"/><path d="M18 40h12M24 32v8"/>',
		'marcha'     => '<circle cx="24" cy="24" r="17"/><path d="M24 7v6M24 35v6M7 24h6M35 24h6"/><path d="m20 18 10 6-10 6z"/>',
		'certificar' => '<path d="M24 5 9 11v11c0 10 6.5 17 15 21 8.5-4 15-11 15-21V11z"/><path d="m17 24 5 5 9-10"/>',
	);
	$path = isset( $icons[ $name ] ) ? $icons[ $name ] : $icons['certificar'];
	return '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">' . $path . '</svg>';
}
