<?php

/**
 * Banners widget.
 *
 * @var array $instance
 * @var array $args
 * @var Es_Trendy_Banners_Widget $this
 */

echo $args['before_widget'];

$banner_link   = ! empty( $instance['banner_link'] ) ? $instance['banner_link'] : null;
$banner_img_id = ! empty( $instance['banner_img_id'] ) ? $instance['banner_img_id'] : null;
$img           = wp_get_attachment_image( $banner_img_id, 'origin' );

?>

<?php do_action( 'es_before_banners_widget' ); ?>
<?php if ( !empty( $banner_link ) ):?>
	<a href="<?php echo $banner_link;?>">
		<?php echo $img;?>
	</a>
<?php else:?>
	<?php echo $img;?>
<?php endif;?>
<?php do_action( 'es_after_banners_widget' ); ?>
<?php echo $args['after_widget'];
