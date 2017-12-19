<?php
/**
 * Estatik Trendy Theme functions and definitions
 * @package    Estatik_Theme_Trendy
 * @author     Estatik
 */

class Trendy_Theme {

	/**
	 * Theme version.
	 *
	 * @var string
	 */
	protected $_version;

	/**
	 * Theme instance.
	 *
	 * @var Estatik
	 */
	protected static $_instance;

	/**
	 * Returns the instance.
	 *
	 * @access public
	 * @return object
	 */
	public static function getInstance() {

		static $_instance = null;

		if ( is_null( $_instance ) ) {
			$_instance = new self;
		}

		return $_instance;
	}

	/**
	 * Constructor.
	 */
	protected function __construct()
	{
		$this->setup_actions();
		$this->init();
	}

	/**
	 * Initialize theme.
	 *
	 * @return void
	 */
	public static function run()
	{
		static::$_instance = static::getInstance();
	}

	/**
	 * Return theme version.
	 *
	 * @return string
	 */
	public static function getVersion()
	{
		$es_theme = wp_get_theme();
		return $es_theme->get( 'Version' );
	}

	/**
	 * Sets up initial actions.
	 *
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Theme setup.
		add_action( 'after_setup_theme', array( $this, 'theme_setup'             ),  5 );
		add_action( 'after_setup_theme', array( $this, 'custom_background_setup' ), 15 );
		add_action( 'after_setup_theme', array( $this, 'load_text_domain' ) );

		// Register menus.
		add_action( 'init', array( $this, 'register_menus' ) );

		// Register post types.
		add_action( 'init', array( $this, 'register_post_types' ) );

		// Add meta boxes.
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );

		// Save testimonials.
		add_action( 'save_post', array( $this, 'save_testimonials' ) );

		// Save pages.
		add_action( 'save_post', array( $this, 'save_pages' ) );

		// Save theme options.
		add_action( 'init', array( 'Trendy_Options_Page', 'save' ) );

		// Register scripts, styles, and fonts.
		add_action( 'wp_enqueue_scripts',    array( $this, 'register_scripts' ) );
		add_action( 'enqueue_embed_scripts', array( $this, 'register_scripts' ) );

		// Remove plugin properties singe styles.
		add_action( 'wp_enqueue_scripts', array( $this, 'remove_es_front_single_style' ) );
		add_action( 'wp_print_styles', array( $this, 'remove_es_front_single_style' ) );

		// Disable admin bar for frontend.
		show_admin_bar( false );

		// Register sidebars.
		add_action( 'widgets_init', array( $this, 'register_sidebars' ) );

		// Register widgets.
		add_action( 'widgets_init', array( $this, 'register_widgets' ) );

		// Ajax contact form submit.
		add_action( 'wp_ajax_submit_contact_form', array( 'Es_Trendy_Contact_Form', 'submit' ) );
		add_action( 'wp_ajax_nopriv_submit_contact_form', array( 'Es_Trendy_Contact_Form', 'submit' ) );

		// Archive and categories page titles.
		add_filter( 'get_the_archive_title', array( $this, 'get_the_archive_title' ) );

		// Amount of news per page.
		add_action('pre_get_posts', array( $this, 'news_posts_per_page' ) );

		// Register image sizes.
		add_action( 'init', array( $this, 'register_image_sizes' ) );

		// Agent template path.
		add_filter( 'es_agents_list_shortcode_template', array( $this, 'agents_list_shortcode_template' ), 10, 1 );

		// Property single template path.
		add_filter( 'es_single_template_path', array( $this, 'property_single_template_path' ), 10, 1 );

		// Property features template path.
		add_filter( 'es_features_list_template_path', array( $this, 'property_features_template_path' ), 10, 1 );

		// Property fields template path.
		add_filter( 'es_single_gallery_fields_path', array( $this, 'property_fields_template_path' ), 10, 1 );

		// Property gallery template path.
		add_filter( 'es_single_gallery_template_path', array( $this, 'property_gallery_template_path' ), 10, 1 );

		// Property tabs template path.
		add_filter( 'es_single_tabs_template_path', array( $this, 'property_tabs_template_path' ), 10, 1 );

		// Slideshow template path.
		add_filter( 'es_property_slideshow_shortcode_template_path', array( $this, 'slideshow_template_path' ), 10, 1 );

		// Property Listing template path.
		add_filter( 'es_get_my_listings_template_path', array( $this, 'listing_template_path' ), 10, 1 );

		// Sorting dropdown template path.
		add_filter( 'es_archive_sorting_template', array( $this, 'archive_sorting_template' ), 10, 1 );

		// Map info block template path.
		add_filter( 'es_get_map_overlay_template', array( $this, 'get_map_overlay_template' ), 10, 1 );

		// Subscription table template path.
		add_filter( 'es_subscription_table_template_path', array( $this, 'subscription_table_template_path' ), 10, 1 );

		// Register shortcode template path.
		add_filter( 'es_register_shortcode_template', array( $this, 'register_shortcode_template' ), 10, 1 );

		// Login shortcode template path.
		add_filter( 'es_login_shortcode_template_path', array( $this, 'login_shortcode_template_path' ), 10, 1 );

		// Restore password shortcode template path.
		add_filter( 'es_restore_pwd_template_path', array( $this, 'restore_pwd_template_path' ), 10, 1 );

		// Change excerpt more.
		add_filter( 'excerpt_more', array( $this, 'excerpt_more' ) );

		// Add markers icons more.
		add_filter( 'es_get_available_settings', array( $this, 'get_available_settings' ) );

		// Add markers icons more.
		add_filter( 'es_single_top_button_markup', array( $this, 'es_single_top_button_markup' ), 10, 1 );

		// Change search properties template path.
		add_filter( 'template_include', array( $this, 'template_loader' ) );

		add_action( 'wp_head', array( $this, 'customize_theme_color' ) );

	}

	/**
	 * Change Property Single template path.
	 *
	 * @access public
	 * @return string
	 */
	public function property_single_template_path( $path ) {
		$path = ES_TRENDY_TEMPLATES_DIR . 'content-single.php';
		return $path;
	}

