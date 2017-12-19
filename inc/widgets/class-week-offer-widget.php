<?php

/**
 * Class Es_Trendy_Week_Offer_Widget
 */
class Es_Trendy_Week_Offer_Widget extends Es_Trendy_Widget
{
	/**
	 * @inheritdoc
	 */
	public function __construct()
	{
		parent::__construct( 'es_trendy_week_offer_widget' , __( 'Trendy Offer of the Week', 'es-trendy' ) );
	}


	/**
	 * @inheritdoc
	 */
	protected function get_widget_template_path()
	{
		return ES_TRENDY_WIDGETS_DIR . 'templates/es-trendy-week-offer-widget.php';
	}

	/**
	 * @return string
	 */
	protected function get_widget_form_template_path()
	{
		return ES_TRENDY_WIDGETS_DIR . 'forms/es-trendy-week-offer-widget-form.php';
	}

	/**
	 * Return list of pages.
	 *
	 * @return array
	 */
    public static function get_properties() {
        global $wpdb;

        $block_properies = array();
        $results = $wpdb->get_results( "SELECT post_title, ID FROM {$wpdb->posts} WHERE post_type = 'properties' ORDER BY post_title ASC" );

        if ( $results ) {
            foreach ( $results as $property ) {
                if ( ! empty ( $property->post_title ) )
                    $block_properies[$property->ID] = $property->post_title;
            }
        }

        return apply_filters( 'es_trendy_get_properties_widget', $block_properies );
    }
}

