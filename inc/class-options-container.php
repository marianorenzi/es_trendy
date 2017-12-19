<?php

/**
 * Class Es_Trendy_Options_Container.
 *
 * @property string $theme_color
 * @property int $logo_attachment_id
 * @property int $favicon_attachment_id
 * @property string $option_css
 * @property int $news_per_page
 * @property string $copyright
 * @property string $twitter_link
 * @property string $facebook_link
 * @property string $google_plus_link
 * @property string $linkedin_link
 * @property string $send_message_slug
 * @property string $message_sent_header
 * @property string $message_sent_text
 * @property string $tel_title
 * @property string $email_title
 * @property string $contact_email
 * @property string $address_title
 * @property string $contact_address
 * @property int $not_found_background_id
 * @property int $not_found_title
 * @property int $not_found_text
 * @property int $not_found_button_label
 * @property string $google_map_api_key
 * @property int $top_background_id
 * @property int $search_background_id
 */
class Es_Trendy_Options_Container {
	/**
	 * Prefix for settings. Example {OPTIONS_PREFIX}theme_color.
	 */
	const OPTIONS_PREFIX = 'es_trendy_';

	/**
	 * Return list of available settings.
	 *
	 * @return array|mixed
	 */
	public static function get_available_settings() {
		return apply_filters( 'es_trendy_get_available_settings', array(
			'theme_color' => array(
				'default_value' => '#5fd400',
			),

			'logo_attachment_id' => array(
				'default_value' => '',
			),

			'favicon_attachment_id' => array(
				'default_value' => '',
			),

			'news_per_page' => array(
				'default_value' => 3,
			),

			/*'show_breadcrumbs' => array(
				'default_value' => 1,
			),*/

			'option_css' => array(
				'default_value' => '',
			),

			'copyright' => array(
				'default_value' => __( 'Copyright 2017 Estatik. All rights reserved.', 'es-trendy' ),
			),

			'search_style' => array(
				'default_value' => 'compact',
				'values' => array(
					'compact' => __( 'Compact', 'es-trendy' ),
					'wide' => __( 'Wide', 'es-trendy' ),
					'full' => __( 'Full', 'es-trendy' ),
				) ),

			'search_background_id' => array(
				'default_value' => '',
			),

			'top_background_id' => array(
				'default_value' => '',
			),

			'top_big_slogan' => array(
				'default_value' => __( 'Biggest Real Estate Site', 'es-trendy' ),
			),

			'top_small_slogan' => array(
				'default_value' => __( 'Find your home here', 'es-trendy' ),
			),

			'top_slogan_color' => array(
				'default_value' => '#fff',
			),

			'twitter_link' => array(
				'default_value' => '',
			),

			'facebook_link' => array(
				'default_value' => '',
			),

			'google_plus_link' => array(
				'default_value' => '',
			),

			'linkedin_link' => array(
				'default_value' => '',
			),

			'send_message_slug' => array(
				'default_value' => __( 'Send us a message', 'es-trendy' ),
			),

			'message_sent_header' => array(
				'default_value' => __( 'Thank you for contacting us!', 'es-trendy' ),
			),

			'message_sent_text' => array(
				'default_value' => '',
			),

			'tel_title' => array(
				'default_value' => __( 'Free line for you', 'es-trendy' ),
			),

			'contact_tel' => array(
				'default_value' => '',
			),

			'email_title' => array(
				'default_value' => __( 'Email Us', 'es-trendy' ),
			),

			'contact_email' => array(
				'default_value' => '',
			),

			'address_title' => array(
				'default_value' => __( 'Our Address', 'es-trendy' ),
			),

			'contact_address' => array(
				'default_value' => '',
			),

			'not_found_background_id' => array(
				'default_value' => '',
			),

			'not_found_title' => array(
				'default_value' => __( '404 Error', 'es-trendy' ),
			),

			'not_found_text' => array(
				'default_value' => '',
			),

			'not_found_button_label' => array(
				'default_value' => __( 'Go to the Home page', 'es-trendy' )
			),

			'google_map_api_key' => array(
				'default_value' => ''
			),
		) );
	}

	/**
	 * Return list if available values using setting name.
	 *
	 * @param $name
	 *
	 * @return null
	 */
	public static function get_setting_values( $name ) {
		$settings = static::get_available_settings();

		return isset( $settings[ $name ]['values'] ) ?
			$settings[ $name ]['values'] : null;
	}

	/**
	 * Return option value using setting name.
	 *
	 * @param $name
	 *
	 * @return string|null
	 */
	public function __get( $name ) {
		$settings = static::get_available_settings();

		return isset( $settings[ $name ]['default_value'] ) ?
			get_option( static::OPTIONS_PREFIX . $name, $settings[ $name ]['default_value'] ) : null;

	}

	/**
	 * Magic method for empty and isset methods.
	 *
	 * @param $name
	 *
	 * @return bool
	 */
	public function __isset( $name ) {
		$value = $this->__get( $name );

		return ! empty( $value );
	}

	/**
	 * Save one settings.
	 *
	 * @param $name
	 * @param $value
	 *
	 * @return void
	 */
	public function saveOne( $name, $value ) {
		update_option( static::OPTIONS_PREFIX . $name, $value );
	}

	/**
	 * Save settings list.
	 *
	 * @param array $data
	 *
	 * @see update_option
	 */
	public function save( array $data ) {
		if ( ! empty( $data ) ) {
			$settings = static::get_available_settings();
			foreach ( $settings as $name => $setting ) {
				if ( isset( $data[ $name ] ) ) {
					$prev = $this->{$name};
					update_option( static::OPTIONS_PREFIX . $name, $data[ $name ] );

					do_action( 'es_trendy_settings_save', $name, $data[ $name ], $prev );
				}
			}
		}
	}

	/**
	 * Return label of the value.
	 *
	 * @param $name
	 * @param $value
	 *
	 * @return null
	 */
	public function get_label( $name, $value ) {
		$default = static::get_setting_values( $name );

		return ! empty( $default[ $value ] ) ? $default[ $value ] : null;
	}
}
