<?php
/**
 * Página de inicio.
 *
 * Se usa automáticamente como portada del sitio. Los textos se editan en
 * Apariencia → Personalizar → Aryes Health, y los equipos en el menú Equipos.
 *
 * @package Aryes_Health
 */

get_header();

$lines        = aryes_lines();
$first_line   = key( $lines );
$open_doors   = aryes_open_doors();
$clients      = aryes_clients();
$status       = aryes_contact_status();
$email        = aryes_mod( 'contact_email' );
$phone        = aryes_mod( 'contact_phone' );
$web          = aryes_mod( 'contact_web' );
$web_url      = preg_match( '#^https?://#i', $web ) ? $web : 'https://' . $web;
$marquee      = aryes_marquee();
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
				<a href="#equipos" class="btn btn--light"><?php echo esc_html( aryes_mod( 'hero_btn1' ) ); ?> <span class="arrow">→</span></a>
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

	<div class="container hero__strip reveal">
		<?php foreach ( aryes_hero_strip() as $i => $item ) : ?>
			<div><span class="num"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span><b><?php echo esc_html( $item ); ?></b></div>
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
				<img src="<?php echo esc_url( aryes_img( 'about_image' ) ); ?>" alt="<?php esc_attr_e( 'Quirófano equipado con tecnología médica', 'aryes-health' ); ?>" loading="lazy">
			</div>
			<div class="glass-card about__badge">
				<svg class="about__badge-mark" aria-hidden="true"><use href="#simbolo"/></svg>
				<div>
					<strong><?php echo esc_html( aryes_mod( 'about_badge' ) ); ?></strong>
					<small><?php esc_html_e( 'Acompañamiento en cada etapa', 'aryes-health' ); ?></small>
				</div>
			</div>
		</div>
		<div class="about__copy">
			<p class="eyebrow reveal"><span class="idx">01</span> <?php esc_html_e( 'Quiénes somos', 'aryes-health' ); ?></p>
			<h2 class="h2 reveal"><?php aryes_e( 'about_title' ); ?></h2>
			<p class="lead reveal"><?php echo esc_html( aryes_mod( 'about_lead' ) ); ?></p>
			<p class="reveal"><?php echo esc_html( aryes_mod( 'about_text' ) ); ?></p>
			<ul class="about__facts reveal">
				<li><span><?php esc_html_e( 'Razón social', 'aryes-health' ); ?></span><?php echo esc_html( aryes_mod( 'company_name' ) ); ?></li>
				<li><span><?php esc_html_e( 'Sede', 'aryes-health' ); ?></span><?php echo esc_html( aryes_mod( 'contact_city' ) ); ?></li>
				<li><span><?php esc_html_e( 'Atendemos', 'aryes-health' ); ?></span><?php esc_html_e( 'Sector público y privado', 'aryes-health' ); ?></li>
			</ul>
		</div>
	</div>
</section>

<!-- ============ PROPÓSITO ============ -->
<section class="purpose" aria-labelledby="purposeTitle">
	<img src="<?php echo esc_url( aryes_img( 'purpose_image' ) ); ?>" alt="" class="purpose__bg" aria-hidden="true" loading="lazy">
	<div class="container purpose__inner">
		<p class="eyebrow reveal"><?php echo esc_html( aryes_mod( 'purpose_eyebrow' ) ); ?></p>
		<h2 class="purpose__quote reveal" id="purposeTitle"><?php aryes_e( 'purpose_quote' ); ?></h2>
		<p class="purpose__text reveal"><?php echo esc_html( aryes_mod( 'purpose_text' ) ); ?></p>
	</div>
</section>

