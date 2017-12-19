<?php global $es_property, $es_settings; ?>

<div class="es-gallery property_gallery">
	<?php if ( $gallery = $es_property->gallery ) : ?>
		<div class="es-gallery-inner">
			<?php if ( $es_settings->show_labels ) : ?>
				<ul class="es-property-label-wrap">
					<?php
					foreach ($es_property->get_labels_list() as $label ) :
						$value = $es_property->{$label->slug}; ?>
						<?php if ( ! empty( $value ) ) : ?>
						<li class="es-property-label es-property-label-<?php echo $label->slug; ?>"
						    style="background-color:<?php echo es_get_the_label_color( $label->term_id ); ?>"><?php _e( $label->name,
								'es-trendy' ); ?></li><br>
					<?php endif; ?>
					<?php
					endforeach; ?>
				</ul>
			<?php endif; ?>
			<div class="es-gallery-image">
				<?php
				foreach ( $gallery as $value ) : ?>
					<div>
						<a href="<?php echo wp_get_attachment_image_url( $value, 'full' ); ?>">
							<?php echo wp_get_attachment_image( $value, 'es-image-size-archive' ); ?>
						</a>
					</div>
				<?php
				endforeach; ?>
			</div>

			<div class="es-gallery-image-pager-wrap">
				<a href="#" class="slick-arrow slick-prev"><i class="fa fa-angle-left"></i></a>
				<div class="es-gallery-image-pager">
					<?php
					foreach ( $gallery as $value ) : ?>
						<div>
							<?php echo wp_get_attachment_image( $value, 'es-image-size-gallery-thumb' ); ?>
						</div>
					<?php
					endforeach; ?>
				</div>
				<a href="#" class="slick-arrow slick-next"><i class="fa fa-angle-right"></i></a>
			</div>
		</div>
	<?php else: ?>
		<img src="<?php echo ES_TRENDY_URL . 'assets/images/no-home.jpg';?>" alt="<?php _e( 'No Image', 'es-trendy' );?>">
	<?php endif; ?>
</div>