	/**
	 * Change Property Features template path.
	 *
	 * @access public
	 * @return string
	 */
	public function property_features_template_path( $path ) {
		$path = ES_TRENDY_TEMPLATES_DIR . 'features-list.php';
		return $path;
	}

	/**
	 * Change Property Fields template path.
	 *
	 * @access public
	 * @return string
	 */
	public function property_fields_template_path( $path ) {
		$path = ES_TRENDY_TEMPLATES_DIR . 'fields.php';
		return $path;
	}

	/**
	 * Change Property Gallery template path.
	 *
	 * @access public
	 * @return string
	 */
	public function property_gallery_template_path( $path ) {
		$path = ES_TRENDY_TEMPLATES_DIR . 'gallery.php';
		return $path;
	}

	/**
	 * Change Property tabs template path.
	 *
	 * @access public
	 * @return string
	 */
	public function property_tabs_template_path( $path ) {
		$path = ES_TRENDY_TEMPLATES_DIR . 'tabs.php';
		return $path;
	}

	/**
	 * Change Property Single template path.
	 *
	 * @access public
	 * @return string
	 */
	public function agents_list_shortcode_template( $path ) {
		$path = ES_TRENDY_TEMPLATES_DIR . 'agent.php';
		return $path;
	}

	/**
	 * Change slideshow template path.
	 *
	 * @access public
	 * @return string
	 */
	public function slideshow_template_path( $path ) {
		$path = ES_TRENDY_TEMPLATES_DIR . 'slideshow.php';
		return $path;
	}

