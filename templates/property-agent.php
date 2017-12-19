<?php

/**
 * @var Es_Agent $agent
 */

$user = $agent->get_entity(); ?>

<div class="es-agent__item">
	<div class="es-agent__item--inner">

		<div class="es-agent__image">
			<?php if ( $image = $agent->get_image_url( 'property-agent' ) ): ?>
				<img src="<?php echo $image; ?>" alt="<?php _e( 'Agent profile image', 'es-trendy' ); ?>">
			<?php elseif ( $image = es_get_default_thumbnail( 'es-agent-size', 'agent' ) ) : ?>
				<?php echo $image; ?>
			<?php endif; ?>
		</div>

		<div class="es-agent__content">
			<div class="es-agent__content--right">
				<?php if ( $sold = $agent->property_qty ) : ?>
					<span class="es-agent__field es-field__sold">
						<?php echo __( 'Properties sold', 'es-trendy' ) . ': ' . $sold; ?>
					</span>
				<?php endif; ?>
				<span class="es-agent__field es-field__rating">
					<span class="es-field__label">
						<?php _e( 'Rating', 'es-trendy' ); ?>:
					</span>
					<div class="es-rating" data-rating="<?php echo $agent->rating; ?>"></div>
				</span>
			</div>
			<div class="es-agent__content--left">
				<span class="es-agent__field es-field__name"><?php echo $agent->get_full_name(); ?></span>
				<span class="es-agent__field es-field__tel"><?php echo $agent->tel; ?></span>

				<?php if ( $email = $user->user_email ) : ?>
				<span class="es-agent__field">
					<a href="mailto:<?php echo $email; ?>"><?php echo $email ?></a>
				</span>
				<?php endif; ?>

				<?php if ( $url = $user->user_url ) : ?>
					<span class="es-agent__field">
						<a href="<?php echo $url; ?>"><?php echo $url; ?></a>
					</span>
				<?php endif; ?>

				<?php if ( $custom = $agent->get_custom_data() ) : ?>
					<?php foreach ( $custom as $key => $value ) : ?>
						<span class="es-agent__field"><?php echo key( $value ); ?>: <?php echo $value[ key( $value ) ]; ?></span>
					<?php endforeach; ?>
				<?php endif; ?>

				<?php if ( $agent->company ) : ?>
					<span class="es-agent__field es-field__company"><?php _e( 'Company', 'es-trendy' ); ?>: <?php echo $agent->company; ?></span>
				<?php endif; ?>

				<span class="es-agent__field es-field__description">
					<?php echo $user->description; ?>
				</span>
			</div>
		</div>

	</div>
</div>
