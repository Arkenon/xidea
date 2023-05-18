<?php
/**
 * Login operation methods, hooks and more.
 *
 * @since      1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/inc
 */

namespace FLWGB;

class Login {

	public function __construct() {

		// Hook: Redirect user if login completed
		add_filter( 'login_redirect', [ $this, 'redirect_after_login' ] );

		// Hook: Redirect user if login failed
		add_action( 'wp_login_failed', [ $this, 'redirect_if_login_failed' ] );

	}

	/**
	 * Redirect after use login
	 *
	 * @since 1.0.0
	 */
	public function redirect_after_login() {

		return site_url( get_option( 'flwgb_user_dashboard_page' ) );

	}


	/**
	 * Redirect if login operation failed
	 *
	 * @since 1.0.0
	 */
	public function redirect_if_login_failed() {

		$param = '/?login=error';

		$referrer = $_SERVER['HTTP_REFERER'];

		if ( ! empty( $referrer ) && ! strstr( $referrer, 'wp-login' ) && ! strstr( $referrer, 'wp-admin' ) ) {

			! strstr( $referrer, $param ) ? wp_redirect( $referrer . $param ) : wp_redirect( $referrer );

			exit;
		}

	}

	/**
	 * Login form html output
	 *
	 * @return string html result of login form
	 * @since 1.0.0
	 */
	public function login_form(): string {

		$frontend = new \FLWGB\Frontend();

		//Get login form html output from Frontend class
		return $frontend->get_login_form();

	}

}
