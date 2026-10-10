<?php
/**
 * Wizards theme setup.
 *
 * @package Wizards
 *
 * SPDX-FileCopyrightText: 2026 Giacomo Tenaglia <giacomo.tenaglia@gmail.com>
 * SPDX-License-Identifier: GPL-3.0-or-later
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WIZARDS_VERSION', '1.0.1' );

/**
 * Theme supports, menus and editor styles.
 */
function wizards_setup() {
	load_theme_textdomain( 'wizards', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' )
	);
	// Same location names as Hestia, so the existing menus stay assigned after a theme switch.
	register_nav_menus(
		array(
			'primary' => __( 'Menu principal', 'wizards' ),
			'footer'  => __( 'Menu du pied de page', 'wizards' ),
		)
	);

	add_editor_style( 'assets/css/editor.css' );
}
add_action( 'after_setup_theme', 'wizards_setup' );

/**
 * Front-end assets.
 */
function wizards_enqueue_assets() {
	$uri = get_template_directory_uri();

	wp_enqueue_style( 'wizards-main', $uri . '/assets/css/main.css', array(), WIZARDS_VERSION );
	wp_enqueue_script(
		'wizards-nav',
		$uri . '/assets/js/nav.js',
		array(),
		WIZARDS_VERSION,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wizards_enqueue_assets' );

/**
 * Mark the document as JS-capable before paint, so the mobile menu is only
 * collapsed when the script that opens it can run.
 */
function wizards_js_class() {
	wp_print_inline_script_tag( "document.documentElement.classList.add('js');" );
}
add_action( 'wp_head', 'wizards_js_class', 0 );

/**
 * Preload the two main font files so headings do not flash in the fallback face.
 */
function wizards_preload_fonts() {
	$uri = get_template_directory_uri() . '/assets/fonts/';
	foreach ( array( 'barlow-condensed-700.woff2', 'source-sans-3-var.woff2' ) as $file ) {
		printf(
			'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
			esc_url( $uri . $file )
		);
	}
}
add_action( 'wp_head', 'wizards_preload_fonts', 1 );

/**
 * Block pattern category for the v2 home page sections.
 */
function wizards_register_pattern_category() {
	register_block_pattern_category(
		'wizards',
		array( 'label' => __( 'Wizards', 'wizards' ) )
	);
}
add_action( 'init', 'wizards_register_pattern_category' );

/**
 * Body classes used by the page templates.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function wizards_body_class( $classes ) {
	if ( is_page_template( 'page-templates/template-landing.php' ) ) {
		$classes[] = 'wiz-is-landing';
	}
	if ( is_page_template( 'page-templates/template-fullwidth.php' ) ) {
		$classes[] = 'wiz-is-fullwidth';
	}
	return $classes;
}
add_filter( 'body_class', 'wizards_body_class' );

/**
 * Shorter excerpts for the news cards.
 */
function wizards_excerpt_length() {
	return 22;
}
add_filter( 'excerpt_length', 'wizards_excerpt_length' );

function wizards_excerpt_more() {
	return '…';
}
add_filter( 'excerpt_more', 'wizards_excerpt_more' );

/**
 * Logo markup. Uses the high-resolution logo shipped with the theme rather than
 * the site-wide "site_logo" option, which still points to the low-resolution
 * logo used by the previous theme. Filter `wizards_logo_url` to swap it.
 */
function wizards_logo() {
	$url = apply_filters( 'wizards_logo_url', get_template_directory_uri() . '/assets/img/wizards-logo.png' );
	printf(
		'<a class="custom-logo-link" href="%1$s" rel="home"><img class="custom-logo" src="%2$s" width="360" height="333" alt="%3$s"></a>',
		esc_url( home_url( '/' ) ),
		esc_url( $url ),
		esc_attr( wp_specialchars_decode( get_bloginfo( 'name' ), ENT_QUOTES ) )
	);
}

/**
 * Category or post type label shown above a news card title.
 *
 * @param int|null $post_id Post ID.
 * @return string
 */
function wizards_card_label( $post_id = null ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	if ( 'post' !== get_post_type( $post_id ) ) {
		return get_post_type_object( get_post_type( $post_id ) )->labels->singular_name;
	}
	$cats = get_the_category( $post_id );
	foreach ( $cats as $cat ) {
		if ( 'news' !== $cat->slug && 'uncategorized' !== $cat->slug ) {
			return $cat->name;
		}
	}
	return __( 'Actualité', 'wizards' );
}

/**
 * Pagination for archives.
 */
function wizards_pagination() {
	the_posts_pagination(
		array(
			'mid_size'  => 1,
			'prev_text' => __( 'Précédent', 'wizards' ),
			'next_text' => __( 'Suivant', 'wizards' ),
		)
	);
}
