<?php
/**
 * Template Name: Accueil (sections en cartes, sans titre)
 * Template Post Type: page
 *
 * Each top-level block group or columns block becomes its own white card,
 * like the sections of the v2 home page. The page title is not displayed:
 * the first section is expected to carry the page's H1.
 *
 * @package Wizards
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'landing' ); ?>>
		<div class="landing__content">
			<?php the_content(); ?>
		</div>
	</article>
	<?php
endwhile;

get_footer();
