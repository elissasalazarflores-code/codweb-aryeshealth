<?php
/**
 * Contenido predeterminado y utilidades.
 *
 * Los textos marcados como editables se cambian en Apariencia → Personalizar → Aryes Health.
 * Las listas (especialidades, valores, clientes, aliados…) se editan en este archivo.
 *
 * En los títulos, el texto entre asteriscos se muestra en cursiva destacada:
 * "Tecnología que vela por el *paciente crítico*."
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
		'hero_eyebrow'     => 'Tecnología médica para áreas críticas · México',
		'hero_title'       => 'Tecnología que vela por el *paciente crítico*.',
		'hero_lead'        => 'Equipamos su área crítica con anestesia, ventilación y monitoreo confiables. Instalamos, capacitamos y damos mantenimiento.',
		'hero_btn1'        => 'Ver equipos',
		'hero_btn2'        => 'Hablar con un especialista',
		'hero_card1_tag'   => 'Anestesia',
		'hero_card1_title' => 'Compatible con Resonancia Magnética',
		'hero_card1_text'  => 'Máquinas para quirófano y entornos de alta exigencia.',
		'hero_card2_tag'   => 'Monitoreo',
		'hero_card2_num'   => '60',
		'hero_card2_unit'  => 'm',
		'hero_card2_text'  => 'Profundidad en cámaras hiperbáricas.',
		'hero_image'       => '',

		// Quiénes somos.
		'about_title'      => 'Experiencia concentrada donde la vida depende de *cada segundo*.',
		'about_lead'       => 'Aryes Health concentra su experiencia en el soporte vital respiratorio y la vigilancia constante de los signos del paciente. Anestesia, ventilación mecánica y monitoreo son nuestro centro. Desde ahí acompañamos al equipo clínico con tecnología confiable, instalación y mantenimiento.',
		'about_text'       => 'Nos centramos en proyectos que mejoran la eficiencia operativa de los centros de salud. Junto a nuestros clientes enfrentamos el reto de modernizar sus instalaciones y servicios con tecnologías de vanguardia, procedimientos probados y protocolos clínicos actualizados.',
		'about_badge'      => 'De la instalación al mantenimiento',
		'about_image'      => '',

		// Propósito.
		'purpose_eyebrow'  => 'Por qué existimos',
		'purpose_quote'    => 'Cuidar cada respiración y cada latido como si fuera el de los nuestros.',
		'purpose_text'     => 'Detrás de cada máquina de anestesia, cada ventilador y cada monitor hay una persona que confía su momento más frágil a la tecnología que entregamos. Ese es el peso que asumimos.',
		'purpose_image'    => '',

		// Especialidades.
		'specs_title'      => 'Tres líneas críticas. *Una sola responsabilidad.*',
		'specs_aside'      => 'El respiratorio y el monitoreo son nuestra especialidad y nuestra carta de presentación.',

		// Equipos.
		'equip_title'      => 'Innovador, de última tecnología *y accesible.*',
		'equip_aside'      => 'Estamos comprometidos con el cuidado de la salud de las personas y de los pacientes. Cada equipo se entrega instalado, con capacitación y respaldo técnico.',

		// Misión y visión.
		'mv_title'         => 'Para que cada equipo opere con la *precisión* que la vida exige.',
		'mision'           => 'Garantizar a las instituciones de salud el acceso a tecnología de anestesia, ventilación y monitoreo confiable, acompañándolas desde la instalación hasta el mantenimiento, para que cada equipo opere con la precisión que la vida del paciente exige.',
		'vision'           => 'Ser la marca de referencia en soporte vital respiratorio y monitoreo del paciente crítico en México, reconocida porque, donde está Aryes Health, el equipo clínico trabaja con tranquilidad y confianza absoluta.',
		'mv_image'         => '',

		// Valores.
		'values_title'     => 'Lo crítico no admite *improvisación.*',
		'values_aside'     => 'Los principios que ordenan cada decisión y cada conversación con nuestros clientes.',

		// Servicio.
		'service_title'    => 'Un aliado, no un *proveedor distante*.',
		'service_text'     => 'Al trabajar con gobiernos buscamos mejorar la atención primaria y facilitar el acceso a cuidados preventivos y críticos, empoderando a los actores clave. Contamos con un equipo de gestores e ingenieros experimentados en tecnología médica y servicios clínicos, apoyados por una red internacional de asesores.',
		'service_image'    => '',

		// Clientes y alianzas.
		'clients_title'    => 'Presentes en el sector *público y privado.*',
		'clients_aside'    => 'Atendemos instituciones gubernamentales y privadas con soluciones tecnológicas y servicios adaptados a sus necesidades, garantizando acceso a equipos médicos de alta calidad y optimizando su operación.',
		'partners_title'   => 'Marcas líderes en *tecnología médica.*',
		'partners_text'    => 'Comprometidos con la excelencia y la innovación, establecemos alianzas con fabricantes de referencia para ofrecer lo mejor en equipos médicos de diversas especialidades.',

		// Contacto.
		'contact_title'    => 'Cuando la vida del paciente depende de un equipo, ese equipo *no puede fallar*.',
		'contact_text'     => 'Cuéntenos sobre su área crítica. Un especialista de Aryes Health le contactará para proponer la solución adecuada.',
		'contact_email'    => 'admin@aryesht.com',
		'contact_phone'    => '',
		'contact_web'      => 'aryesht.com',
		'contact_city'     => 'Ciudad de México',
		'contact_rfc'      => 'ATE0304018J3',
		'company_name'     => 'Aryes Health Technologies SA de CV',
		'form_recipient'   => '',
		'tagline'          => 'Tecnología que vela por el paciente crítico.',

		// SEO.
		'seo_description'  => 'Aryes Health Technologies equipa áreas críticas con máquinas de anestesia, ventiladores mecánicos y monitores de signos vitales confiables. Instalación, capacitación y mantenimiento en México.',
	);
}

/**
 * Imágenes predeterminadas incluidas en el tema.
 */
