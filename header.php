<?php
/**
 * Site header: floating pill bar with logo and main menu.
 *
 * @package Wizards
 *
 * SPDX-FileCopyrightText: 2026 Giacomo Tenaglia <giacomo.tenaglia@gmail.com>
 * SPDX-License-Identifier: GPL-3.0-or-later
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#contenu"><?php esc_html_e( 'Aller au contenu', 'wizards' ); ?></a>

<header class="topbar">
	<div class="brand">
		<?php wizards_logo(); ?>
	</div>

	<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<button class="menu-toggle" type="button" aria-controls="menu-principal" aria-expanded="false">
			<span class="menu-toggle__bars" aria-hidden="true"></span>
			<span class="menu-toggle__label"><?php esc_html_e( 'Menu', 'wizards' ); ?></span>
		</button>
		<nav id="menu-principal" class="menu" aria-label="<?php esc_attr_e( 'Navigation principale', 'wizards' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'menu__list',
					'depth'          => 2,
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>
	<?php endif; ?>
</header>

<main id="contenu" class="page">
