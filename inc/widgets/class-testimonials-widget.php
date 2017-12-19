<?php

/**
 * Class Es_Trendy_Testimonials_Widget
 */
class Es_Trendy_Testimonials_Widget extends Es_Trendy_Widget
{
	/**
	 * @inheritdoc
	 */
	public function __construct()
	{
		parent::__construct( 'es_trendy_testimonials_widget' , __( 'Trendy Testimonials', 'es-trendy' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_setup' ) );
	}


	/**
	 * @inheritdoc
	 */
	protected function get_widget_template_path()
	{
		return ES_TRENDY_WIDGETS_DIR . 'templates/es-trendy-testimonials-widget.php';
	}

	/**
	 * @return string
	 */
	protected function get_widget_form_template_path()
	{
		return ES_TRENDY_WIDGETS_DIR . 'forms/es-trendy-testimonials-widget-form.php';
	}

	/**
	 * Enqueue the javascript to admin panel.
	 */
	public function admin_setup() {

		// Only load on widget admin page and in the "Customizer" view.
		$screen      = get_current_screen();
		$should_load = 'customize' == $screen->base || 'widgets' == $screen->base;

		if ( ! $should_load ) {
			return;
		}

		wp_enqueue_media();

		wp_enqueue_script( 'es-trendy-admin-media', ES_TRENDY_ADMIN_CUSTOM_SCRIPTS_URL . 'media.js', array( 'jquery', 'media-upload', 'media-views' ));

		wp_localize_script( 'es-trendy-admin-media', 'TrendyMedia', array(
			'frame_title' => __( 'Select Background Image', 'es-trendy' ),
			'button_title' => __( 'Insert Image', 'es-trendy' ),
			'remove_title' => __( 'Remove Image', 'es-trendy' ),
		) );
	}
}