	/**
	 * Change listing template path.
	 *
	 * @access public
	 * @return string
	 */
	public function listing_template_path( $path ) {
		$path = ES_TRENDY_TEMPLATES_DIR . 'my-listing.php';
		return $path;
	}

	/**
	 * Change listing dropdown template path.
	 *
	 * @access public
	 * @return string
	 */
	public function archive_sorting_template( $path ) {
		$path = ES_TRENDY_TEMPLATES_DIR . 'sorting-list.php';
		return $path;
	}

	/**
	 * Change map info block template path.
	 *
	 * @access public
	 * @return string
	 */
	public function get_map_overlay_template( $path ) {
		$path = ES_TRENDY_TEMPLATES_DIR . 'map-property-overlay.php';
		return $path;
	}

	/**
	 * Change subscription table template path.
	 *
	 * @access public
	 * @return string
	 */
	public function subscription_table_template_path( $path ) {
		$path = ES_TRENDY_TEMPLATES_DIR . 'subscriptions-table.php';
		return $path;
	}

	/**
	 * Change register shortcode template path.
	 *
	 * @access public
	 * @return string
	 */
	public function register_shortcode_template( $path ) {
		$path = ES_TRENDY_TEMPLATES_DIR . 'shortcodes/register.php';
		return $path;
	}

	/**
	 * Change login shortcode template path.
	 *
	 * @access public
	 * @return string
	 */
	public function login_shortcode_template_path( $path ) {
		$path = ES_TRENDY_TEMPLATES_DIR . 'shortcodes/login.php';
		return $path;
	}

	/**
	 * Change restore password shortcode template path.
	 *
	 * @access public
	 * @return string
	 */
	public function restore_pwd_template_path( $path ) {
		$path = ES_TRENDY_TEMPLATES_DIR . 'shortcodes/reset.php';
		return $path;
	}


	/**
	 * Initialize entity classes using specific conditions.
	 *
	 * @access public
	 * @return void
	 */
	public function init() {

		// Theme Options
		require_once( 'class-options-container.php');

		global $es_trendy_options;
		$es_trendy_options = new Es_Trendy_Options_Container();

		// Theme Options
		require_once( ES_TRENDY_ADMIN_DIR . 'class-options-page.php');
		Trendy_Options_Page::get_instance();

		// Contact Form.
		require_once( ES_TRENDY_INC_DIR . 'class-contact-form.php');

		// Es Trendy Widget.
		require_once( ES_TRENDY_WIDGETS_DIR . 'class-trendy-widget.php');

		// Contact Map Widget.
		require_once( ES_TRENDY_WIDGETS_DIR . 'class-contact-map-widget.php');

		// Why Choose Us Widget.
		require_once( ES_TRENDY_WIDGETS_DIR . 'class-why-choose-us-widget.php');

		// Join Us Widget.
		require_once( ES_TRENDY_WIDGETS_DIR . 'class-join-us-widget.php');

		// Testimonials Widget.
		require_once( ES_TRENDY_WIDGETS_DIR . 'class-testimonials-widget.php');

		// Testimonials Widget.
		require_once( ES_TRENDY_WIDGETS_DIR . 'class-contact-info-widget.php');

		// Latest News Widget.
		require_once( ES_TRENDY_WIDGETS_DIR . 'class-latest-news-widget.php');

		// Offer of the Week Widget.
		require_once( ES_TRENDY_WIDGETS_DIR . 'class-week-offer-widget.php');

		// Banners Widget.
		require_once( ES_TRENDY_WIDGETS_DIR . 'class-banners-widget.php');

		// Color calculation class.
		require_once( ES_TRENDY_INC_DIR . 'Color.php');
	}

	/**
	 * The theme setup function.
	 *
	 * @access public
	 * @return void
	 */
	public function theme_setup() {

		// Post formats.
		add_theme_support(
			'post-formats',
			array( 'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery' )
		);

		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'menus' );

