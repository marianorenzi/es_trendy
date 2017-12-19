<?php

/**
 * Why Choose Us widget.
 *
 * @var array $instance
 * @var array $args
 * @var Es_Trendy_Why_Choose_Us_Widget $this
 */

echo $args['before_widget'];

foreach ( $this::get_blocks_arr() as $key => $value) {
	$pages[] = ! empty( $instance['page' . $key] )        ? $instance['page' . $key]          : null;
}

$background_id = ! empty( $instance['background_id'] ) ? $instance['background_id'] : null;
$background    = wp_get_attachment_image_src( $background_id, 'original' );
?>

<?php do_action( 'es_before_why_choose_us_widget' ); ?>
	<div class="why-choose-us" <?php if ( !empty( $background[0] ) ):?> style="background-image: url(<?php echo $background[0];?>)" <?php endif;?>>
		<div class="why-choose-us__wrapper">
		<?php if ( !empty( $pages ) ):?>
			<ul class="why-choose-us__container">
				<?php foreach ( $pages as $page): $post = get_post($page); ?>
					<?php $button_label = get_post_meta($post->ID, 'page_button_label', true);?>
				<li>
					<div class="why-choose-us__border-container">
						<div class="why-choose-us__why-choose-img">
							<?php echo get_the_post_thumbnail( $post, 'thumbnail_280x184');?>
						</div>
						<h3><?php echo apply_filters('the_title', $post->post_title);?></h3>
						<p class="why-choose-us__description">
							<?php echo wp_trim_words( $post->post_content, 25 );?>
						</p>
						<a href="<?php echo get_the_permalink($post);?>" class="btn-black"><?php echo !empty($button_label) ? $button_label : __('View', 'es-trendy');?></a>
					</div>
				</li>
				<?php endforeach;?>
			</ul>
		<?php endif;?>
		</div>
	</div>
<?php do_action( 'es_after_why_choose_us_widget' ); ?>
<?php echo $args['after_widget'];
