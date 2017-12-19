<?php

/**
 * @var string $uid
 * @var WP_Post[] $posts
 * @var array $atts
 */

global $post;

$temp = $post;
$classes = $atts['slides_to_show'] > 1 && count($posts) > 1 ? ' es-slideshow-slide-margin' : ''; ?>

<div class="es-slideshow es-slideshow__<?php echo $atts['layout'] . $classes; ?>" id="es-slideshow__<?php echo $uid; ?>">
	<ul>
		<?php foreach ( $posts as $_post ) : $post = $_post; $property = es_get_property( $post->ID ); ?>
			<?php if ( ! empty( $property->gallery ) ) : ?>
				<li>
					<div class="es-slide es-slide__<?php the_ID(); ?>">
						<div class="es-slide__image">
							<a href="<?php the_permalink(); ?>">
								<?php es_the_post_thumbnail( 'slideshow-image' ); ?>
							</a>
							<div class="es-slide__top">
                                <?php $categories = get_the_terms( $post, 'es_category' );?>
								<?php if ( ! empty( $categories ) ): ?>
									<?php $terms = get_the_terms( $post, 'es_category' );
									$terms_output = array(); ?>
								<div>
									<?php
									for ( $i = 0; $i < 2; $i ++ ):
										if ( ! empty( $terms[ $i ] ) ):?>
										<a href="<?php echo get_term_link( $terms[ $i ] ); ?>"
											class="<?php echo $terms[$i]->slug; ?>"><?php echo $terms[$i]->name; ?></a>
										<?php endif;
									endfor; ?>
								</div>
								<?php endif; ?>
								<?php es_the_formatted_price(); ?>
							</div>
						</div>
						<div class="es-slide__content">
							<div class="es-slide__bottom">
								<?php es_the_formatted_area( '<span class="es-bottom-icon"><i class="es-icon es-squirefit" aria-hidden="true"></i> ', '</span>' ); ?>
								<?php es_the_formatted_bedrooms( '<span class="es-bottom-icon"><i class="es-icon es-bed" aria-hidden="true"></i> ', '</span>' ); ?>
								<?php es_the_formatted_bathrooms( '<span class="es-bottom-icon"><i class="es-icon es-bath" aria-hidden="true"></i> ', '</span>' ); ?>
							</div>
						</div>
					</div>
				</li>
			<?php endif; ?>
		<?php endforeach; $post = $temp; ?>
	</ul>
</div>
