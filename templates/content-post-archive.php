<?php

/**
 * @file content-post-archive.php
 * Archive single template.
 */
?>
<a class="content-block__title" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
	<?php $post_thumbnail = get_the_post_thumbnail();?>
    <div class="content-block__image"
		<?php if ( empty( $post_thumbnail ) ): ?>
			style="background-image: url(<?php echo ES_TRENDY_URL . 'assets/images/no-image.png'; ?>);"
		<?php endif; ?>>
		<?php if ( $post_thumbnail ): ?>
			<?php the_post_thumbnail( 'trendy-archive' ); ?>
		<?php endif; ?>
		<div class="content-block__date latest-new__date">
			<p><?php echo get_the_date( 'M d Y' ); ?></p>
		</div>
	</div>
	<?php the_title( '<span>', '</span>' ); ?>
</a>
<div class="content-block__content">
	<?php the_excerpt(); ?>
</div>
