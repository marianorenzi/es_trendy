<?php

/**
 * Class Es_Trendy_Footer_Map_Widget
 */
class Es_Trendy_Contact_Map_Widget extends Es_Trendy_Widget
{
	/**
	 * @inheritdoc
	 */
	public function __construct()
	{
		parent::__construct( 'es_trendy_contact_map_widget' , __( 'Trendy Contact Map', 'es-trendy' ) );
	}


	/**
	 * @inheritdoc
	 */
	protected function get_widget_template_path()
	{
		return ES_TRENDY_WIDGETS_DIR . 'templates/es-trendy-contact-map-widget.php';
	}

	/**
	 * @return string
	 */
	protected function get_widget_form_template_path()
	{
		return ES_TRENDY_WIDGETS_DIR . 'forms/es-trendy-contact-map-widget-form.php';
	}
}

