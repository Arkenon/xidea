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

	public function load_login_actions() {

		///Load ajax callback
		add_action( 'wp_ajax_nopriv_flwgbloginhandle', [ $this, 'flwgb_login_handle_ajax_callback' ] );

	}

	/**
	 * Login form html output
	 *
	 * @param array $block_attributes Get block attributes from block-name/edit.js
	 *
	 * @return string html result of login form
	 * @since 1.0.0
	 */
	public function login_form( array $block_attributes ): string {

		$frontend = new Frontend();

		//Get login form html output from Frontend class
		return $frontend->get_login_form( $block_attributes );

	}

	/**
	 * POST operation for login.
	 *
	 * @return string|false a JSON encoded string on success or FALSE on failure.
	 * @since 1.0.0
	 */
	public function flwgb_login_handle_ajax_callback() {

		check_ajax_referer( 'flwgbloginhandle', 'security' );

		$credentials                  = array();
		$credentials['user_login']    = Helper::post( 'flwgb-username-or-email' ) ?? '';
		$credentials['user_password'] = Helper::post( 'flwgb-password' ) ?? '';
		$credentials['remember']      = Helper::post( 'flwgb-rememberme' ) == 'on' ? true : false;

		$user = wp_signon( $credentials, false );

		if ( is_wp_error( $user ) ) {

			echo json_encode( array(
				'loggedin' => false,
				'message'  => esc_html_x( I18n::$invalid_username_or_pass, I18n::$invalid_username_or_pass, 'flwgb' )
			) );

		} else {

			echo json_encode( array(
				'loggedin'   => true,
				'return_url' => site_url( get_option( 'flwgb_redirect_after_login' ) ),
				'message'    => esc_html_x( I18n::$login_successful, I18n::$login_successful, 'flwgb' )
			) );

		}

		die();

	}

}
