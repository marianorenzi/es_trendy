<?php

/**
 * Testimonials widget.
 *
 * @var array $instance
 * @var array $args
 * @var Es_Trendy_Testimonials_Widget $this
 */

echo $args['before_widget'];

$title = $instance['title'];
$amount = $instance['amount'];
$testimonials_query = new WP_Query(array(
	'post_type' => 'testimonials',
	'post_status' => 'publish',
	'posts_per_page' => $amount
));
$background = wp_get_attachment_image_src($instance['attachment_id'], 'original');
?>

<?php do_action( 'es_before_testimonials_widget' ); ?>
	<div class="testimonials" <?php if ( !empty( $background[0] ) ):?> style="background-image: url(<?php echo $background[0];?>)" <?php endif;?>>
		<div class="testimonials__wrapper">
			<section class="testimonials__container">
				<h1><?php echo $title;?></h1>
				<div class="testimonials__quote">“</div>
				<?php if( $testimonials_query->have_posts() ):?>
					<ul <?php if ( $testimonials_query->post_count > 1 ):?>class="testimonials__slider"<?php endif;?>>
						<?php while ($testimonials_query->have_posts() ) : $testimonials_query->the_post();?>
						<li>
							<?php the_content();?>
							<?php
							$author = get_post_meta(get_the_ID(), 'testimonial_author_field', true);
							$company = get_post_meta(get_the_ID(), 'testimonial_company_field', true);
							?>
							<?php if ( !empty( $author ) || !empty( $company )):?>
								<div class="testimonials__source">
									<?php if ( !empty( $author ) ):?>
										<span class="testimonials__autor"><?php echo $author;?>,</span>
									<?php endif;?>
									<?php if ( !empty( $company ) ):?>
										<span class="testimonials__company"><?php echo $company;?></span>
									<?php endif;?>
								</div>
							<?php endif;?>
						</li>
							<?php endwhile;?>
					</ul>
					<div>
						<div class="bx-controls-direction"></div>
					</div>
					<?php wp_reset_query(); endif;?>
			</section>
		</div>
	</div>

<?php do_action( 'es_after_testimonials_widget' ); ?>
<?php echo $args['after_widget'];
