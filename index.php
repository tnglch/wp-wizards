<?php
/**
 * Fallback template: news listing, archives and search results as a card grid.
 *
 * @package Wizards
 *
 * SPDX-FileCopyrightText: 2026 Giacomo Tenaglia <giacomo.tenaglia@gmail.com>
 * SPDX-License-Identifier: GPL-3.0-or-later
 */

get_header();

if ( is_home() ) {
	$wizards_title = is_front_page() ? __( 'À la une', 'wizards' ) : single_post_title( '', false );
} elseif ( is_search() ) {
	/* translators: %s: search query. */
	$wizards_title = sprintf( __( 'Recherche : %s', 'wizards' ), get_search_query() );
} elseif ( is_archive() ) {
	$wizards_title = get_the_archive_title();
} else {
	$wizards_title = __( 'Actualités', 'wizards' );
}
?>
<section class="card news">
	<h1 class="news__title"><?php echo wp_kses_post( $wizards_title ); ?></h1>
	<?php if ( is_archive() && get_the_archive_description() ) : ?>
		<div class="news__intro"><?php the_archive_description(); ?></div>
	<?php endif; ?>

	<?php if ( have_posts() ) : ?>
		<div class="news__grid">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/news', 'card' );
			endwhile;
			?>
		</div>
		<?php wizards_pagination(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'Aucun contenu trouvé.', 'wizards' ); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</section>
<?php
get_footer();