<!-- ============ ESPECIALIDADES ============ -->
<section class="section specs" id="especialidades">
	<div class="container">
		<div class="section-head">
			<div>
				<p class="eyebrow reveal"><span class="idx">02</span> <?php esc_html_e( 'Especialidades', 'aryes-health' ); ?></p>
				<h2 class="h2 reveal"><?php aryes_e( 'specs_title' ); ?></h2>
			</div>
			<p class="section-head__aside reveal"><?php echo esc_html( aryes_mod( 'specs_aside' ) ); ?></p>
		</div>

		<div class="specs__grid">
			<?php foreach ( aryes_specialties() as $i => $spec ) : ?>
				<article class="spec-card reveal">
					<span class="spec-card__num">/ <?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span>
					<div class="spec-card__icon"><?php echo aryes_icon( $spec['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput -- SVG fijo del tema. ?></div>
					<h3><?php echo esc_html( $spec['title'] ); ?></h3>
					<p><?php echo esc_html( $spec['text'] ); ?></p>
					<a href="#equipos" data-tab="<?php echo esc_attr( $spec['tab'] ); ?>" class="link"><?php esc_html_e( 'Ver equipos', 'aryes-health' ); ?> <span class="arrow">→</span></a>
				</article>
			<?php endforeach; ?>
			<article class="spec-card spec-card--dark reveal">
				<div class="spec-card__beam" aria-hidden="true"></div>
				<h3><?php echo esc_html( $open_doors['title'] ); ?></h3>
				<p><?php echo esc_html( $open_doors['text'] ); ?></p>
				<ul class="chips">
					<?php foreach ( $open_doors['items'] as $item ) : ?>
						<li><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</article>
		</div>
	</div>
</section>

<!-- ============ EQUIPOS ============ -->
<section class="section equip" id="equipos">
	<div class="equip__glow" aria-hidden="true"></div>
	<div class="container">
		<div class="section-head section-head--light">
			<div>
				<p class="eyebrow eyebrow--light reveal"><span class="idx">03</span> <?php esc_html_e( 'Equipamiento médico', 'aryes-health' ); ?></p>
				<h2 class="h2 reveal"><?php aryes_e( 'equip_title' ); ?></h2>
			</div>
			<p class="section-head__aside reveal"><?php echo esc_html( aryes_mod( 'equip_aside' ) ); ?></p>
		</div>

		<div class="tabs reveal" role="tablist" aria-label="<?php esc_attr_e( 'Líneas de equipo', 'aryes-health' ); ?>">
			<?php
			$n = 0;
			foreach ( $lines as $slug => $line ) :
				$n++;
				$active = $slug === $first_line;
				?>
				<button role="tab" class="tab<?php echo $active ? ' is-active' : ''; ?>" aria-selected="<?php echo $active ? 'true' : 'false'; ?>" aria-controls="panel-<?php echo esc_attr( $slug ); ?>" id="tab-<?php echo esc_attr( $slug ); ?>" data-target="<?php echo esc_attr( $slug ); ?>"<?php echo $active ? '' : ' tabindex="-1"'; ?>><span><?php echo esc_html( sprintf( '%02d', $n ) ); ?></span><?php echo esc_html( $line['tab'] ); ?></button>
			<?php endforeach; ?>
			<span class="tabs__indicator" aria-hidden="true"></span>
		</div>

		<?php
		foreach ( $lines as $slug => $line ) :
			$active   = $slug === $first_line;
			$products = aryes_products( $slug );
			$grid     = ( count( $products ) === 4 || count( $products ) === 2 ) ? 'products products--4' : 'products';
			?>
			<div class="panel<?php echo $active ? ' is-active' : ''; ?>" role="tabpanel" id="panel-<?php echo esc_attr( $slug ); ?>" aria-labelledby="tab-<?php echo esc_attr( $slug ); ?>"<?php echo $active ? '' : ' hidden'; ?>>
				<div class="panel__intro">
					<h3><?php echo aryes_rich( $line['title'] ); // phpcs:ignore WordPress.Security.EscapeOutput -- escapado en aryes_rich(). ?></h3>
					<p><?php echo esc_html( $line['text'] ); ?></p>
					<?php if ( ! empty( $line['points'] ) ) : ?>
						<ul class="panel__points">
							<?php foreach ( $line['points'] as $point ) : ?>
								<li><?php echo esc_html( $point ); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
				<div class="<?php echo esc_attr( $grid ); ?>">
					<?php foreach ( $products as $product ) : ?>
						<figure class="product">
							<div class="product__img">
								<?php if ( $product['img'] ) : ?>
									<img src="<?php echo esc_url( $product['img'] ); ?>" alt="<?php echo esc_attr( $product['alt'] ); ?>" loading="lazy">
								<?php endif; ?>
							</div>
							<figcaption>
								<?php if ( $product['label'] ) : ?>
									<span><?php echo esc_html( $product['label'] ); ?></span>
								<?php endif; ?>
								<?php echo esc_html( $product['name'] ); ?>
							</figcaption>
						</figure>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<!-- ============ MISIÓN Y VISIÓN ============ -->
<section class="mv" id="mision">
	<div class="mv__photo" aria-hidden="true"><img src="<?php echo esc_url( aryes_img( 'mv_image' ) ); ?>" alt="" loading="lazy"></div>
	<div class="container mv__grid">
		<div class="mv__head">
			<p class="eyebrow eyebrow--light reveal"><span class="idx">04</span> <?php esc_html_e( 'Hacia dónde vamos', 'aryes-health' ); ?></p>
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

<!-- ============ VALORES ============ -->
<section class="section values" id="valores">
	<div class="container">
		<div class="section-head">
			<div>
				<p class="eyebrow reveal"><span class="idx">05</span> <?php esc_html_e( 'Valores', 'aryes-health' ); ?></p>
				<h2 class="h2 reveal"><?php aryes_e( 'values_title' ); ?></h2>
			</div>
			<p class="section-head__aside reveal"><?php echo esc_html( aryes_mod( 'values_aside' ) ); ?></p>
		</div>
		<div class="values__grid">
			<?php foreach ( aryes_values() as $i => $value ) : ?>
				<article class="value reveal"><span><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span><h3><?php echo esc_html( $value[0] ); ?></h3><p><?php echo esc_html( $value[1] ); ?></p></article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ============ SERVICIO ============ -->
<section class="section service" id="servicio">
	<div class="container service__grid">
		<div class="service__copy">
			<p class="eyebrow reveal"><span class="idx">06</span> <?php esc_html_e( 'Cómo trabajamos', 'aryes-health' ); ?></p>
			<h2 class="h2 reveal"><?php aryes_e( 'service_title' ); ?></h2>
			<p class="reveal"><?php echo esc_html( aryes_mod( 'service_text' ) ); ?></p>
			<div class="service__photo reveal">
				<img src="<?php echo esc_url( aryes_img( 'service_image' ) ); ?>" alt="<?php esc_attr_e( 'Sala quirúrgica con equipamiento integral', 'aryes-health' ); ?>" loading="lazy">
			</div>
		</div>
		<ol class="steps">
			<?php foreach ( aryes_steps() as $i => $step ) : ?>
				<li class="step reveal"><span class="step__n"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span><div><h3><?php echo esc_html( $step[0] ); ?></h3><p><?php echo esc_html( $step[1] ); ?></p></div></li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>

<!-- ============ CLIENTES ============ -->
<section class="section clients" id="clientes">
	<div class="container">
		<div class="section-head">
			<div>
				<p class="eyebrow reveal"><span class="idx">07</span> <?php esc_html_e( 'Clientes', 'aryes-health' ); ?></p>
				<h2 class="h2 reveal"><?php aryes_e( 'clients_title' ); ?></h2>
			</div>
			<p class="section-head__aside reveal"><?php echo esc_html( aryes_mod( 'clients_aside' ) ); ?></p>
		</div>
		<div class="clients__grid">
			<?php
			$sectors = array(
				'publico' => __( 'Público', 'aryes-health' ),
				'privado' => __( 'Privado', 'aryes-health' ),
			);
			foreach ( $sectors as $key => $label ) :
				if ( empty( $clients[ $key ] ) ) {
					continue;
				}
				?>
				<div class="clients__col reveal">
					<h3><span><?php esc_html_e( 'Sector', 'aryes-health' ); ?></span> <?php echo esc_html( $label ); ?></h3>
					<ul class="logo-wall">
						<?php foreach ( $clients[ $key ] as $client ) : ?>
							<li><b><?php echo esc_html( $client[0] ); ?></b><?php if ( ! empty( $client[1] ) ) : ?><small><?php echo esc_html( $client[1] ); ?></small><?php endif; ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ============ ALIANZAS ============ -->
<section class="section partners" id="alianzas">
	<div class="container partners__grid">
		<div>
			<p class="eyebrow reveal"><span class="idx">08</span> <?php esc_html_e( 'Alianza estratégica', 'aryes-health' ); ?></p>
			<h2 class="h2 reveal"><?php aryes_e( 'partners_title' ); ?></h2>
			<p class="reveal"><?php echo esc_html( aryes_mod( 'partners_text' ) ); ?></p>
		</div>
		<div class="partners__list">
			<?php foreach ( aryes_partners() as $partner ) : ?>
				<div class="partner reveal"><b><?php echo esc_html( $partner[0] ); ?></b><small><?php echo esc_html( $partner[1] ); ?></small></div>
			<?php endforeach; ?>
		</div>
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
				<?php if ( $email ) : ?>
					<div><dt><?php esc_html_e( 'Correo', 'aryes-health' ); ?></dt><dd><a href="mailto:<?php echo esc_attr( antispambot( $email ) ); ?>"><?php echo esc_html( antispambot( $email ) ); ?></a></dd></div>
				<?php endif; ?>
				<?php if ( $phone ) : ?>
					<div><dt><?php esc_html_e( 'Teléfono', 'aryes-health' ); ?></dt><dd><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></dd></div>
				<?php endif; ?>
				<?php if ( $web ) : ?>
					<div><dt><?php esc_html_e( 'Web', 'aryes-health' ); ?></dt><dd><a href="<?php echo esc_url( $web_url ); ?>"><?php echo esc_html( preg_replace( '#^https?://(www\.)?#i', '', $web ) ); ?></a></dd></div>
				<?php endif; ?>
				<div><dt><?php esc_html_e( 'Sede', 'aryes-health' ); ?></dt><dd><?php echo esc_html( aryes_mod( 'contact_city' ) ); ?></dd></div>
				<?php if ( aryes_mod( 'contact_rfc' ) ) : ?>
					<div><dt>RFC</dt><dd><?php echo esc_html( aryes_mod( 'contact_rfc' ) ); ?></dd></div>
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
				<legend><?php esc_html_e( 'Línea de interés', 'aryes-health' ); ?></legend>
				<?php foreach ( array( 'Anestesia', 'Ventilación', 'Monitoreo', 'Proyecto integral' ) as $option ) : ?>
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