		add_theme_support( 'title-tag' );

	}

	/**
	 * Adds support for the WordPress 'custom-background' theme feature.
	 *
	 * @access public
	 * @return void
	 */
	public function custom_background_setup() {

		add_theme_support(
			'custom-background',
			array(
				'default-color'    => 'ffffff',
			)
		);
	}

	/**
	 * Load text domain.
	 *
	 * @access public
	 * @return void
	 */
	public function load_text_domain() {
		load_theme_textdomain( 'es-trendy', get_template_directory() . '/languages' );
	}

	/**
	 * Registers nav menus.
	 *
	 * @access public
	 * @return void
	 */
	public function register_menus() {

		register_nav_menus( array(
			'footer_menu'    => __( 'Footer Menu', 'es-trendy' ),
			'main_menu' => __( 'Main Menu', 'es-trendy' ),
			'account_menu' => __( 'Account Menu', 'es-trendy' ),
			'login_menu' => __( 'Login Menu', 'es-trendy' ),
		) );
	}

	/**
	 * Registers post types.
	 *
	 * @access public
	 * @return void
	 */
	public function register_post_types() {
		// News post type.
		$labels = array(
			'name'               => _x( 'News', 'post type general name', "es-trendy" ),
			'singular_name'      => _x( 'News', 'post type singular name', "es-trendy" ),
			'add_new'            => _x( 'Add New', 'News', "es-trendy" ),
			'add_new_item'       => __( 'Add New News', "es-trendy" ),
			'edit_item'          => __( 'Edit News', "es-trendy" ),
			'new_item'           => __( 'New News', "es-trendy" ),
			'all_items'          => __( 'All News', "es-trendy" ),
			'view_item'          => __( 'View News', "es-trendy" ),
			'search_items'       => __( 'Search News', "es-trendy" ),
			'not_found'          => __( 'No News found', "es-trendy" ),
			'not_found_in_trash' => __( 'No News found in the Trash', "es-trendy" ),
			'parent_item_colon'  => '',
			'menu_name'          => 'News'
		);
		$args = array(
			'labels'        => $labels,
			'description'   => 'News',
			'public'        => true,
			'menu_position' => 5,
			'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'has_archive'   => true,
			'taxonomies' => array('category', 'post_tag'),
			'show_in_nav_menus' => true
		);
		register_post_type( 'news', $args );

		// Testimonials post type.
		$labels = array(
			'name'               => _x( 'Testimonials', 'post type general name', "es-trendy" ),
			'singular_name'      => _x( 'Testimonials', 'post type singular name', "es-trendy" ),
			'add_new'            => _x( 'Add New', 'Testimonials', "es-trendy" ),
			'add_new_item'       => __( 'Add New Testimonials', "es-trendy" ),
			'edit_item'          => __( 'Edit Testimonials', "es-trendy" ),
			'new_item'           => __( 'New Testimonials', "es-trendy" ),
			'all_items'          => __( 'All Testimonials', "es-trendy" ),
			'view_item'          => __( 'View Testimonials', "es-trendy" ),
			'search_items'       => __( 'Search Testimonials', "es-trendy" ),
			'not_found'          => __( 'No Testimonials found', "es-trendy" ),
			'not_found_in_trash' => __( 'No Testimonials found in the Trash', "es-trendy" ),
			'parent_item_colon'  => '',
			'menu_name'          => 'Testimonials'
		);
		$args = array(
			'labels'        => $labels,
			'description'   => 'Testimonials',
			'public'        => true,
			'menu_position' => 6,
			'supports'      => array( 'title', 'editor'),
			'has_archive'   => false,
		);
		register_post_type( 'testimonials', $args );
	}

	/**
	 * Add metaboxes.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function add_meta_boxes() {
		add_meta_box('testimonial_info', __( 'Testimonial Info', 'es-trendy' ), array( $this, 'testimonials_fields' ), 'testimonials');
		add_meta_box('button_label', __( 'Button Label', 'es-trendy' ), array( $this, 'page_fields' ), 'page');
	}

	/**
	 * Callback function for testimonials fields.
	 *
	 * @access public
	 * @param WP_Post $post Post object.
	 * @return void
	 */
	public function testimonials_fields( $post ) {
		wp_nonce_field( 'es_trendy_testimonials_box_nonce', 'es_trendy_testimonials_box_nonce' );

		$company = get_post_meta( $post->ID, 'testimonial_company_field', true );
		$author = get_post_meta( $post->ID, 'testimonial_author_field', true );

		echo '<div class="es-settings-field"><label for="testimonial[company_field]"><span class="es-settings-label">';
		_e( 'Company', 'es-trendy' );
		echo '</span></label> ';
		echo '<input type="text" id="company_field" name="testimonial[company_field]"';
		echo ' value="' . esc_attr( $company ) . '" size="25" /></div>';

		echo '<div class="es-settings-field"><label for="testimonial[author_field]"><span class="es-settings-label">';
		_e( 'Author', 'es-trendy' );
		echo '</span></label> ';
		echo '<input type="text" id="company_field" name="testimonial[author_field]"';
		echo ' value="' . esc_attr( $author ) . '" size="25" /></div>';
	}

	/**
	 * Callback function for page fields.
	 *
	 * @access public
	 * @param WP_Post $post Post object.
	 * @return void
	 */
	public function page_fields( $post ) {
		wp_nonce_field( 'es_trendy_page_box_nonce', 'es_trendy_page_box_nonce' );

		$button_label = get_post_meta( $post->ID, 'page_button_label', true );

		echo '<div class="es-settings-field"><label for="page[button_label]"><span class="es-settings-label">';
		_e( 'Button link label', 'es-trendy' );
		echo '</span></label> ';
		echo '<input type="text" id="button_link_label" name="page[button_label]"';
		echo ' value="' . esc_attr( $button_label ) . '" size="25" /></div>';
	}

	/**
	 * Save testimonials callback.
	 *
	 * @access public
	 * @param int $post_id ID.
	 * @return void
	 */
	public function save_testimonials( $post_id) {
		if ( ! isset( $_POST['es_trendy_testimonials_box_nonce'] ) )
			return $post_id;

		$nonce = $_POST['es_trendy_testimonials_box_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'es_trendy_testimonials_box_nonce' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		if ( ! current_user_can( 'edit_post', $post_id ) )
			return $post_id;

		$data = $_POST['testimonial'];

		foreach ( $data as $key => $field) {
			$value = sanitize_text_field( $field );
			update_post_meta( $post_id, 'testimonial_' . $key, $value );
		}

	}

	/**
	 * Save pages callback.
	 *
	 * @access public
	 * @param int $post_id ID.
	 * @return void
	 */
	public function save_pages( $post_id) {
		if ( ! isset( $_POST['es_trendy_page_box_nonce'] ) )
			return $post_id;

		$nonce = $_POST['es_trendy_page_box_nonce'];

		if ( ! wp_verify_nonce( $nonce, 'es_trendy_page_box_nonce' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		if ( ! current_user_can( 'edit_page', $post_id ) )
			return $post_id;

		$data = $_POST['page'];

		foreach ( $data as $key => $field) {
			$value = sanitize_text_field( $field );
			update_post_meta( $post_id, 'page_' . $key, $value );
		}

	}

	/**
	 * Registers scripts/styles.
	 *
	 * @access public
	 * @return void
	 */
	public function register_scripts() {
		global $es_trendy_options, $es_settings;
		// Register scripts.

		if ( !empty( $es_trendy_options->google_map_api_key )  ) {
			$deps = array( 'jquery' );
			if ( empty( $es_settings->google_api_key ) ) {
				wp_register_script(
					'es-trendy-googlemap-api',
					'https://maps.googleapis.com/maps/api/js?key=' . $es_trendy_options->google_map_api_key,
					array(), null, true
				);

				wp_enqueue_script( 'es-trendy-googlemap-api' );
				$deps[] = 'es-trendy-googlemap-api';
			}
			else {
				$deps[] = 'es-admin-googlemap-api';
			}


			wp_register_script( 'es-trendy-map', ES_TRENDY_CUSTOM_SCRIPTS_URL . 'map.js',
				$deps, null, true );
			wp_enqueue_script( 'es-trendy-map' );

		}


		// Form validation script.
		wp_register_script( 'es-trendy-validetta', ES_TRENDY_VENDOR_SCRIPTS_URL . 'validetta/validetta.min.js',
			array( 'jquery' ), null, true );
		wp_enqueue_script( 'es-trendy-validetta' );

		// BxSlider.
		wp_register_script( 'es-trendy-bxslider', ES_TRENDY_VENDOR_SCRIPTS_URL . 'bxslider/jquery.bxslider.min.js',
			array( 'jquery' ), null, true );
		wp_enqueue_script( 'es-trendy-bxslider' );

		// Mobile-menu.
		wp_register_script( 'es-sidr', ES_TRENDY_VENDOR_SCRIPTS_URL . 'sidr/dist/jquery.sidr.min.js',
			array( 'jquery' ), null, true );
		wp_enqueue_script( 'es-sidr' );

		wp_register_script( 'es-trendy-magnific', ES_TRENDY_VENDOR_SCRIPTS_URL . 'magnific-popup/dist/jquery.magnific-popup.min.js',
			array( 'jquery' ), null, true );
		wp_enqueue_script( 'es-trendy-magnific' );

		$deps = array ( 'jquery', 'es-rating-admin-script', 'es-trendy-magnific', 'es-slick-script' );

		if ( ! empty( $es_settings->google_api_key ) ) {
			$deps[] = 'es-admin-map-script';
		}
		// Property single styles.
        wp_register_script( 'es-trendy-front-single', ES_TRENDY_CUSTOM_SCRIPTS_URL . 'front-single.js',
            $deps, null, true );
        wp_enqueue_script( 'es-trendy-front-single' );


		// Viewport-checker.
		wp_register_script( 'es-trendy-viewport-checker',
			ES_TRENDY_VENDOR_SCRIPTS_URL . 'viewport-checker/dist/jquery.viewportchecker.min.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'es-trendy-viewport-checker' );

		$deps = array ( 'jquery', 'es-trendy-validetta', 'es-trendy-bxslider', 'es-trendy-viewport-checker', 'es-sidr' );
		if ( !empty( $es_trendy_options->google_map_api_key )  ) {
		    $deps[] =  'es-trendy-map';
		}
		wp_register_script( 'es-trendy', ES_TRENDY_CUSTOM_SCRIPTS_URL . 'theme.js', $deps, null, true );
		wp_enqueue_script( 'es-trendy' );

		wp_localize_script( 'es-trendy', 'Es_Trendy', static::register_js_variables() );

		// Register styles.
		wp_enqueue_style( 'es-trendy-reset', ES_TRENDY_CUSTOM_STYLES_URL . 'reset.css' );
		wp_enqueue_style( 'es-trendy-validetta', ES_TRENDY_VENDOR_SCRIPTS_URL . 'validetta/validetta.min.css' );
		wp_enqueue_style( 'es-trendy-magnific', ES_TRENDY_VENDOR_SCRIPTS_URL . 'magnific-popup/dist/magnific-popup.css' );

		wp_enqueue_style( 'es-trendy-style', ES_TRENDY_CUSTOM_STYLES_URL . 'style.css' );
		wp_enqueue_style( 'es-trendy-animate-style', ES_TRENDY_CUSTOM_STYLES_URL . 'animate.css', 'es-front-style' );
		wp_enqueue_style( 'es-trendy-awesome', ES_TRENDY_FONTS_URL . 'font-awesome/css/font-awesome.min.css' );

	}

	/**
	 * Deregisters plugins properties single styles.
	 *
	 * @access public
	 * @return void
	 */
	public function remove_es_front_single_style() {
		wp_dequeue_style( 'es-front-single-style' );
		wp_dequeue_style( 'estatik-calc-css-rangeslider-normalize' );
		wp_deregister_style( 'estatik-calc-css-rangeslider-normalize');
		wp_deregister_script( 'es-front-single-script' );
	}

	/**
	 * Register global javascript variables.
	 *
	 * @access public
	 * @return array
	 */
	public static function register_js_variables()
	{
		global $es_trendy_options;
		return apply_filters( 'es_trendy_global_js_variables', array(
			'map' => array(
				'contact_address' => $es_trendy_options->contact_address,
			),
			'ajaxurl' => admin_url('admin-ajax.php')
		) );
	}

	/**
	 * Register theme sidebars.
	 *
	 * @access public
	 * @return void
	 */
	public function register_sidebars() {
		register_sidebar( array(
			'name'          => __( 'Article Sidebar Right', 'es-trendy' ),
			'id'            => 'article-sidebar-right',
			'description'   => __( 'Add widgets at the right side on the articles and archives pages.', 'es-trendy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => __( 'Top Wide Sidebar', 'es-trendy' ),
			'id'            => 'top-sidebar',
			'description'   => __( 'Add widgets above the content.', 'es-trendy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => __( 'Bottom Wide Sidebar', 'es-trendy' ),
			'id'            => 'bottom-sidebar',
			'description'   => __( 'Add widgets below the content.', 'es-trendy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => __( 'Property Sidebar Right', 'es-trendy' ),
			'id'            => 'property-sidebar-right',
			'description'   => __( 'Add widgets at the right side on the property pages.', 'es-trendy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => __( 'Page Sidebar Right', 'es-trendy' ),
			'id'            => 'page-sidebar-right',
			'description'   => __( 'Add widgets at the right side on the pages.', 'es-trendy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => __( 'Top Banner Sidebar', 'es-trendy' ),
			'id'            => 'top-banner-sidebar',
			'description'   => __( 'Add widgets at the top of page with template Page with top Estatik search.', 'es-trendy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}

	/**
	 * Register theme widgets.
	 *
	 * @access public
	 * @return void
	 */
	public function register_widgets() {
		register_widget('Es_Trendy_Contact_Map_Widget');
		register_widget('Es_Trendy_Why_Choose_Us_Widget');
		register_widget('Es_Trendy_Join_Us_Widget');
		register_widget('Es_Trendy_Testimonials_Widget');
		register_widget('Es_Trendy_Contact_Info_Widget');
		register_widget('Es_Trendy_Latest_News_Widget');
		register_widget('Es_Trendy_Week_Offer_Widget');
		register_widget('Es_Trendy_Banners_Widget');
	}

	/**
	 * Return estatik logo markup.
	 *
	 * @return string;
	 */
	public static function get_logo() {
		ob_start();

		echo "<div class='es-logo clearfix'><img src='" . ES_TRENDY_ADMIN_IMAGES_URL . 'logo.png' . "'><br>
            <span class='es-version'>" . __( 'Ver', 'es-trendy' ) . ". " . self::getVersion() .  "</span></div>";

		return ob_get_clean();
	}

	/**
	 * Change archive and categories page titles.
	 *
	 * @access public
	 * @return title
	 */
	public function get_the_archive_title( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( 'Tag: ', false );
		} elseif ( is_author() ) {
			$title = get_the_author();
		} elseif ( is_year() ) {
			$title = get_the_date( _x( 'Y', 'yearly archives date format' ) );
		} elseif ( is_month() ) {
			$title = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
		} elseif ( is_day() ) {
			$title = get_the_date( _x( 'F j, Y', 'daily archives date format' ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = _x( 'Asides', 'post format archive title' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = _x( 'Galleries', 'post format archive title' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = _x( 'Images', 'post format archive title' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = _x( 'Videos', 'post format archive title' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = _x( 'Quotes', 'post format archive title' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = _x( 'Links', 'post format archive title' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = _x( 'Statuses', 'post format archive title' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = _x( 'Audio', 'post format archive title' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = _x( 'Chats', 'post format archive title' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
		} else {
			$title = __( 'Archives' );
		}
		return $title;
	}

	/**
	 * Change amount of news per page.
	 *
	 * @access public
	 * @return string $title
	 */
	public function news_posts_per_page( $query ) {
		global $es_trendy_options;
		if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'news' ) ) {
			$query->set( 'posts_per_page', $es_trendy_options->news_per_page );
		}
	}



	/**
	 * Registers image sizes.
	 *
	 * @access public
	 * @return void
	 */
	public function register_image_sizes() {

		// Archives post image sizes.
		add_image_size( 'trendy-archive', 580, 180, true );
		add_image_size( 'thumbnail_280x184', 280, 184, true );
		add_image_size( 'offer-thumbnail', 260, 147, true );
		add_image_size( 'property-agent', 250, 374, true );
		add_image_size( 'agent-picture', 230, 260, false );
		add_image_size( 'compact-search-background', 1210, 360, true );
		add_image_size( 'compact-search-form-background', 465, 178, true );
		add_image_size( 'full-search-background', 1210, 490, true );
		add_image_size( 'slideshow-image', 360, 270, true );
	}

	/**
	 * Change excerpt more.
	 *
	 * @access public
	 * @return string
	 */
	public function excerpt_more( $more ) {
		return '...';
	}

	/**
	 * Change plugin settings.
	 *
	 * @access public
	 * @return string
	 */
	public function get_available_settings( $settings ) {
		$settings['markers']['values']['marker5'] = '<span class="es-marker-icon icon icon-circle"></span>';
		return $settings;
	}

	/**
	 * Change search properties template path.
	 *
	 * @access public
	 * @return string
	 */
	public function template_loader( $template ) {
		$find = array();

		if ( function_exists( 'es_get_property' ) ) {
			$property = es_get_property( null );
			$type = $property::get_post_type_name();
			// Template for archive properties page.
			if( is_post_type_archive( $type ) && ! is_search() ) {
				$file = 'archive-' . $type . '.php';

				// Template for property taxonomies page.
			} else if ( is_tax( get_object_taxonomies( $type ) ) ) {
				$file = 'archive-' . $type . '.php';

				// If search page.
			} else if ( is_search() && ! is_admin() && isset( $_GET['post_type'] ) && $_GET['post_type'] == $type ) {
				$file = 'search-properties.php';
			}

			if ( ! empty( $file ) ) {
				$find[] = ES_TRENDY_TEMPLATES_DIR . $file;

				$template = locate_template( array_unique( $find ) );
				if ( ! $template ) {
					$template = ES_TRENDY_TEMPLATES_DIR . $file;
				}
			}
		}


		return $template;
	}

	/**
	 * Change theme main color.
	 *
	 * @access public
	 * @return string
	 */
	public function customize_theme_color() {
		require_once( ES_TRENDY_CUSTOM_STYLES_DIR . 'custom-css.php' );

	}

	/**
	 * Render Top button.
	 *
	 * access public
	 * @return void
	 */
	public function es_single_top_button_markup( $result ) {
		ob_start(); ?>
		<div class="es-top-arrow">
		<a href="body" class="es-top-link"><i class="fa fa-chevron-up" aria-hidden="true"></i><?php _e( 'To top', 'es-trendy' ); ?></a>
		</div><?php
		$result = ob_get_clean();

		return $result;
	}
}
