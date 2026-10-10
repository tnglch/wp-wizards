<?php
/**
 * Not found.
 *
 * @package Wizards
 *
 * SPDX-FileCopyrightText: 2026 Giacomo Tenaglia <giacomo.tenaglia@gmail.com>
 * SPDX-License-Identifier: GPL-3.0-or-later
 */

get_header();
?>
<section class="card cta cta--plain">
	<div>
		<h1><?php esc_html_e( 'Page introuvable', 'wizards' ); ?></h1>
		<p><?php esc_html_e( 'Ce lancer est sorti du terrain. Essaie une recherche ou reviens à l\'accueil.', 'wizards' ); ?></p>
		<?php get_search_form(); ?>
		<div class="actions">
			<a class="btn btn--solid" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Retour à l\'accueil', 'wizards' ); ?></a>
			<a class="btn btn--outline" href="<?php echo esc_url( home_url( '/le-club/contact/' ) ); ?>"><?php esc_html_e( 'Nous contacter', 'wizards' ); ?></a>
		</div>
	</div>
</section>
<?php
get_footer();
