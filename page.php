<?php
/**
 * Default page: title header card, then the content card.
 *
 * @package Wizards
 *
 * SPDX-FileCopyrightText: 2026 Giacomo Tenaglia <giacomo.tenaglia@gmail.com>
 * SPDX-License-Identifier: GPL-3.0-or-later
 */

get_header();

while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/page', 'content' );
endwhile;

get_footer();
