<?php
/**
 * Listado de entradas, archivos y resultados de búsqueda.
 *
 * @package Aryes_Health
 */

get_header();

if ( is_search() ) {
	/* translators: %s: término buscado */
	$heading = sprintf( __( 'Resultados para “%s”', 'aryes-health' ), get_search_query() );
} elseif ( is_archive() ) {
	$heading = get_the_archive_title();
} elseif ( is_home() && get_option( 'page_for_posts' ) ) {
	$heading = get_the_title( get_option( 'page_for_posts' ) );
} else {
	$heading = __( 'Noticias', 'aryes-health' );
}
?>
<main id="contenido">
	<?php get_template_part( 'template-parts/page-hero', null, array( 'eyebrow' => get_bloginfo( 'name' ), 'title' => $heading ) ); ?>
	<section class="section">
		<div class="container">
			<?php if ( have_posts() ) : ?>
				<div class="posts">
					<?php
					while ( have_posts() ) :
						the_post();
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
							<a href="<?php the_permalink(); ?>" class="post-card__img">
								<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail( 'medium_large' );
								} else {
									echo '<img src="' . esc_url( aryes_img( 'purpose_image' ) ) . '" alt="" loading="lazy">';
								}
								?>
							</a>
							<div class="post-card__body">
								<span class="post-card__date"><?php echo esc_html( get_the_date() ); ?></span>
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
								<a href="<?php the_permalink(); ?>" class="link"><?php esc_html_e( 'Leer más', 'aryes-health' ); ?> <span class="arrow">→</span></a>
							</div>
						</article>
					<?php endwhile; ?>
				</div>
				<div class="pagination">
					<?php
					the_posts_pagination(
						array(
							'prev_text' => '←',
							'next_text' => '→',
						)
					);
					?>
				</div>
			<?php else : ?>
				<div class="container--narrow entry">
					<p><?php esc_html_e( 'No encontramos contenido. Intente con otra búsqueda.', 'aryes-health' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php
get_footer();
