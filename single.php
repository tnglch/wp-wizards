<?php
/**
 * Single post.
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
	?>
	<nav class="card post-nav" aria-label="<?php esc_attr_e( 'Articles', 'wizards' ); ?>">
		<?php
		previous_post_link( '<span class="post-nav__prev">%link</span>', '&larr; %title' );
		next_post_link( '<span class="post-nav__next">%link</span>', '%title &rarr;' );
		?>
	</nav>
	<?php
endwhile;

get_footer();
