<?php
/**
 * News card used in listings.
 *
 * @package Wizards
 */

?>
<a class="news-card" href="<?php the_permalink(); ?>">
	<?php if ( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail( 'medium_large', array( 'class' => 'news-card__img', 'alt' => '' ) ); ?>
	<?php endif; ?>
	<p class="news-card__date">
		<?php echo esc_html( wizards_card_label() ); ?>
		<?php if ( 'post' === get_post_type() ) : ?>
			&middot; <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'j M Y' ) ); ?></time>
		<?php endif; ?>
	</p>
	<h2 class="news-card__title"><?php the_title(); ?></h2>
	<p><?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ) ); ?></p>
</a>
