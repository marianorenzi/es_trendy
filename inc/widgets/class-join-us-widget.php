<?php

/**
 * Class Es_Trendy_Join_Us_Widget
 */
class Es_Trendy_Join_Us_Widget extends Es_Trendy_Widget
{
	/**
	 * @inheritdoc
	 */
	public function __construct()
	{
		parent::__construct( 'es_trendy_join_us_widget' , __( 'Trendy Join Us', 'es-trendy' ) );
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

		return apply_filters('es_trendy_get_join_us_widget_pages', $block_pages);
	}

	/**
	 * @inheritdoc
	 */
	protected function get_widget_template_path()
	{
		return ES_TRENDY_WIDGETS_DIR . 'templates/es-trendy-join-us-widget.php';
	}

	/**
	 * @return string
	 */
	protected function get_widget_form_template_path()
	{
		return ES_TRENDY_WIDGETS_DIR . 'forms/es-trendy-join-us-widget-form.php';
	}
}

