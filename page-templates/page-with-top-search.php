<?php
/**
 * The template Name: Page with top Estatik search
 **/

global $es_trendy_options;

?>
<?php get_header(); ?>
<?php switch ( $es_trendy_options->search_style ) {
	case 'compact':
		get_template_part( 'templates/compact-search' );
		break;
	case 'wide':
		get_template_part( 'templates/wide-search' );
		break;
	case 'full':
	default:
		get_template_part( 'templates/full-search' );
}
?>
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
