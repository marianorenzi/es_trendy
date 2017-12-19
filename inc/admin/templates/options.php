<?php global $es_trendy_options; ?>

<div class='wrap es-wrap es-settings-wrap'>
	<?php echo Trendy_Theme::get_logo(); ?>

	<h1><?php _e( 'Theme Options', 'es-trendy' ); ?></h1>

	<form action='' method="POST">

		<div class="es-header-button">
			<span><?php _e( 'Please fill up your Theme Options and click save to finish.', 'es-trendy' ); ?></span>
			<input type="submit" value="<?php _e( 'Save', 'es-trendy' ); ?>">
		</div>

		<?php if ( $tabs = Trendy_Options_Page::get_tabs() ): ?>
			<div class='nav-tab-wrapper es-box'>
				<ul>
					<?php foreach ( $tabs as $key => $tab ):?>
						<li><a href='#es-<?php echo $key; ?>-tab'><?php echo $tab['label'] ?></a></li>
						<?php
					endforeach; ?>
				</ul>
				<?php foreach ( $tabs as $key => $tab ):?>
					<div id='es-<?php echo $key; ?>-tab'>
						<?php require_once $tab['template']; ?>
					</div>
					<?php
				endforeach; ?>
			</div>
		<?php endif; ?>
		<?php wp_nonce_field( 'es_trendy_save_options', 'es_trendy_save_options' ); ?>
	</form>
</div>
