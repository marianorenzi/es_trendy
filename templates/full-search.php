<?php
/**
 * Compact top search from template
 */
if ( ! empty( $es_trendy_options->top_background_id ) ) {
	$top_background       = wp_get_attachment_image_src( $es_trendy_options->top_background_id, 'full-search-background'  );
	$top_background_image = $top_background[0];
} else {
	$top_background_image = ES_TRENDY_URL . 'assets/images/banner_image.jpg';
}
global $es_trendy_options;

?>
<div class="search--full">
    <div class="search--full-blur" style="background-image: url(<?php echo $top_background_image; ?>);"></div>
    <div  class="search--full-wrapper">
		<div class="search--full-container" ><?php dynamic_sidebar( 'top-banner-sidebar' ); ?></div>
	</div>
</div>
