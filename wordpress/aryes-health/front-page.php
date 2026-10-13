<?php
/**
 * Página de inicio.
 *
 * Se usa automáticamente como portada del sitio. Los textos e imágenes se editan en
 * Apariencia → Personalizar → Aryes Health; las listas, en inc/content.php.
 *
 * @package Aryes_Health
 */

get_header();

$stages  = aryes_stages();
$clients = aryes_clients();
$status  = aryes_contact_status();
$email   = aryes_mod( 'contact_email' );
$phone   = aryes_mod( 'contact_phone' );
$web     = aryes_mod( 'contact_web' );
$web_url = preg_match( '#^https?://#i', $web ) ? $web : 'https://' . $web;
$marquee = aryes_marquee();
?>

<main id="contenido">

<!-- ============ PORTADA ============ -->
<section class="hero" id="inicio">
	<div class="hero__bg" aria-hidden="true">
		<img src="<?php echo esc_url( aryes_img( 'hero_image' ) ); ?>" alt="" class="hero__prism" fetchpriority="high">
		<div class="hero__horizon"></div>
		<svg class="hero__rings" viewBox="0 0 800 800"><g fill="none" stroke="currentColor"><?php for ( $r = 120; $r <= 660; $r += 60 ) : ?><circle cx="800" cy="800" r="<?php echo (int) $r; ?>"/><?php endfor; ?></g></svg>
	</div>

	<div class="container hero__grid">
		<div class="hero__copy">
			<p class="eyebrow eyebrow--light reveal"><span class="dot"></span> <?php echo esc_html( aryes_mod( 'hero_eyebrow' ) ); ?></p>
			<h1 class="hero__title reveal"><?php aryes_e( 'hero_title' ); ?></h1>
			<p class="hero__lead reveal"><?php echo esc_html( aryes_mod( 'hero_lead' ) ); ?></p>
			<div class="hero__actions reveal">
				<a href="#llave-en-mano" class="btn btn--light"><?php echo esc_html( aryes_mod( 'hero_btn1' ) ); ?> <span class="arrow">→</span></a>
				<a href="#contacto" class="btn btn--ghost"><?php echo esc_html( aryes_mod( 'hero_btn2' ) ); ?></a>
			</div>
		</div>

		<aside class="hero__cards">
			<div class="glass-card hero__card hero__card--a reveal">
				<span class="tag"><?php echo esc_html( aryes_mod( 'hero_card1_tag' ) ); ?></span>
				<strong><?php echo esc_html( aryes_mod( 'hero_card1_title' ) ); ?></strong>
				<small><?php echo esc_html( aryes_mod( 'hero_card1_text' ) ); ?></small>
			</div>
			<div class="glass-card hero__card hero__card--b reveal">
				<span class="tag"><?php echo esc_html( aryes_mod( 'hero_card2_tag' ) ); ?></span>
				<div class="hero__metric"><span><?php echo esc_html( aryes_mod( 'hero_card2_num' ) ); ?></span><em><?php echo esc_html( aryes_mod( 'hero_card2_unit' ) ); ?></em></div>
				<small><?php echo esc_html( aryes_mod( 'hero_card2_text' ) ); ?></small>
			</div>
		</aside>
	</div>

	<div class="hero__pulse" aria-hidden="true">
		<svg viewBox="0 0 1440 120" preserveAspectRatio="none">
			<path class="pulse-line" d="M0 70 H420 L450 70 L465 40 L480 98 L498 18 L516 86 L530 70 H760 C840 70 900 40 980 50 C1080 62 1200 30 1440 44"/>
		</svg>
	</div>

	<div class="container hero__strip<?php echo 5 === count( $stages ) ? ' hero__strip--5' : ''; ?> reveal">
		<?php foreach ( $stages as $i => $stage ) : ?>
			<div><span class="num"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span><b><?php echo esc_html( $stage[0] ); ?></b></div>
		<?php endforeach; ?>
	</div>
</section>

