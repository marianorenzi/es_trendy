<?php

/**
 * @var $post WP_Post
 * @var $property Es_Property
 * @var $es_settings Es_Settings_Container
 *
 */

global $es_settings;

$bedrooms = es_get_the_property_field( 'bedrooms' );
$bathrooms = es_get_the_property_field( 'bathrooms' );
$property = es_get_property( $post->ID );

$categories = $term_list = get_the_terms( $post, 'es_category' );

if ( $categories ) {
	foreach ( $categories as $category ) {
		$cat_arr[] = '<a href="' . get_term_link( $category,
				'es_category' ) . '" target="_blank">' .  $category->name . '</a>';
	}
}

$color = ! empty( $args['marker']['color'] ) ? $args['marker']['color'] : $args['default_color']; ?>

<div class="es-overlay">
	<div class="es-overlay__inner">
		<div class="es-overlay__head" style="background: <?php echo $color; ?>">
            <span class="es-overlay__title">
	            <?php echo isset( $cat_arr ) ? implode( ', ', $cat_arr ) . '|' : ''; ?>
	            <?php es_the_address(); ?>
            </span>
			<a href="" class="es-overlay__close"><i class="es-overlay__close-symbol">+</i></a>
		</div>
		<div class="es-overlay__info">
			<div class="es-overlay__image">
				<?php if ( ! empty( $property->gallery ) ) : ?>
					<?php es_the_post_thumbnail( 'es-image-size-archive' ); ?>
				<?php else: ?>
					<?php es_get_empty_image( 'es-image-size-archive' ); ?>
				<?php endif; ?>
			</div>
			<div class="es-overlay__content">
				<?php es_the_address( '<span class="es-content__address">', '</span>' ); ?>

				<ul class="es-overlay__list">
					<?php es_the_formatted_bedrooms( '<li>', '</li>' ); ?>
					<?php es_the_formatted_area( '<li>', '</li>' ); ?>
					<?php es_the_formatted_bathrooms( '<li>', '</li>' ); ?>
				</ul>
                <div class="es-overlay__button-wrap">
	                <?php es_the_formatted_price(); ?>
                    <a target="_blank" class="es-overlay__more-link"
                       href="<?php echo get_permalink( $post ); ?>"><?php _e( 'Details', 'es-trendy' ); ?></a>
                </div>

			</div>
		</div>
	</div>
</div>
