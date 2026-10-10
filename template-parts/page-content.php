<?php
/**
 * Page or post body: a header card (title, optional photo) and a content card.
 *
 * Accepts $args['wide'] = true for the full-width template.
 *
 * @package Wizards
 */

$wizards_wide   = ! empty( $args['wide'] );
$wizards_parent = is_page() ? wp_get_post_parent_id( get_the_ID() ) : 0;
$wizards_media  = has_post_thumbnail();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="card page-header<?php echo $wizards_media ? ' page-header--media' : ''; ?>">
		<div class="page-header__copy">
			<?php if ( $wizards_parent ) : ?>
				<p class="eyebrow">
					<a href="<?php echo esc_url( get_permalink( $wizards_parent ) ); ?>"><?php echo esc_html( get_the_title( $wizards_parent ) ); ?></a>
				</p>
			<?php elseif ( 'post' === get_post_type() ) : ?>
				<p class="eyebrow">
					<?php echo esc_html( wizards_card_label() ); ?> &middot;
					<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
				</p>
			<?php endif; ?>
			<?php the_title( '<h1 class="page-header__title">', '</h1>' ); ?>
		</div>
		<?php if ( $wizards_media ) : ?>
			<div class="page-header__media">
				<?php the_post_thumbnail( 'large', array( 'alt' => '' ) ); ?>
			</div>
		<?php endif; ?>
	</header>

	<div class="card entry-content is-layout-constrained<?php echo $wizards_wide ? ' entry-content--wide' : ''; ?>">
		<?php
		the_content();
		wp_link_pages(
			array(
				'before' => '<nav class="page-links">' . esc_html__( 'Pages :', 'wizards' ),
				'after'  => '</nav>',
			)
		);
		?>
	</div>

	<?php if ( comments_open() || get_comments_number() ) : ?>
		<div class="card comments-card">
			<?php comments_template(); ?>
		</div>
	<?php endif; ?>
</article>