<!-- ============ MARQUESINA ============ -->
<section class="trust" aria-label="<?php esc_attr_e( 'Instituciones que confían en Aryes Health', 'aryes-health' ); ?>">
	<p class="trust__label"><?php esc_html_e( 'Instituciones públicas y privadas', 'aryes-health' ); ?> <br><?php esc_html_e( 'que confían en nosotros', 'aryes-health' ); ?></p>
	<div class="marquee">
		<div class="marquee__track">
			<?php for ( $loop = 0; $loop < 2; $loop++ ) : ?>
				<?php foreach ( $marquee as $name ) : ?>
					<span<?php echo $loop ? ' aria-hidden="true"' : ''; ?>><?php echo esc_html( $name ); ?></span>
				<?php endforeach; ?>
			<?php endfor; ?>
		</div>
	</div>
</section>

<!-- ============ QUIÉNES SOMOS ============ -->
<section class="section about" id="nosotros">
	<div class="container about__grid">
		<div class="about__media reveal">
			<div class="facet facet--photo">
				<img src="<?php echo esc_url( aryes_img( 'about_image' ) ); ?>" alt="<?php esc_attr_e( 'Especialista médico en un quirófano equipado', 'aryes-health' ); ?>" loading="lazy">
			</div>
			<div class="glass-card about__badge">
				<svg class="about__badge-mark" aria-hidden="true"><use href="#simbolo"/></svg>
				<div>
					<strong><?php echo esc_html( aryes_mod( 'about_badge' ) ); ?></strong>
					<small><?php echo esc_html( aryes_mod( 'company_name' ) ); ?></small>
				</div>
			</div>
		</div>
		<div class="about__copy">
			<p class="eyebrow reveal"><span class="idx">01</span> <?php esc_html_e( 'Quiénes somos', 'aryes-health' ); ?></p>
			<h2 class="h2 reveal"><?php aryes_e( 'about_title' ); ?></h2>
			<p class="lead reveal"><?php echo esc_html( aryes_mod( 'about_lead' ) ); ?></p>
			<ul class="pillars reveal">
				<?php foreach ( aryes_pillars() as $i => $pillar ) : ?>
					<li><span><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span><?php echo esc_html( $pillar ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>

<!-- ============ MISIÓN Y VISIÓN ============ -->
<section class="mv" id="mision">
	<div class="mv__photo" aria-hidden="true"><img src="<?php echo esc_url( aryes_img( 'mv_image' ) ); ?>" alt="" loading="lazy"></div>
	<div class="container mv__grid">
		<div class="mv__head">
			<p class="eyebrow eyebrow--light reveal"><span class="idx">02</span> <?php esc_html_e( 'Misión y visión', 'aryes-health' ); ?></p>
			<h2 class="h2 reveal"><?php aryes_e( 'mv_title' ); ?></h2>
		</div>
		<article class="glass-card mv__card reveal">
			<span class="tag"><?php esc_html_e( 'Misión', 'aryes-health' ); ?></span>
			<p><?php echo esc_html( aryes_mod( 'mision' ) ); ?></p>
		</article>
		<article class="glass-card mv__card mv__card--accent reveal">
			<span class="tag"><?php esc_html_e( 'Visión', 'aryes-health' ); ?></span>
			<p><?php echo esc_html( aryes_mod( 'vision' ) ); ?></p>
		</article>
	</div>
</section>

<!-- ============ PROYECTOS LLAVE EN MANO ============ -->
<section class="section turnkey" id="llave-en-mano">
	<div class="turnkey__glow" aria-hidden="true"></div>
	<div class="container">
		<div class="section-head section-head--light">
			<div>
				<p class="eyebrow eyebrow--light reveal"><span class="idx">03</span> <?php echo esc_html( aryes_mod( 'turnkey_eyebrow' ) ); ?></p>
				<h2 class="h2 reveal"><?php aryes_e( 'turnkey_title' ); ?></h2>
			</div>
		</div>
		<p class="turnkey__lead reveal"><?php aryes_e( 'turnkey_text' ); ?></p>

		<ol class="stages">
			<?php foreach ( $stages as $i => $stage ) : ?>
				<li class="stage reveal">
					<span class="stage__n"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span>
					<span class="stage__icon"><?php echo aryes_icon( $stage[1] ); // phpcs:ignore WordPress.Security.EscapeOutput -- SVG fijo del tema. ?></span>
					<h3><?php echo esc_html( $stage[0] ); ?></h3>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>

<!-- ============ COMPROMISO ============ -->
<section class="section commit" id="compromiso">
	<div class="container commit__grid">
		<div class="commit__copy">
			<p class="eyebrow reveal"><span class="idx">04</span> <?php esc_html_e( 'Nuestro compromiso', 'aryes-health' ); ?></p>
			<h2 class="h2 reveal"><?php aryes_e( 'commit_title' ); ?></h2>
			<p class="lead reveal"><?php echo esc_html( aryes_mod( 'commit_lead' ) ); ?></p>
			<p class="reveal"><?php echo esc_html( aryes_mod( 'commit_text' ) ); ?></p>
		</div>
		<aside class="supply reveal" aria-labelledby="supplyTitle">
			<svg class="supply__rings" viewBox="0 0 600 600" aria-hidden="true"><g fill="none" stroke="currentColor"><?php for ( $r = 80; $r <= 580; $r += 50 ) : ?><circle cx="600" cy="600" r="<?php echo (int) $r; ?>"/><?php endfor; ?></g></svg>
			<p class="supply__title" id="supplyTitle"><?php echo esc_html( aryes_mod( 'supply_title' ) ); ?></p>
			<ol class="supply__list">
				<?php foreach ( aryes_supply() as $i => $item ) : ?>
					<li><span><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span><?php echo esc_html( $item ); ?></li>
				<?php endforeach; ?>
			</ol>
		</aside>
	</div>
</section>

<!-- ============ CLIENTES ============ -->
<section class="section clients" id="clientes">
	<div class="container">
		<div class="section-head">
			<div>
				<p class="eyebrow reveal"><span class="idx">05</span> <?php esc_html_e( 'Clientes', 'aryes-health' ); ?></p>
				<h2 class="h2 reveal"><?php aryes_e( 'clients_title' ); ?></h2>
			</div>
			<p class="section-head__aside reveal"><?php echo esc_html( aryes_mod( 'clients_aside' ) ); ?></p>
		</div>
		<div class="clients__grid">
			<?php
			$sectors = array(
				'privado' => __( 'Privado', 'aryes-health' ),
				'publico' => __( 'Público', 'aryes-health' ),
			);
			foreach ( $sectors as $key => $label ) :
				if ( empty( $clients[ $key ] ) ) {
					continue;
				}
				?>
				<div class="clients__col reveal">
					<h3><span><?php esc_html_e( 'Sector', 'aryes-health' ); ?></span> <?php echo esc_html( $label ); ?></h3>
					<ul class="logo-wall logo-wall--img">
						<?php foreach ( $clients[ $key ] as $client ) : ?>
							<li>
								<?php if ( ! empty( $client[1] ) ) : ?>
									<img src="<?php echo esc_url( preg_match( '#^https?://#', $client[1] ) ? $client[1] : aryes_asset( 'img/clientes/' . $client[1] ) ); ?>" alt="<?php echo esc_attr( $client[0] ); ?>" loading="lazy">
								<?php else : ?>
									<b><?php echo esc_html( $client[0] ); ?></b>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ============ ALIANZA ESTRATÉGICA ============ -->
<section class="alliance" id="alianzas" aria-labelledby="allianceTitle">
	<img src="<?php echo esc_url( aryes_img( 'alliance_image' ) ); ?>" alt="" class="alliance__bg" aria-hidden="true" loading="lazy">
	<div class="container alliance__inner">
		<p class="eyebrow reveal"><span class="idx">06</span> <?php esc_html_e( 'Alianza estratégica', 'aryes-health' ); ?></p>
		<h2 class="alliance__text reveal" id="allianceTitle"><?php aryes_e( 'alliance_text' ); ?></h2>
	</div>
</section>

<!-- ============ CONTACTO ============ -->
<section class="contact" id="contacto">
	<div class="contact__bg" aria-hidden="true">
		<img src="<?php echo esc_url( aryes_asset( 'img/haz.webp' ) ); ?>" alt="" loading="lazy">
	</div>
	<div class="container contact__grid">
		<div class="contact__copy">
			<svg class="contact__mark" aria-hidden="true"><use href="#simbolo"/></svg>
			<h2 class="contact__title reveal"><?php aryes_e( 'contact_title' ); ?></h2>
			<p class="reveal"><?php echo esc_html( aryes_mod( 'contact_text' ) ); ?></p>
			<dl class="contact__info reveal">
				<?php if ( aryes_mod( 'company_name' ) ) : ?>
					<div><dt><?php esc_html_e( 'Razón social', 'aryes-health' ); ?></dt><dd><?php echo esc_html( aryes_mod( 'company_name' ) ); ?></dd></div>
				<?php endif; ?>
				<?php if ( aryes_mod( 'contact_rfc' ) ) : ?>
					<div><dt>RFC</dt><dd><?php echo esc_html( aryes_mod( 'contact_rfc' ) ); ?></dd></div>
				<?php endif; ?>
				<?php if ( $web ) : ?>
					<div><dt><?php esc_html_e( 'Web', 'aryes-health' ); ?></dt><dd><a href="<?php echo esc_url( $web_url ); ?>"><?php echo esc_html( preg_replace( '#^https?://#i', '', $web ) ); ?></a></dd></div>
				<?php endif; ?>
				<?php if ( $email ) : ?>
					<div><dt><?php esc_html_e( 'Correo', 'aryes-health' ); ?></dt><dd><a href="mailto:<?php echo esc_attr( antispambot( $email ) ); ?>"><?php echo esc_html( antispambot( $email ) ); ?></a></dd></div>
				<?php endif; ?>
				<?php if ( $phone ) : ?>
					<div><dt><?php esc_html_e( 'Teléfono', 'aryes-health' ); ?></dt><dd><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></dd></div>
				<?php endif; ?>
				<?php if ( aryes_mod( 'contact_city' ) ) : ?>
					<div><dt><?php esc_html_e( 'Sede', 'aryes-health' ); ?></dt><dd><?php echo esc_html( aryes_mod( 'contact_city' ) ); ?></dd></div>
				<?php endif; ?>
			</dl>
		</div>

		<form class="glass-card form reveal" id="contactForm" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" novalidate>
			<h3><?php esc_html_e( 'Solicitar información', 'aryes-health' ); ?></h3>
			<input type="hidden" name="action" value="aryes_contact">
			<?php wp_nonce_field( 'aryes_contact', 'aryes_contact_nonce' ); ?>
			<div class="form__hp" aria-hidden="true"><label><?php esc_html_e( 'No llenar', 'aryes-health' ); ?><input type="text" name="empresa_web" tabindex="-1" autocomplete="off"></label></div>
			<?php if ( $status ) : ?>
				<p class="form__status form__status--<?php echo esc_attr( $status[0] ); ?>" role="status"><?php echo esc_html( $status[1] ); ?></p>
			<?php endif; ?>
			<div class="form__row">
				<label><?php esc_html_e( 'Nombre', 'aryes-health' ); ?><input name="nombre" type="text" autocomplete="name" required></label>
				<label><?php esc_html_e( 'Institución', 'aryes-health' ); ?><input name="institucion" type="text" autocomplete="organization"></label>
			</div>
			<div class="form__row">
				<label><?php esc_html_e( 'Correo', 'aryes-health' ); ?><input name="correo" type="email" autocomplete="email" required></label>
				<label><?php esc_html_e( 'Teléfono', 'aryes-health' ); ?><input name="telefono" type="tel" autocomplete="tel"></label>
			</div>
			<fieldset class="form__chips">
				<legend><?php esc_html_e( 'Área de interés', 'aryes-health' ); ?></legend>
				<?php foreach ( aryes_interest_options() as $option ) : ?>
					<label><input type="checkbox" name="linea[]" value="<?php echo esc_attr( $option ); ?>"><span><?php echo esc_html( $option ); ?></span></label>
				<?php endforeach; ?>
			</fieldset>
			<label><?php esc_html_e( 'Mensaje', 'aryes-health' ); ?><textarea name="mensaje" rows="4"></textarea></label>
			<button type="submit" class="btn btn--light btn--block"><?php esc_html_e( 'Enviar solicitud', 'aryes-health' ); ?> <span class="arrow">→</span></button>
			<p class="form__note" id="formNote" aria-live="polite"></p>
		</form>
	</div>
</section>

</main>

<?php
get_footer();
