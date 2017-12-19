<?php
/**
 * The template Name: Page without title
 **/

global $es_trendy_options;

?>
<?php get_header(); ?>
<?php if ( is_active_sidebar( 'top-sidebar' ) ) dynamic_sidebar( 'top-sidebar' ); ?>
	<div class="main-block">
		<div class="main-block__wrapper">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="article-block__copy">
					<?php the_content(); ?>
				</div>
			<?php endwhile; // End of the loop.?>
		</div>
	</div>
<?php if ( is_active_sidebar( 'bottom-sidebar' ) ) dynamic_sidebar( 'bottom-sidebar' ); ?>

<?php get_footer();
