<?php

/**
 * Latest News widget.
 *
 * @var array $instance
 * @var array $args
 * @var Es_Trendy_Latest_News_Widget $this
 */

echo $args['before_widget'];

$title = $instance['title'];
$news_query = new WP_Query(array(
	'post_type' => 'news',
	'post_status' => 'publish',
	'posts_per_page' => 3,
	'orderby' => 'date',
	'order' => 'DESC',

));
?>

<?php do_action( 'es_before_latest_news_widget' ); ?>
	<div class="latest-news">
		<section class="latest-news__container">
			<h1><?php echo $title; ?></h1>
			<?php if ( $news_query->have_posts() ): ?>
				<ul class="latest-news__grid">
					<?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
						<li>
							<div class="latest-news__block-wrapper">
								<div class="latest-new__date">
									<p><?php the_modified_date('M d Y');?></p>
								</div>
								<a class="latest-new__title" href="<?php the_permalink();?>">
									<?php the_title(); ?>
								</a>
							</div>
							<div class="latest-new__content">
								<?php the_excerpt(); ?>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php wp_reset_query(); endif; ?>
		</section>
	</div>
<?php do_action( 'es_after_latest_news_widget' ); ?>
<?php echo $args['after_widget'];
