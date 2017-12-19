<?php

/**
 * Class Es_Trendy_Contact_Info_Widget
 */
class Es_Trendy_Contact_Info_Widget extends Es_Trendy_Widget
{
	/**
	 * @inheritdoc
	 */
	public function __construct()
	{
		parent::__construct( 'es_trendy_contact_info_widget' , __( 'Trendy Contact Info', 'es-trendy' ) );
	}


	/**
	 * @inheritdoc
	 */
	protected function get_widget_template_path()
	{
		return ES_TRENDY_WIDGETS_DIR . 'templates/es-trendy-contact-info-widget.php';
	}

	/**
	 * @return string
	 */
	protected function get_widget_form_template_path()
	{
		return ES_TRENDY_WIDGETS_DIR . 'forms/es-trendy-contact-info-widget-form.php';
	}
}

