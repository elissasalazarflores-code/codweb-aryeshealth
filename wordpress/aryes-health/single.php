<?php
/**
 * Entradas individuales.
 *
 * @package Aryes_Health
 */

get_header();

while ( have_posts() ) :
	the_post();
	$cats = get_the_category();
	?>
	<main id="contenido">
		<?php
		get_template_part(
			'template-parts/page-hero',
			null,
			array(
				'eyebrow' => $cats ? $cats[0]->name : __( 'Noticias', 'aryes-health' ),
				'meta'    => get_the_date(),
			)
		);
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'section entry-wrap' ); ?>>
			<div class="container container--narrow entry">
				<?php if ( has_post_thumbnail() ) : ?>
					<figure class="entry__thumb"><?php the_post_thumbnail( 'large' ); ?></figure>
				<?php endif; ?>
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
				<nav class="entry__nav">
					<span><?php previous_post_link( '%link', '← %title' ); ?></span>
					<span><?php next_post_link( '%link', '%title →' ); ?></span>
				</nav>
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
