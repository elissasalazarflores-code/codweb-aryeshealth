<?php
/**
 * Formulario de contacto: envía la solicitud por correo con wp_mail().
 *
 * Para una entrega fiable se recomienda configurar SMTP en el hosting
 * (por ejemplo con el plugin WP Mail SMTP).
 *
 * @package Aryes_Health
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Procesa el envío del formulario.
 */
function aryes_handle_contact() {
	$back = wp_get_referer() ? wp_get_referer() : home_url( '/' );
	$back = remove_query_arg( 'aryes_form', $back );
	$back = preg_replace( '/#.*$/', '', $back );

	$redirect = function ( $status ) use ( $back ) {
		wp_safe_redirect( add_query_arg( 'aryes_form', $status, $back ) . '#contacto' );
		exit;
	};

	if ( ! isset( $_POST['aryes_contact_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['aryes_contact_nonce'] ), 'aryes_contact' ) ) {
		$redirect( 'error' );
	}

	// Campo trampa contra spam: los usuarios no lo ven.
	if ( ! empty( $_POST['empresa_web'] ) ) {
		$redirect( 'ok' );
	}

	// Límite simple: un envío cada 30 segundos por IP.
	$ip  = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
	$key = 'aryes_contact_' . md5( $ip );
	if ( get_transient( $key ) ) {
		$redirect( 'wait' );
	}

	$nombre      = isset( $_POST['nombre'] ) ? sanitize_text_field( wp_unslash( $_POST['nombre'] ) ) : '';
	$institucion = isset( $_POST['institucion'] ) ? sanitize_text_field( wp_unslash( $_POST['institucion'] ) ) : '';
	$correo      = isset( $_POST['correo'] ) ? sanitize_email( wp_unslash( $_POST['correo'] ) ) : '';
	$telefono    = isset( $_POST['telefono'] ) ? sanitize_text_field( wp_unslash( $_POST['telefono'] ) ) : '';
	$mensaje     = isset( $_POST['mensaje'] ) ? sanitize_textarea_field( wp_unslash( $_POST['mensaje'] ) ) : '';
	$lineas      = isset( $_POST['linea'] ) && is_array( $_POST['linea'] ) ? array_map( 'sanitize_text_field', wp_unslash( $_POST['linea'] ) ) : array();

	if ( '' === $nombre || ! is_email( $correo ) ) {
		$redirect( 'invalid' );
	}

	$subject = sprintf(
		/* translators: %s: institución o nombre */
		__( 'Solicitud de información — %s', 'aryes-health' ),
		$institucion ? $institucion : $nombre
	);

	$body = implode(
		"\n",
		array(
			__( 'Nueva solicitud desde el sitio web', 'aryes-health' ),
			'',
			__( 'Nombre: ', 'aryes-health' ) . $nombre,
			__( 'Institución: ', 'aryes-health' ) . ( $institucion ? $institucion : '—' ),
			__( 'Correo: ', 'aryes-health' ) . $correo,
			__( 'Teléfono: ', 'aryes-health' ) . ( $telefono ? $telefono : '—' ),
			__( 'Área de interés: ', 'aryes-health' ) . ( $lineas ? implode( ', ', $lineas ) : '—' ),
			'',
			__( 'Mensaje:', 'aryes-health' ),
			$mensaje ? $mensaje : '—',
		)
	);

	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $nombre . ' <' . $correo . '>',
	);

	$sent = wp_mail( aryes_form_recipient(), $subject, $body, $headers );

	set_transient( $key, 1, 30 );

	/**
	 * Acción tras recibir una solicitud (útil para guardarla en un CRM).
	 *
	 * @param array $data Datos enviados.
	 * @param bool  $sent Si el correo se envió.
	 */
	do_action( 'aryes_contact_submitted', compact( 'nombre', 'institucion', 'correo', 'telefono', 'mensaje', 'lineas' ), $sent );

	$redirect( $sent ? 'ok' : 'error' );
}
add_action( 'admin_post_nopriv_aryes_contact', 'aryes_handle_contact' );
add_action( 'admin_post_aryes_contact', 'aryes_handle_contact' );

/**
 * Mensaje de estado del formulario.
 *
 * @return array|null array( 'type', 'text' ).
 */
function aryes_contact_status() {
	if ( empty( $_GET['aryes_form'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification
		return null;
	}
	$status   = sanitize_key( $_GET['aryes_form'] ); // phpcs:ignore WordPress.Security.NonceVerification
	$messages = array(
		'ok'      => array( 'ok', __( 'Gracias. Recibimos su solicitud y un especialista le contactará pronto.', 'aryes-health' ) ),
		'invalid' => array( 'error', __( 'Por favor complete su nombre y un correo válido.', 'aryes-health' ) ),
		'wait'    => array( 'error', __( 'Ya recibimos un envío hace unos segundos. Intente de nuevo en un momento.', 'aryes-health' ) ),
		'error'   => array( 'error', __( 'No pudimos enviar su solicitud. Escríbanos directamente por correo.', 'aryes-health' ) ),
	);
	return isset( $messages[ $status ] ) ? $messages[ $status ] : null;
}
