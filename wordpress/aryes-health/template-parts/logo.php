<?php
/**
 * Logo de la marca. Si se sube un logo en Apariencia → Personalizar → Identidad del sitio,
 * se usa ese archivo; si no, se dibuja el logo de Aryes Health.
 *
 * @package Aryes_Health
 */

$extra = ! empty( $args['class'] ) ? ' ' . $args['class'] : '';
$home  = home_url( '/' );

if ( has_custom_logo() ) {
	$logo_id = get_theme_mod( 'custom_logo' );
	printf(
		'<a href="%s" class="logo logo--custom%s" rel="home">%s</a>',
		esc_url( $home ),
		esc_attr( $extra ),
		wp_get_attachment_image( $logo_id, 'full', false, array( 'alt' => get_bloginfo( 'name' ) ) )
	);
	return;
}
?>
<a href="<?php echo esc_url( $home ); ?>" class="logo<?php echo esc_attr( $extra ); ?>" rel="home" aria-label="<?php esc_attr_e( 'Aryes Health Technologies, inicio', 'aryes-health' ); ?>">
	<svg class="logo__mark" aria-hidden="true"><use href="#simbolo"/></svg>
	<span class="logo__type">
		<span class="logo__name">Aryes<i></i>Health</span>
		<span class="logo__sub">Technologies</span>
	</span>
</a>
