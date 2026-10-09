<?php
/**
 * Páginas.
 *
 * @package Aryes_Health
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<main id="contenido">
		<?php get_template_part( 'template-parts/page-hero', null, array( 'eyebrow' => get_bloginfo( 'name' ) ) ); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'section entry-wrap' ); ?>>
			<div class="container container--narrow entry">
				<?php if ( has_post_thumbnail() ) : ?>
					<figure class="entry__thumb"><?php the_post_thumbnail( 'large' ); ?></figure>
				<?php endif; ?>
				<?php
				the_content();
				wp_link_pages(
					array(
						'before' => '<nav class="entry__pages">' . esc_html__( 'Páginas:', 'aryes-health' ),
						'after'  => '</nav>',
					)
				);
				?>
			</div>
		</article>
		<?php
		if ( comments_open() || get_comments_number() ) {
			echo '<div class="container container--narrow">';
			comments_template();
			echo '</div>';
		}
		?>
	</main>
	<?php
endwhile;

get_footer();
