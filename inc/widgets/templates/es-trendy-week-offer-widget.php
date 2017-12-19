<?php

/**
 * Week Offer widget.
 *
 * @var array $instance
 * @var array $args
 * @var Es_Trendy_Week_Offer_Widget $this
 */

echo $args['before_widget'];

$title    = $instance['title'];
$property = $instance['property'];
if ( function_exists( 'es_get_property' ) ) {
	$es_property = es_get_property( $property );
	$post = get_post( $property );
}


?>

<?php do_action( 'es_before_week_offer_widget' ); ?>
	<div class="offer-of-the-week">
		<h1><?php echo $title; ?></h1>
		<?php if ( ! empty( $es_property ) ): ?>
			<?php if ( ! empty( $es_property->gallery ) ) : ?>
				<?php  echo wp_get_attachment_image( $es_property->gallery[0], 'offer-thumbnail'  ); ?>
			<?php elseif ( $image = es_get_default_thumbnail( 'offer-thumbnail' ) ) : ?>
				<?php echo $image; ?>
			<?php endif; ?>
			<h2><?php echo apply_filters( 'the_title', $post->post_title);?></h2>
			<p class="offer-of-the-week__description">
				<?php echo wp_trim_words( strip_tags( strip_shortcodes( $post->post_content ) ), 25 );?>
			</p>
			<a class="offer-of-the-week__button btn-black" href="<?php echo get_the_permalink( $post );?>"><?php _e( 'Go on reading' , 'es-trendy' );?></a>
		<?php endif; ?>
	</div>
<?php do_action( 'es_after_week_offer_widget' ); ?>
<?php echo $args['after_widget'];
