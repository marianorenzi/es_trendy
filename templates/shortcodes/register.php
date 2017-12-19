<?php $logger = new Es_Messenger( 'es_agent_register' ); ?>

<div class="es-agent-register__wrap">
	<h2><?php _e( 'Register', 'es-trendy' ); ?></h2>

	<?php if ( ! get_current_user_id() ) : ?>

		<?php $logger->render_messages(); ?>

		<form action="" method="post" enctype="multipart/form-data">

			<div class="es-field">
				<div class="es-field__label">
					<label for="es-agent-name"><?php _e( 'Name', 'es-trendy' ); ?>:</label>
				</div>
				<div class="es-field__content">
					<input type="text" id="es-agent-name" name="es_agent[name]"/>
				</div>
			</div>

			<div class="es-field">
				<div class="es-field__label">
					<label for="es-agent-username"><?php _e( 'User name', 'es-trendy' ); ?>:</label>
				</div>
				<div class="es-field__content">
					<input type="text" id="es-agent-username" data-required name="es_agent[username]"/>
				</div>
			</div>

			<div class="es-field">
				<div class="es-field__label">
					<label for="es-agent-email"><?php _e( 'Email', 'es-trendy' ); ?>:</label>
				</div>
				<div class="es-field__content">
					<input type="email" id="es-agent-email" data-required name="es_agent[email]"/>
				</div>
			</div>

			<div class="es-field">
				<div class="es-field__label">
					<label for="es-agent-company"><?php _e( 'Company', 'es-trendy' ); ?>:</label>
				</div>
				<div class="es-field__content">
					<input type="text" id="es-agent-company" name="es_agent[company]"/>
				</div>
			</div>

			<div class="es-field">
				<div class="es-field__label">
					<label for="es-agent-tel"><?php _e( 'Tel', 'es-trendy' ); ?>:</label>
				</div>
				<div class="es-field__content">
					<input type="text" id="es-agent-tel" name="es_agent[tel]"/>
				</div>
			</div>

			<div class="es-field">
				<div class="es-field__label">
					<label for="es-agent-website"><?php _e( 'Www', 'es-trendy' ); ?>:</label>
				</div>
				<div class="es-field__content">
					<input type="text" id="es-agent-website" name="es_agent[website]"/>
				</div>
			</div>

			<div class="es-field">
				<div class="es-field__label">
					<label for="es-agent-about"><?php _e( 'About', 'es-trendy' ); ?>:</label>
				</div>
				<div class="es-field__content">
					<textarea name="es_agent[about]" id="es-agent-about"></textarea>
				</div>
			</div>

			<div class="es-field es-field__photo">
				<div class="es-field__label">
					<label for="es-agent-about"><?php _e( 'Photo/Logo', 'es-trendy' ); ?>:</label>
				</div>
				<div class="es-field__content">
					<div class="js-es-image"></div>

					<a href="#" class="es-upload-link js-trigger-upload" data-selector="#es-file-input">
						<i class="fa fa-upload" aria-hidden="true"></i>
						<span><?php _e( 'Upload photo', 'es-trendy' ); ?></span>
					</a>
					<input type="file" name="agent_photo" id="es-file-input" class="js-es-input-image"/>
				</div>
			</div>

			<div class="es-field">
				<div class="es-field__label"></div>
				<div class="es-field__content">
					<input type="submit" class="theme-btn" value="<?php _e( 'Register', 'es-trendy' ); ?>">
				</div>
			</div>

			<input type="hidden" name="_redirect" value="<?php the_permalink(); ?>"/>

			<?php wp_nonce_field( 'es_agent_registration', 'es_agent_registration' ); ?>
		</form>
	<?php else : ?>
		<div class="es-agent-register__logged">
			<?php _e( 'You are already logged in.', 'es-trendy' ); ?><br>
			<a href="<?php echo wp_logout_url( get_the_permalink() ); ?>"
			   class="theme-btn"><?php _e( 'Logout', 'es-trendy' ); ?></a>
		</div>
	<?php endif; ?>
</div>
