<?php
/**
 * Footer — Ánoumon herontwerp
 * Overschrijft flatsome/template-parts/footer/footer.php
 *
 * Structuur: 3 kolommen
 *   1. Branding — logo, tagline, e-mail
 *   2. Navigatie — primaire menu
 *   3. CTA — inspirerende tekst + afspraakknop
 */

do_action( 'flatsome_before_footer' );

$logo_id  = get_theme_mod( 'site_logo' );
$logo_url = $logo_id ? wp_get_attachment_image_url( $logo_id, array( 100, 100 ) ) : '';
?>

<div class="footer-widgets footer footer-1 footer-anoumon dark">
	<div class="container">
		<div class="row large-columns-3 medium-columns-1 footer-anoumon__grid">

			<!-- Kolom 1: Branding -->
			<div class="col footer-anoumon__col footer-anoumon__col--brand">
				<div class="col-inner">
					<?php if ( $logo_url ) : ?>
						<img src="<?php echo esc_url( $logo_url ); ?>"
						     alt="<?php bloginfo( 'name' ); ?>"
						     class="footer-logo"
						     width="70" height="70">
					<?php else : ?>
						<p class="footer-site-name alt-font"><?php bloginfo( 'name' ); ?></p>
					<?php endif; ?>

					<p class="footer-tagline">
						Energetische behandeling<br>
						&amp; spirituele begeleiding
					</p>

					<a href="mailto:info@anoumon.nl" class="footer-contact-link">
						<span class="icon-envelop" aria-hidden="true"></span>
						info@anoumon.nl
					</a>
				</div>
			</div>

			<!-- Kolom 2: Navigatie -->
			<div class="col footer-anoumon__col footer-anoumon__col--nav">
				<div class="col-inner">
					<h4 class="footer-col-heading">Pagina's</h4>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'footer-nav-links',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => false,
					) );
					?>
				</div>
			</div>

			<!-- Kolom 3: CTA -->
			<div class="col footer-anoumon__col footer-anoumon__col--cta">
				<div class="col-inner">
					<h4 class="footer-col-heading footer-col-heading--quote alt-font">
						Alles wat je aandacht geeft, groeit.
					</h4>
					<p class="footer-about-text">
						Of je nu op zoek bent naar meer energie, innerlijke rust of spirituele groei —
						bij Ánoumon ben je welkom zoals je bent.
					</p>
					<a href="/contact/" class="button small radius footer-cta-btn">
						Maak een afspraak
					</a>
				</div>
			</div>

		</div>
	</div>
</div>

<?php get_template_part( 'template-parts/footer/footer-absolute' ); ?>
