<?php
/**
 * Comments.
 *
 * @package Wizards
 *
 * SPDX-FileCopyrightText: 2026 Giacomo Tenaglia <giacomo.tenaglia@gmail.com>
 * SPDX-License-Identifier: GPL-3.0-or-later
 */

if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="comments">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments__title">
			<?php
			/* translators: %s: number of comments. */
			printf( esc_html( _n( '%s commentaire', '%s commentaires', get_comments_number(), 'wizards' ) ), esc_html( number_format_i18n( get_comments_number() ) ) );
			?>
		</h2>
		<ol class="comments__list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 40,
				)
			);
			?>
		</ol>
		<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php comment_form(); ?>
</section>
