<?php

/**
 * The archive template file
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
?>

<?php get_header(); ?>
<?php if ( is_active_sidebar( 'top-sidebar' ) ) dynamic_sidebar( 'top-sidebar' ); ?>
	<div class="main-block">
		<div class="main-block__wrapper">
			<div class="content-block__container">
				<?php the_archive_title( '<h1>', '</h1>' ); ?>
				<?php if ( have_posts() ): ?>
					<ul class="content-block__grid">
						<?php while ( have_posts() ) : the_post(); ?>
							<li>
								<?php get_template_part('templates/content-post-archive');?>
							</li>
						<?php endwhile; ?>
					</ul>
                    <?php the_posts_pagination( array(
                        'prev_next'          => __( 'Previous', 'es-trendy' ),
                        'show_all'           => false,
                        'end_size'           => 2,
                        'mid_size'           => 2,
                        'screen_reader_text' => ' ',
                        'type'               => 'list'
                    ) ); ?>
				<?php else: ?>
					<p><?php _e( 'Sorry, nothing found', 'es-trendy' ); ?></p>
				<?php endif; ?>
			</div>
			<div class="sidebar">
				<?php if ( is_active_sidebar( 'article-sidebar-right' ) ) dynamic_sidebar( 'article-sidebar-right' ); ?>
			</div>
		</div>
	</div>
<?php if ( is_active_sidebar( 'bottom-sidebar' ) ) dynamic_sidebar( 'bottom-sidebar' ); ?>
<?php get_footer();
