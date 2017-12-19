<?php

/**
 * Contact map widget.
 *
 * @var array $instance
 * @var array $args
 * @var Es_Trendy_Contact_Info_Widget $this
 */

global $es_trendy_options;
$address = $es_trendy_options->contact_address;
$phone = $es_trendy_options->contact_tel;
$email = $es_trendy_options->contact_email;
echo $args['before_widget']; ?>

	<div class="es-widget-wrapper">

		<?php do_action( 'es_before_contact_info_widget' ); ?>

		<div class="contact-block-line">
			<div class="contact-block-line__container">
				<?php if ( ! empty( $address ) || ! empty( $phone ) || ! empty( $email ) ): ?>
					<ul class="contact-block-line__grid">
						<?php if ( ! empty( $address ) ): ?>
							<li>
								<p><i class="fa fa-map-marker" aria-hidden="true"></i></p>
								<p class="contact-block-line__content"><?php echo $address; ?></p>
							</li>
						<?php endif; ?>
						<?php if ( ! empty( $phone ) ): ?>
							<li>
								<p><i class="fa fa-phone"></i></p>
								<p class="contact-block-line__content"><?php echo $phone; ?></p>
							</li>
						<?php endif; ?>
						<?php if ( ! empty( $email ) ): ?>
							<li>
								<p><i class="fa fa-envelope"></i></p>
								<p class="contact-block-line__content"><?php echo $email; ?></p>
							</li>
						<?php endif; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>

		<?php do_action( 'es_after_contact_info_widget' ); ?>
	</div>
<?php echo $args['after_widget'];