function aryes_default_images() {
	return array(
		'hero_image'    => 'prisma.webp',
		'about_image'   => 'quirofano.webp',
		'purpose_image' => 'cristal.webp',
		'mv_image'      => 'especialista.webp',
		'service_image' => 'sala.webp',
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
	return ( '' === $value || null === $value ) ? $default : $value;
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
 * Franja inferior de la portada.
 */
function aryes_hero_strip() {
	return apply_filters(
		'aryes_hero_strip',
		array( 'Anestesia', 'Terapia respiratoria', 'Monitoreo', 'Instalación y mantenimiento' )
	);
}

/**
 * Especialidades. 'tab' enlaza con la pestaña de equipos correspondiente.
 */
function aryes_specialties() {
	return apply_filters(
		'aryes_specialties',
		array(
			array(
				'icon'  => 'anestesia',
				'title' => 'Anestesia',
				'text'  => 'Máquinas de anestesia y soluciones para quirófano, compatibles con entornos de alta exigencia, incluida la Resonancia Magnética.',
				'tab'   => 'anestesia',
			),
			array(
				'icon'  => 'respiratoria',
				'title' => 'Terapia respiratoria',
				'text'  => 'Ventiladores mecánicos pulmonares de última generación para el cuidado del paciente crítico, del neonato al adulto.',
				'tab'   => 'ventilacion',
			),
			array(
				'icon'  => 'monitoreo',
				'title' => 'Monitoreo',
				'text'  => 'Monitores de signos vitales fiables e intuitivos para vigilancia continua. Su equipo los domina desde el primer turno.',
				'tab'   => 'monitoreo',
			),
		)
	);
}

/**
 * Tarjeta "Sin cerrar puertas".
 */
function aryes_open_doors() {
	return apply_filters(
		'aryes_open_doors',
		array(
			'title' => 'Sin cerrar puertas',
			'text'  => 'Cuando un proyecto integral lo exige, sumamos equipamiento y servicios complementarios para resolver de extremo a extremo.',
			'items' => array( 'Rehabilitación', 'Laboratorio', 'Oncología', 'Quirófanos' ),
		)
	);
}

/**
 * Líneas de equipo (pestañas). El 'slug' coincide con la taxonomía "Línea".
 */
function aryes_lines() {
	return apply_filters(
		'aryes_lines',
		array(
			'anestesia'   => array(
				'tab'    => 'Máquinas de anestesia',
				'title'  => 'Máquinas de *anestesia*',
				'text'   => 'Prestamos especial atención al sector de la anestesia, con una amplia gama de productos tecnológicamente avanzados, compatibles y adecuados para su uso en Resonancia Magnética.',
				'points' => array( 'Compatibles con entornos de Resonancia Magnética', 'Diseñadas para quirófanos de alta exigencia', 'Instalación, capacitación y mantenimiento' ),
			),
			'monitoreo'   => array(
				'tab'    => 'Monitores de signos vitales',
				'title'  => 'Monitores de *signos vitales*',
				'text'   => 'Para nuestra línea de monitoreo ofrecemos soluciones compatibles incluso con cámaras hiperbáricas a profundidades de hasta 60 metros. Monitoreo claro e intuitivo: su equipo lo domina desde el primer turno.',
				'points' => array( 'Compatibles con cámaras hiperbáricas hasta 60 m', 'Interfaz clara e intuitiva para todo operador', 'Opciones de monitoreo central' ),
			),
			'ventilacion' => array(
				'tab'    => 'Ventiladores',
				'title'  => 'Ventiladores · *terapia respiratoria*',
				'text'   => 'En el cuidado respiratorio ofrecemos productos de última generación que mejoran significativamente la calidad de vida de los pacientes, del paciente crítico al neonatal.',
				'points' => array( 'Ventilación para paciente crítico', 'Opciones para paciente neonatal', 'Equipos compactos y portátiles' ),
			),
		)
	);
}

/**
 * Equipos incluidos en el tema. Se muestran mientras no se haya
 * publicado ningún equipo en el panel (Equipos → Añadir nuevo).
 */
function aryes_default_products() {
	return apply_filters(
		'aryes_default_products',
		array(
			'anestesia'   => array(
				array( 'Morpheus M', 'Anestesia', 'morpheus-m.webp' ),
				array( 'Morpheus LT/MRI', 'Anestesia · RM', 'morpheus-lt-mri.webp' ),
				array( 'Morpheus ND', 'Anestesia', 'morpheus-nd.webp' ),
			),
			'monitoreo'   => array(
				array( 'Neptune 12', 'Monitoreo', 'neptune-12.webp' ),
				array( 'Neptune D16', 'Central', 'neptune-d16.webp' ),
				array( 'Neptune 12 HBOT', 'Hiperbárico', 'neptune-12-hbot.webp' ),
			),
			'ventilacion' => array(
				array( 'Aria 150', 'Ventilador', 'aria-150.webp' ),
				array( 'Aria 104', 'Ventilador', 'aria-104.webp' ),
				array( 'Sirio Baby 200', 'Neonatal', 'sirio-baby-200.webp' ),
				array( 'Sirio S2/T Spiro', 'Ventilador', 'sirio-s2t-spiro.webp' ),
			),
		)
	);
}

/**
 * Valores.
 */
function aryes_values() {
	return apply_filters(
		'aryes_values',
		array(
			array( 'Confiabilidad', 'Respondemos con equipos probados y soporte que no falla.' ),
			array( 'Excelencia', 'Calidad sin concesiones, en el producto y en cada punto de contacto del servicio.' ),
			array( 'Innovación', 'Tecnología de vanguardia, accesible y pensada para el operador real.' ),
			array( 'Confianza', 'Relaciones de largo plazo construidas sobre transparencia y cumplimiento.' ),
			array( 'Acompañamiento', 'Estamos presentes desde la instalación hasta el último mantenimiento.' ),
			array( 'Integridad', 'Hacemos lo correcto, también cuando nadie está mirando.' ),
		)
	);
}

/**
 * Pasos del servicio.
 */
function aryes_steps() {
	return apply_filters(
		'aryes_steps',
		array(
			array( 'Proyecto', 'Analizamos el área crítica y definimos la solución que la operación del centro de salud necesita.' ),
			array( 'Suministro', 'Equipos de marcas líderes en tecnología médica, con procedimientos probados.' ),
			array( 'Instalación', 'Puesta en marcha a cargo de ingenieros especializados, conforme a protocolos clínicos actualizados.' ),
			array( 'Capacitación', 'Formamos al personal para que domine cada equipo desde el primer turno.' ),
			array( 'Mantenimiento', 'Respaldo técnico continuo para que el soporte vital nunca se detenga.' ),
		)
	);
}

/**
 * Clientes. Cada elemento: array( nombre, descripción opcional ).
 */
function aryes_clients() {
	return apply_filters(
		'aryes_clients',
		array(
			'publico' => array(
				array( 'SEDENA', 'Secretaría de la Defensa Nacional' ),
				array( 'SALUD', 'Secretaría de Salud' ),
				array( 'SEMAR', 'Secretaría de Marina' ),
				array( 'ISSSTE', 'Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado' ),
				array( 'IMSS', 'Instituto Mexicano del Seguro Social' ),
				array( 'IMSS-Bienestar', 'Servicios de salud' ),
				array( 'Hospital General de México', 'Dr. Eduardo Liceaga' ),
				array( 'Servicios de Salud', 'Morelos' ),
			),
			'privado' => array(
				array( 'Hospital Angeles', '' ),
				array( 'Star Médica', 'Hospitales' ),
				array( 'MAC', 'Hospitales' ),
				array( 'Hospitium', 'Solutions' ),
				array( 'Santek Health', '' ),
				array( 'SEE', '' ),
				array( 'Rook', '' ),
				array( 'RookMotion', '' ),
				array( 'Avalia', 'Aliado empresarial' ),
				array( 'Aryes Textil', '' ),
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
		array( 'SEDENA', 'Secretaría de Salud', 'SEMAR', 'ISSSTE', 'IMSS', 'IMSS-Bienestar', 'Hospital General de México', 'Servicios de Salud de Morelos', 'Hospital Angeles', 'Hospitales Star Médica', 'Hospitales MAC', 'Hospitium Solutions' )
	);
}

/**
 * Alianzas estratégicas.
 */
function aryes_partners() {
	return apply_filters(
		'aryes_partners',
		array(
			array( 'SIARE', 'Anestesia · Ventilación · Monitoreo' ),
			array( 'Alma Imaging', 'Rayos X' ),
			array( 'Gentherm', 'Gestión de temperatura del paciente' ),
			array( 'Miniva Med-Tech', 'Med-Tech' ),
		)
	);
}

/**
 * Iconos SVG de las especialidades.
 *
 * @param string $name Nombre del icono.
 * @return string SVG.
 */
function aryes_icon( $name ) {
	$icons = array(
		'anestesia'    => '<rect x="12" y="6" width="24" height="18" rx="3"/><path d="M16 15h4l2-4 3 8 2-4h5"/><path d="M14 24v14M34 24v14M10 38h28"/><circle cx="18" cy="42" r="2"/><circle cx="30" cy="42" r="2"/>',
		'respiratoria' => '<path d="M24 6v14"/><path d="M24 20c-4-2-10 0-12 8-1.5 6-1 12 3 12 5 0 6-5 6-10"/><path d="M24 20c4-2 10 0 12 8 1.5 6 1 12-3 12-5 0-6-5-6-10"/>',
		'monitoreo'    => '<rect x="6" y="8" width="36" height="26" rx="3"/><path d="M10 22h8l3-7 4 13 3-6h10"/><path d="M18 40h12M24 34v6"/>',
	);
	$path = isset( $icons[ $name ] ) ? $icons[ $name ] : $icons['monitoreo'];
	return '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">' . $path . '</svg>';
}
