<?php
/**
 * Cabecera.
 *
 * @package Aryes_Health
 */

$contact_url = is_front_page() ? '#contacto' : home_url( '/#contacto' );
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="screen-reader-text" href="#contenido"><?php esc_html_e( 'Saltar al contenido', 'aryes-health' ); ?></a>

<svg width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false">
	<defs>
		<linearGradient id="ondaClaro" x1="0" y1="1" x2="1" y2="0">
			<stop offset="0" stop-color="#262E33"/>
			<stop offset=".55" stop-color="#1F7FA3"/>
			<stop offset="1" stop-color="#5DB6E2"/>
		</linearGradient>
		<linearGradient id="ondaOscuro" x1="0" y1="1" x2="1" y2="0">
			<stop offset="0" stop-color="#FFFFFF"/>
			<stop offset=".5" stop-color="#C9E0F2"/>
			<stop offset="1" stop-color="#5DB6E2"/>
		</linearGradient>
		<symbol id="simbolo" viewBox="0 0 100 100">
			<path class="s-a" style="fill:var(--mark-a, currentColor)" d="M41 2H59L90 96H71L50 32L40 62H21Z"/>
			<path class="s-onda" style="fill:var(--mark-onda, url(#ondaOscuro))" d="M10 96C14 80 18 68 30 63C46 56 70 60 98 44C80 60 56 68 42 70C34 72 31 82 29 96Z"/>
		</symbol>
	</defs>
</svg>

<header class="nav" id="nav">
	<div class="nav__inner">
		<?php aryes_logo(); ?>
		<nav class="nav__links" aria-label="<?php esc_attr_e( 'Principal', 'aryes-health' ); ?>">
			<?php aryes_menu( 'primary' ); ?>
		</nav>
		<a href="<?php echo esc_url( $contact_url ); ?>" class="btn btn--glass nav__cta"><?php esc_html_e( 'Contactar', 'aryes-health' ); ?> <span class="arrow">→</span></a>
		<button class="nav__burger" id="burger" aria-label="<?php esc_attr_e( 'Abrir menú', 'aryes-health' ); ?>" aria-expanded="false" aria-controls="mobileMenu"><span></span><span></span></button>
	</div>
	<div class="nav__mobile" id="mobileMenu">
		<?php aryes_menu( 'primary' ); ?>
		<a href="<?php echo esc_url( $contact_url ); ?>" class="btn btn--light"><?php esc_html_e( 'Contactar', 'aryes-health' ); ?> →</a>
	</div>
</header>
