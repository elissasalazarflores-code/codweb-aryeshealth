<?php
/**
 * Pie de página.
 *
 * @package Aryes_Health
 */

$email = aryes_mod( 'contact_email' );
?>
<footer class="footer">
	<div class="container footer__top">
		<?php aryes_logo( 'logo--light' ); ?>
		<p class="footer__tagline"><?php echo esc_html( aryes_mod( 'tagline' ) ); ?></p>
		<nav class="footer__nav" aria-label="<?php esc_attr_e( 'Pie de página', 'aryes-health' ); ?>">
			<?php aryes_menu( has_nav_menu( 'footer' ) ? 'footer' : 'primary' ); ?>
		</nav>
	</div>
	<div class="container footer__bottom">
		<span>© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( aryes_mod( 'company_name' ) ); ?><?php echo aryes_mod( 'contact_rfc' ) ? ' · RFC ' . esc_html( aryes_mod( 'contact_rfc' ) ) : ''; ?></span>
		<span><?php echo esc_html( aryes_mod( 'contact_city' ) ); ?><?php if ( $email ) : ?> · <a href="mailto:<?php echo esc_attr( antispambot( $email ) ); ?>"><?php echo esc_html( antispambot( $email ) ); ?></a><?php endif; ?></span>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
