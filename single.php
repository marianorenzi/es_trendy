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
?>

<?php get_header(); ?>
<?php if ( is_active_sidebar( 'top-sidebar' ) ) dynamic_sidebar( 'top-sidebar' ); ?>
	<div class="main-block">
		<div class="main-block__wrapper">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="article-block__container">
					<?php the_post_thumbnail(); ?>
					<div class="article-block__title">
						<div class="latest-new__date article-block__date">
							<p><?php the_date( 'M d Y' ); ?></p>
						</div>
						<?php the_title( '<h1>', '</h1>' ); ?>
					</div>
					<div class="article-block__header">
						<p class="article-block__posted">
							<i class="glyphicon-bookmark"></i>
							<span><?php _e( 'Posted in', 'es-trendy' ); ?> <?php the_category(', ');?></span>
						</p>
						<p class="article-block__reply">
							<i class="glyphicon-comment"></i>
							<span><?php echo comments_number(); ?></span>
						</p>
					</div>
					<div class="article-block__copy">
						<?php the_content(); ?>
					</div>

						<div class="article-block__footer">

					        <span class="article-block__tags">

						        <?php the_tags('<i class="fa fa-tag fa-flip-horizontal" aria-hidden="true"></i> ', ', ');?>

					        </span>
						</div>
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
				</div>
			<?php endwhile; // End of the loop.?>
			<div class="sidebar">
				<?php if ( is_active_sidebar( 'article-sidebar-right' ) ) dynamic_sidebar( 'article-sidebar-right' ); ?>
			</div>
		</div>
	</div>
<?php if ( is_active_sidebar( 'bottom-sidebar' ) ) dynamic_sidebar( 'bottom-sidebar' ); ?>
<?php get_footer();
