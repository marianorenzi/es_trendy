<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Estatik_Theme_Trendy
 * @since Estatik Theme Trendy 1.0
 */
global $es_trendy_options;
$background = wp_get_attachment_image_src( $es_trendy_options->not_found_background_id, 'original' );
get_header(); ?>
<?php if ( is_active_sidebar( 'top-sidebar' ) ) dynamic_sidebar( 'top-sidebar' ); ?>
	<div class="main-block">
		<div class="not-found__background" <?php if ( !empty( $background ) ):?>style="background-image: url(<?php echo $background[0]; ?>)" <?php endif;?>>
			<?php if(!empty($es_trendy_options->not_found_title)):?>
				<h1><?php echo apply_filters( 'the_title', $es_trendy_options->not_found_title ); ?></h1>
			<?php endif;?>
			<div><?php echo apply_filters( 'the_content', stripslashes( $es_trendy_options->not_found_text ) ); ?>
				<?php if ( !empty( $es_trendy_options->not_found_button_label ) ):?>
					<a class="theme-btn"
					   href="<?php echo site_url(); ?>"><?php echo $es_trendy_options->not_found_button_label; ?></a>
				<?php endif;?>
			</div>
		</div>
	</div>
<?php if ( is_active_sidebar( 'bottom-sidebar' ) ) dynamic_sidebar( 'bottom-sidebar' ); ?>
<?php get_footer();

