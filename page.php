<?php
/**
 * Default page: title header card, then the content card.
 *
 * @package Wizards
 */

get_header();

while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/page', 'content' );
endwhile;

get_footer();
