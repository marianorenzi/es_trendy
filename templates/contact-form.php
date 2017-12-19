<?php global $es_trendy_options, $es_settings; ?>
<section class="contact-block__form">
	<h1><?php echo $es_trendy_options->send_message_slug ?></h1>
	<div class="contact-block__send-form-wrapper">
		<form class="contact-block__send-form" action="" method="post">

            <div class="es-contact-msg"></div>

			<label><?php _e( 'Your name', 'es-trendy' ); ?></label>
			<input type="text" id="es_your_name" name="your_name" value="" data-validetta="required,minLength[3]"/>
			<label><?php _e( 'Your email', 'es-trendy' ); ?></label>
			<input type="text" id="es_your_email" name="your_email" value="" data-validetta="required,email"/>
			<label><?php _e( 'Your phone', 'es-trendy' ); ?></label>
			<input type="text" id="es_your_phone" name="your_phone" value="" data-validetta="number"/>
			<label><?php _e( 'Your Questions', 'es-trendy' ); ?></label>
			<textarea id="es_your_question" name="your_questions"></textarea>

			<?php if ( $es_settings->recaptcha_site_key ) : ?>
                <label for=""></label>
                <div><?php do_action( 'es_recaptcha' ); ?></div>
			<?php endif; ?>

            <input type="hidden" name="action" value="submit_contact_form"/>

			<div class="contact-block__button-container">
				<input class="es_button" type="submit" value="<?php _e( 'Send', 'es-trendy' ); ?>" name="contact_submit"/>
				<img src="<?php echo ES_TRENDY_URL; ?>assets/images/ajax-loader.gif"  class="ajax_loader" style="display:none"/>
			</div>
		</form>
	</div>
</section>
    <div class="message_sent" style="display:none;">
        <div class="message_sent__container">
			<?php if (!empty($es_trendy_options->message_sent_header )) :?>
                <h1><?php echo $es_trendy_options->message_sent_header ?></h1>
			<?php endif;?>
			<?php if (!empty($es_trendy_options->message_sent_text )) :?>
				<?php echo $es_trendy_options->message_sent_text ?>
			<?php endif;?>
        </div>
    </div>

