<?php

/**
 * @var Es_Settings_Container $es_settings
 */

get_header();
$template = get_option( 'template' );
global $es_settings;
?>
<?php if ( is_active_sidebar( 'top-sidebar' ) ) dynamic_sidebar( 'top-sidebar' ); ?>
<?php do_action( 'es_before_content' ); ?>
	<div class="main-block">
	<div class="main-block__wrapper">
		<?php do_action( 'es_before_content_list' ); ?>
		<div class="es-wrap <?php echo get_option( 'template' ); ?>">
			<h1><?php echo ! empty( $title ) ? $title : __( 'Properties', 'es-trendy' ); ?></h1>
			<?php do_action( 'es_archive_sorting_dropdown' ); ?>
			<?php if ( have_posts() ): ?>
				<ul class="es-listing es-layout-<?php echo $es_settings->listing_layout; ?>">
					<?php while ( have_posts() ) : the_post();
								load_template( ES_TRENDY_TEMPLATES_DIR . 'content-archive.php', false );
					endwhile;  ?>
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
			<?php do_action( 'es_after_content_list' ); ?>
		</div>
	</div>
<?php do_action( 'es_after_content' ); ?>
<?php if ( is_active_sidebar( 'bottom-sidebar' ) ) dynamic_sidebar( 'bottom-sidebar' ); ?>
<?php get_footer();
