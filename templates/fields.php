<?php global $post;?>
<div class="es-property-fields">
	<div class="es-cat-price">
		<?php $terms = get_the_terms( $post, 'es_category' );?>
		<?php if ( ! empty( $terms ) ): ?>
			<div class="es-property-categories-wrapper">
				<?php $terms = get_the_terms( $post, 'es_category' );
				$terms_output = array(); ?>
				<?php
				for ( $i = 0; $i < 2; $i ++ ):
					if ( ! empty( $terms[ $i ] ) ):?>
						<span class="es-property-categories">
								<a href="<?php echo get_term_link( $terms[ $i ] ); ?>"
								   class="<?php echo $terms[$i]->slug; ?>"><?php echo $terms[ $i ]->name; ?></a>
							</span>
					<?php endif;
				endfor; ?>
			</div>
		<?php endif; ?>
		<?php es_the_formatted_price( ); ?>
	</div>
	<ul>
		<?php if ( $fields = Es_Property_Single_Page::get_single_fields_data() ) : ?>
			<?php foreach ( $fields as $field ) : ?>
				<?php if ( ! empty( $field[ key( $field ) ] ) && ! is_array( $field[ key( $field ) ] ) ) : ?>
					<li><span class="es_prop_single_basic_info__label"><?php echo key( $field ); ?>: </span><span><?php echo $field[ key( $field ) ]; ?></span></li>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
	<div>
		<h4><?php _e( 'Share this:', 'es-trendy' );?></h4>
		<?php do_action( 'es_single_share' ); ?>
	</div>
</div>