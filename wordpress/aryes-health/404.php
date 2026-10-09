<?php
/**
 * Página no encontrada.
 *
 * @package Aryes_Health
 */

get_header();
?>
<main id="contenido">
	<?php get_template_part( 'template-parts/page-hero', null, array( 'eyebrow' => 'Error 404', 'title' => __( 'Esta página no existe.', 'aryes-health' ) ) ); ?>
	<section class="section">
		<div class="container container--narrow entry">
			<p><?php esc_html_e( 'Es posible que el enlace haya cambiado. Vuelva al inicio para encontrar lo que busca.', 'aryes-health' ); ?></p>
			<p><a class="btn btn--dark" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Ir al inicio', 'aryes-health' ); ?> <span class="arrow">→</span></a></p>
		</div>
	</section>
</main>
<?php
get_footer();
