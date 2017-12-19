<?php

/**
 * Class Trendy_Options_Page
 */
class Trendy_Options_Page {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Add options page.
		add_action('admin_menu', array( $this, 'add_options_page'));

		// Register scripts, styles, and fonts.
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_styles' ) );
	}

	/**
	 * Add theme options page.
	 */
	public function add_options_page() {
		add_theme_page( __( 'Theme Trendy', 'es-theme' ), __( 'Theme Trendy', "es-theme" ),
			'edit_theme_options', 'es_theme_options', array( $this, 'render_page' ) );
	}

	/**
	 * Render settings page content.
	 *
	 * @return void
	 */
	public function render_page() {
		$template = apply_filters( 'es_trendy_options_template_path', ES_TRENDY_ADMIN_TEMPLATES . 'options.php' );
		 require_once( $template );
	}

	/**
	 * Return tabs of the settings page.
	 *
	 * @return array
	 */
	public static function get_tabs() {
		return apply_filters( 'es_trendy_options_get_tabs', array(
			'general'  => array(
				'label'    => __( 'General', 'es-trendy' ),
				'template' => ES_TRENDY_ADMIN_TEMPLATES . 'general-tab.php'
			),
			'search-box'  => array(
				'label'    => __( 'Search Box Style', 'es-trendy' ),
				'template' => ES_TRENDY_ADMIN_TEMPLATES . 'search-box.php'
			),
			'social-sharing'  => array(
				'label'    => __( 'Social Sharing', 'es-trendy' ),
				'template' => ES_TRENDY_ADMIN_TEMPLATES . 'social-sharing.php'
			),
			'contact'  => array(
				'label'    => __( 'Contact Info', 'es-trendy' ),
				'template' => ES_TRENDY_ADMIN_TEMPLATES . 'contact.php'
			),
			'404'  => array(
				'label'    => __( '404 Page', 'es-trendy' ),
				'template' => ES_TRENDY_ADMIN_TEMPLATES . '404.php'
			)
		) );
	}

	/**
	 * Save settings action.
	 *
	 * @return void
	 */
	public static function save() {
		if ( isset( $_POST['es_trendy_save_options'] ) && wp_verify_nonce( $_POST['es_trendy_save_options'],
				'es_trendy_save_options' )
		) {
			/** @var Es_Settings_Container $es_settings */
			global $es_trendy_options;


			// Filtering and preparing data for save.
			$data = apply_filters( 'es_before_save_options_data', $_POST['es_trendy_options'] );

			// Before save action.
			do_action( 'es_before_save_options_data', $data );

			$es_trendy_options->save( $data );

			// After save action.
			do_action( 'es_after_save_options_data', $data );
		}
	}


	/**
	 * Enqueue admin scripts.
	 *
	 * @return void
	 */
	public function admin_enqueue_scripts()
	{
		$screen = get_current_screen();
		$should_load = 'appearance_page_es_theme_options' == $screen->base;

		if ( ! $should_load ) {
			return;
		}

		wp_enqueue_media();
		wp_enqueue_script( 'wp-color-picker' );

		wp_register_script( 'es-trendy-admin-script', ES_TRENDY_ADMIN_CUSTOM_SCRIPTS_URL . 'admin.js', array (
			'jquery', 'jquery-ui-tabs', 'wp-color-picker' ) );

		wp_enqueue_script( 'es-trendy-admin-script' );

		wp_register_script( 'es-checkbox-script', ES_TRENDY_ADMIN_CUSTOM_SCRIPTS_URL . 'es-checkboxes.js', array ( 'jquery' ) );
		wp_enqueue_script( 'es-checkbox-script' );

		wp_localize_script( 'es-trendy-admin-script', 'Es_Trendy', static::register_js_variables() );

		wp_enqueue_script( 'es-trendy-admin-media', ES_TRENDY_ADMIN_CUSTOM_SCRIPTS_URL . 'media.js', array( 'jquery', 'media-upload', 'media-views' ));

		wp_localize_script( 'es-trendy-admin-media', 'TrendyMedia', array(
			'frame_title' => __( 'Select Image', 'es-trendy' ),
			'button_title' => __( 'Insert Image', 'es-trendy' ),
			'remove_title' => __( 'Remove Image', 'es-trendy' ),
		) );
	}

	/**
	 * Enqueue admin styles.
	 *
	 * @return void
	 */
	public function admin_enqueue_styles()
	{

		wp_enqueue_style( 'wp-color-picker' );

		wp_register_style( 'jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css' );

		wp_enqueue_style( 'es-trendy-awesome', ES_TRENDY_FONTS_URL . 'font-awesome/css/font-awesome.min.css');

		wp_register_style( 'es-trendy-admin-style', ES_TRENDY_ADMIN_CUSTOM_STYLES_URL. 'admin-style.css' );
		wp_enqueue_style( 'es-trendy-admin-style' );

		wp_register_style( 'es-checkboxes-style', ES_TRENDY_ADMIN_CUSTOM_STYLES_URL . 'es-checkboxes.css' );
		wp_enqueue_style( 'es-checkboxes-style' );

		wp_register_style(
			'es-google-open-sans-form',
			'https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet'
		);

		wp_enqueue_style( 'es-google-open-sans-form' );
	}

	/**
	 * Register global javascript variables.
	 *
	 * @return array
	 */
	public static function register_js_variables()
	{

		return apply_filters( 'es_trendy_admin_global_js_variables', array(
			'tr' => array(
				'yes' => __( 'Yes', 'es-trendy' ),
				'no' => __( 'No', 'es-trendy' ),
			)
		) );
	}

}
