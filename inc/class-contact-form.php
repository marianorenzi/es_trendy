<?php

/**
 * Class Es_Trendy_Contact_Form
 */
class Es_Trendy_Contact_Form {

	/**
	 * Form instance.
	 *
	 * @var Estatik
	 */
	protected static $_instance;

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
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
		$this->render();
	}

	/**
	 * Build form.
	 *
	 * @return void
	 */
	public static function build()
	{
		static::$_instance = static::getInstance();
	}


	/**
	 * Render form.
	 *
	 * @return void
	 */
	private function render() {
		$template = apply_filters( 'es_trendy_contact_form_path', ES_TRENDY_TEMPLATES_DIR . 'contact-form.php' );
		require_once( $template );
	}


	/**
	 * Submit form callback.
	 */
	public function submit() {
		$data = $_POST;
		if ( ! empty( $data ) && es_validate_recaptcha() ) {

			$message        = '';
			$your_name      = $data['your_name'];
			$your_email     = $data['your_email'];
			$your_phone     = $data['your_phone'];
			$your_questions = $data['your_questions'];

			$to = get_option( 'admin_email' );

			$subject = __( 'Contact from ' . get_bloginfo( 'site_name' ), 'es-trendy' );
			$message .= __( 'Name', 'es-trendy' ) . ": $your_name\r\n";
			$message .= __( 'Email', 'es-trendy' ) . ": $your_email \r\n";
			$message .= __( 'Phone', 'es-trendy' ) . ": $your_phone\r\n";
			$message .= __( 'Questions', 'es-trendy' ) . ": $your_questions";

			$headers = 'From: ' . $your_email . "\r\n" .
			           'Reply-To: ' . $your_email . "\r\n" .
			           'X-Mailer: PHP/' . phpversion();

			mail( $to, $subject, $message, $headers );
		} else {
			echo json_encode( array( 'status' => 'error', 'msg' => __( 'Empty form data or invalid captcha.', 'es-trendy' ) ) );
		}
		die();
	}
}