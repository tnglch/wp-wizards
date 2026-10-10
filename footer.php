<?php
/**
 * Site footer.
 *
 * @package Wizards
 *
 * SPDX-FileCopyrightText: 2026 Giacomo Tenaglia <giacomo.tenaglia@gmail.com>
 * SPDX-License-Identifier: GPL-3.0-or-later
 */

?>
</main>

<footer class="site-footer">
	<div class="site-footer__brand">
		<?php wizards_logo(); ?>
		<p>
			<strong><?php echo esc_html( wp_specialchars_decode( get_bloginfo( 'name' ), ENT_QUOTES ) ); ?></strong><br>
			<?php esc_html_e( 'Le club d\'ultimate frisbee de Genève, depuis 1984.', 'wizards' ); ?>
		</p>
	</div>

	<div class="site-footer__contact">
		<h2 class="site-footer__title"><?php esc_html_e( 'Contact', 'wizards' ); ?></h2>
		<p>
			<a href="mailto:info@wizards.ch">info@wizards.ch</a><br>
			<a href="tel:+41774553753">077 455 37 53</a>
		</p>
	</div>

	<?php if ( has_nav_menu( 'footer' ) ) : ?>
		<nav class="site-footer__nav" aria-label="<?php esc_attr_e( 'Liens du pied de page', 'wizards' ); ?>">
			<h2 class="site-footer__title"><?php esc_html_e( 'Suivez-nous', 'wizards' ); ?></h2>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'container'      => false,
					'menu_class'     => 'site-footer__list',
					'depth'          => 1,
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>
	<?php endif; ?>

	<?php $wizards_partners = wizards_partners(); ?>
	<?php if ( $wizards_partners ) : ?>
		<div class="site-footer__partners">
			<h2 class="site-footer__title"><?php esc_html_e( 'Nos partenaires', 'wizards' ); ?></h2>
			<ul class="partners">
				<?php foreach ( $wizards_partners as $wizards_partner ) : ?>
					<li>
						<?php $wizards_bg = sanitize_hex_color( $wizards_partner['background'] ?? '' ); ?>
						<a class="partners__link" href="<?php echo esc_url( $wizards_partner['url'] ); ?>" rel="noopener"<?php echo $wizards_bg ? ' style="background-color:' . esc_attr( $wizards_bg ) . '"' : ''; ?>>
							<img
								class="partners__logo <?php echo esc_attr( $wizards_partner['class'] ?? '' ); ?>"
								src="<?php echo esc_url( $wizards_partner['logo'] ); ?>"
								width="<?php echo (int) $wizards_partner['width']; ?>"
								height="<?php echo (int) $wizards_partner['height']; ?>"
								alt="<?php echo esc_attr( $wizards_partner['name'] ); ?>"
								loading="lazy"
								decoding="async"
							>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>

	<p class="site-footer__legal">
		&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Geneva's Flying Disk Wizards
	</p>
</footer>

<?php wp_footer(); ?>
</body>
</html>
