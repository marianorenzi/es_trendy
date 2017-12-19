<?php

/**
 * The single template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Estatik_Theme_Trendy
 * @since Estatik Theme Trendy 1.0
 */
 global $es_property, $es_settings;
?>

<?php get_header(); ?>
<?php if ( is_active_sidebar( 'top-sidebar' ) ) dynamic_sidebar( 'top-sidebar' ); ?>
	<div class="main-block">
		<div class="main-block__wrapper">
			<div class="article-block__container es-single-<?php echo $es_settings->single_layout; ?>">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; // End of the loop.?>
			</div>
			<div class="sidebar">
				<?php if ( is_active_sidebar( 'property-sidebar-right' ) ) {
					dynamic_sidebar( 'property-sidebar-right' );
				} else {
					the_widget( 'Es_Request_Widget',
						array( 'title' => __( 'Learn more about this property', 'es-trendy' ) ) );
				} ?>
			</div>
		</div>
	</div>
<?php
if ( is_active_sidebar( 'bottom-sidebar' ) ){
	dynamic_sidebar( 'bottom-sidebar' );
}
?>
<?php get_footer();
