<?php
/**
 * Template Name: Pleine largeur
 * Template Post Type: page
 *
 * Same path as Hestia's full-width template, so pages that use it keep it.
 *
 * @package Wizards
 *
 * SPDX-FileCopyrightText: 2026 Giacomo Tenaglia <giacomo.tenaglia@gmail.com>
 * SPDX-License-Identifier: GPL-3.0-or-later
 */

get_header();

while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/page', 'content', array( 'wide' => true ) );
endwhile;

get_footer();
