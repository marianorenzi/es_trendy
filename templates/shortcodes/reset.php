<?php global $es_settings;
$messenger = new Es_Messenger( 'login' );
$valid     = ! empty( $_GET['_key'] ) && ! empty( $_GET['_login'] ); ?>

<?php if ( ! is_user_logged_in() ) : ?>
    <h2 class="es-login__wrap-name"><?php _e( 'Restore password', 'es-trendy' ); ?></h2>
	<div class="es-login__wrap">
		<?php $messenger->render_messages();
		$messenger->clean_container(); ?>
		<form action="" method="post">
			<div class="es-field__wrap es-field-icon">
				<label for="user_login">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<?php if ( $valid ) : ?>
						<input type="password" required name="pwd"
						       placeholder="<?php _e( 'Enter new password', 'es-trendy' ); ?>">
					<?php else: ?>
						<input type="text" name="user_login"
						       placeholder="<?php _e( 'Username or email address', 'es-trendy' ); ?>">
					<?php endif; ?>
				</label>
			</div>

			<?php if ( $valid ) : ?>
				<input type="hidden" name="_login" value="<?php echo $_GET['_login']; ?>"/>
				<input type="hidden" name="_key" value="<?php echo $_GET['_key']; ?>"/>
			<?php endif; ?>

			<div class="es-submit__wrap">
				<input type="submit" class="es-btn es-btn-orange"
				       value="<?php _e( 'Get new password', 'es-trendy' ); ?>">
			</div>

			<?php wp_nonce_field( 'es-restore-pwd', 'es-restore-pwd' ); ?>
			<input type="hidden" name="redirect" value="<?php the_permalink(); ?>"/>

			<?php if ( $valid ) : ?>
				<input type="hidden" name="action" value="fill_password"/>
			<?php endif; ?>
		</form>
	</div>
<?php else: ?>
	<div class="es-agent-register__logged">
		<?php _e( 'You are already logged in.', 'es-trendy' ); ?><br>
		<a href="<?php echo wp_logout_url( get_the_permalink() ); ?>"
		   class="es-agent__logout es-btn es-btn-orange-bordered"><?php _e( 'Logout', 'es-trendy' ); ?></a>
	</div>
<?php endif;
