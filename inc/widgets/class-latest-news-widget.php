<?php

/**
 * Class Es_Trendy_Latest_News_Widget
 */
class Es_Trendy_Latest_News_Widget extends Es_Trendy_Widget
{
	/**
	 * @inheritdoc
	 */
	public function __construct()
	{
		parent::__construct( 'es_trendy_latest_news_widget' , __( 'Trendy Latest News', 'es-trendy' ) );
	}


	/**
	 * @inheritdoc
	 */
	protected function get_widget_template_path()
	{
		return ES_TRENDY_WIDGETS_DIR . 'templates/es-trendy-latest-news-widget.php';
	}

	/**
	 * @return string
	 */
	protected function get_widget_form_template_path()
	{
		return ES_TRENDY_WIDGETS_DIR . 'forms/es-trendy-latest-news-widget-form.php';
	}
}

