<?php
/**
 * Compact top search from template
 */

global $es_trendy_options;
$instance = array(
	'title' => __( 'Quick search', 'es-trendy' ),
	'layout' => 'horizontal',
	'fields' => array('address'),
	'display_type' => 'all'
);
if ( ! empty( $es_trendy_options->search_background_id ) ) {
	$search_background       = wp_get_attachment_image_src( $es_trendy_options->search_background_id, 'compact-search-form-background' );
	$search_background_image = $search_background[0];
} else {
	$search_background_image = ES_TRENDY_URL . 'assets/images/search_background.jpg';
}
if ( ! empty( $es_trendy_options->top_background_id ) ) {
	$top_background       = wp_get_attachment_image_src( $es_trendy_options->top_background_id, 'compact-search-background' );
	$top_background_image = $top_background[0];
} else {
	$top_background_image = ES_TRENDY_URL . 'assets/images/banner_image.jpg';
}
?>
<div class="search--compact">
    <div class="search--compact-blur" style="background-image: url(<?php echo $top_background_image; ?>);"></div>
	<div class="search--compact-wrapper">
		<div class="left-container">
			<?php if( !empty( $es_trendy_options->top_big_slogan ) ):?>
				<h1 style="color:<?php echo $es_trendy_options->top_slogan_color;?>"><?php echo $es_trendy_options->top_big_slogan;?></h1>
			<?php endif;?>
			<?php if( !empty( $es_trendy_options->top_small_slogan ) ):?>
				<h2 style="color:<?php echo $es_trendy_options->top_slogan_color;?>"><?php echo $es_trendy_options->top_small_slogan;?></h2>
			<?php endif;?>
		</div>
		<div class="right-container" style="background-image: url(<?php echo $search_background_image; ?>);">
			<?php if ( class_exists( 'Es_Search_Widget' ) ):?>
				<?php the_widget('Es_Search_Widget', $instance);?>
			<?php endif;?>
		</div>
	</div>

</div>
