<?php

/**
 * Join Us Us widget.
 *
 * @var array $instance
 * @var array $args
 * @var Es_Trendy_Join_Us_Widget $this
 */

echo $args['before_widget'];

$page_id          = ! empty( $instance['page'] ) ? $instance['page'] : null;
$attachment_id = ! empty( $instance['attachment_id'] ) ? $instance['attachment_id'] : null;
$background    = wp_get_attachment_image_src( $attachment_id, 'original' );
?>

<?php do_action( 'es_before_join_us_widget' ); ?>
<?php if ( ! empty( $page_id ) ): $block_post = get_post( $page_id ); ?>
	<?php $button_label = get_post_meta( $block_post->ID, 'page_button_label', true ); ?>
	<div class="join-us" <?php if ( !empty( $background[0] ) ):?> style="background-image: url(<?php echo $background[0];?>)" <?php endif;?>>
		<div class="join-us__wrapper">
			<section class="join-us__container">
				<h1><?php echo apply_filters( 'the_title', $block_post->post_title ); ?></h1>
				<p>
					<?php echo wp_trim_words( $block_post->post_content, 25 ); ?>
				</p>
				<a class="theme-btn" href="<?php echo get_the_permalink( $block_post ); ?>"><?php echo ! empty( $button_label ) ? $button_label : __( 'View',
						'es-trendy' ); ?></a>
			</section>
		</div>
	</div>
<?php endif; ?>
<?php do_action( 'es_after_join_us_widget' ); ?>
<?php echo $args['after_widget'];
