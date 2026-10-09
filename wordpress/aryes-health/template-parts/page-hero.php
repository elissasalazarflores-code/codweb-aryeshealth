<?php
/**
 * Encabezado oscuro de páginas interiores.
 *
 * @package Aryes_Health
 */

$eyebrow = isset( $args['eyebrow'] ) ? $args['eyebrow'] : '';
$title   = isset( $args['title'] ) ? $args['title'] : get_the_title();
$meta    = isset( $args['meta'] ) ? $args['meta'] : '';
?>
<section class="page-hero">
	<div class="page-hero__bg" aria-hidden="true">
		<img src="<?php echo esc_url( aryes_img( 'hero_image' ) ); ?>" alt="">
		<div class="hero__horizon"></div>
	</div>
	<div class="container page-hero__inner">
		<?php if ( $eyebrow ) : ?>
			<p class="eyebrow eyebrow--light"><span class="dot"></span> <?php echo esc_html( $eyebrow ); ?></p>
		<?php endif; ?>
		<h1 class="page-hero__title"><?php echo esc_html( wp_strip_all_tags( $title ) ); ?></h1>
		<?php if ( $meta ) : ?>
			<p class="page-hero__meta"><?php echo esc_html( $meta ); ?></p>
		<?php endif; ?>
	</div>
</section>
