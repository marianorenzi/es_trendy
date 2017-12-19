<?php

/**
 * @var Es_Agent $agent
 */

$agent_user = $agent->get_entity(); ?>

<div class="es-agent__item">
    <div class="es-agent__wrapper">
        <div class="es-agent__image">
            <?php if ( $image = $agent->get_image_url( 'agent-picture' ) ): ?>
                <img src="<?php echo $image; ?>" alt="<?php _e( 'Agent profile image', 'es-trendy' ); ?>">
            <?php else: ?>
	            <img src="<?php echo ES_TRENDY_URL . 'assets/images/unknown_agent.png'; ?>" alt="<?php _e( 'Agent profile image', 'es-trendy' ); ?>">
            <?php endif; ?>
        </div>
        <div class="es-agent__head">
            <?php
                $agent_full_name = $agent->get_full_name();
            ?>
            <?php if ( !empty( $agent_full_name ) ):?>
                <div class="es-agent__name es-agent__content">
                    <?php echo $agent->get_full_name(); ?>
                </div>
            <?php endif;?>
            <div class="es-rating es-agent__content" data-rating="<?php echo $agent->rating; ?>"></div>
            <?php if ( !empty( $agent->tel ) ):?>
                <div class="es-agent__tel es-agent__content">
                    <?php echo $agent->tel; ?>
                </div>
            <?php endif;?>
            <?php if ( $email = $agent_user->user_email ) : ?>
                <a class="es-agent__email es-agent__content" href="mailto:<?php echo $email; ?>"><?php echo $email ?></a>
            <?php endif; ?>
            <?php if ( $url = $agent_user->user_url ) : ?>
                <a class="es-agent__url es-agent__content" href="<?php echo $url; ?>"><?php echo $url; ?></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="es-agent__footer">
        <div class="es-agen__footer-wrapper">
            <?php if ( $agent->company ) : ?>
                <div class="es-agent__field es-agent__company es-agent__content">
                    <?php _e( 'Company', 'es-trendy' ); ?>: <?php echo $agent->company; ?>
                </div>
            <?php endif; ?>
            <?php if ( $custom = $agent->get_custom_data() ) : ?>
                <?php foreach ( $custom as $key => $value ) : ?>
                    <div class="es-agent__field es-agent__content">
                        <?php echo key( $value ); ?>: <?php echo $value[ key( $value ) ]; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="es-agent__description es-agent__content">
                <?php echo $agent_user->description; ?>
            </div>
            <?php if ( $sold = $agent->property_qty ) : ?>
                <div class="es-agent__field es-field__sold es-agent__content">
                    <?php echo __( 'Properties sold', 'es-trendy' ) . ': <strong>' . $sold . '</strong>' ; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
