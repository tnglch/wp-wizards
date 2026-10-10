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

	<p class="site-footer__legal">
		&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Geneva's Flying Disk Wizards
	</p>
</footer>

<?php wp_footer(); ?>
</body>
</html>
