<?php

/**
 * Class Es_Trendy_Footer_Map_Widget
 */
class Es_Trendy_Why_Choose_Us_Widget extends Es_Trendy_Widget
{
	/**
	 * @inheritdoc
	 */
	public function __construct()
	{
		parent::__construct( 'es_trendy_why_choose_us_widget' , __( 'Trendy Why Choose Us', 'es-trendy' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_setup' ) );
	}

	/**
	 * Return list of pages.
	 *
	 * @return array
	 */
	public static function get_block_pages() {
		$pages = get_pages();

		foreach ( $pages as $page ) {
			$block_pages[$page->ID] = $page->post_title;
		}

		return apply_filters('es_trendy_get_why_choose_us_widget_pages', $block_pages);
	}

	/**
	 * Return blocks array.
	 *
	 * @return array
	 */
	public static function get_blocks_arr() {
		$blocks = array(
			0 => 'first',
			1 => 'second',
			2 => 'third'
		);

		return apply_filters('es_trendy_get_why_choose_us_widget_blocks', $blocks);
	}

	/**
	 * @inheritdoc
	 */
	protected function get_widget_template_path()
	{
		return ES_TRENDY_WIDGETS_DIR . 'templates/es-trendy-why-choose-us-widget.php';
	}

	/**
	 * @return string
	 */
	protected function get_widget_form_template_path()
	{
		return ES_TRENDY_WIDGETS_DIR . 'forms/es-trendy-why-choose-us-widget-form.php';
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

