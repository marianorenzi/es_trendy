<?php
/**
 * The template Name: Page with right sidebar
 **/
?>

<?php get_header(); ?>

<?php if ( is_active_sidebar( 'top-sidebar' ) ) dynamic_sidebar( 'top-sidebar' ); ?>
	<div class="main-block">
		<div class="main-block__wrapper">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="article-block__copy">
					<?php the_title( '<h1>', '</h1>' ); ?>
					<?php the_content(); ?>
				</div>
			<?php endwhile; // End of the loop.?>
			<?php if ( is_dynamic_sidebar( 'page-sidebar-right' ) ): ?>
				<div class="sidebar">
					<?php if ( is_active_sidebar( 'page-sidebar-right' ) ) dynamic_sidebar( 'page-sidebar-right' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php if ( is_active_sidebar( 'bottom-sidebar' ) ) dynamic_sidebar( 'bottom-sidebar' ); ?>

<?php get_footer();
