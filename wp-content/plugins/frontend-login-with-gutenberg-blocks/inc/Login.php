<?php
/**
 * Login operation methods, hooks and more.
 *
 * @since      1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/inc
 */

namespace FLWGB;

use FLWGB\I18n\I18n;

class Login {

	public function load_login_actions() {

		///Load ajax callback
		add_action( 'wp_ajax_nopriv_flwgbloginhandle', [ $this, 'login_handle_ajax_callback' ] );
		add_action( 'wp_ajax_flwgbloginhandle', [ $this, 'login_handle_ajax_callback' ] );

		//Limit login
		add_action( 'wp_login_failed', [ $this, 'limit_login_attempts' ] );

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
		return $frontend->get_the_form( 'public/partials/login/login-form.php', $block_attributes );

	}

	/**
	 * POST operation for login.
	 *
	 * @since 1.0.0
	 */
	public function login_handle_ajax_callback() {

		if($this->get_login_attempts_count()['login_attempts'] >= 5){

			echo $this->login_attempts_error();

			wp_die();

		}

		check_ajax_referer( 'flwgbloginhandle', 'security' );

		$credentials                  = array();
		$credentials['user_login']    = Helper::post( 'flwgb-username-or-email' ) ?? '';
		$credentials['user_password'] = Helper::post( 'flwgb-password' ) ?? '';
		$credentials['remember']      = Helper::post( 'flwgb-rememberme' ) == 'on' ? true : false;

		$user = wp_signon( $credentials, false );

		if ( is_wp_error( $user ) ) {

			echo $this->login_failed_response();

		} else {

			if ( get_option( 'flwgb_has_activation' ) === 'yes' ) {

				Helper::using( "inc/UserActivation.php" );
				$activation = new UserActivation();

				if ( $activation->check_is_user_activated( $user->ID ) ) {

					echo $this->login_success_response();

				} else {

					echo json_encode( array(
						'status'  => false,
						'message' => esc_html_x( I18n::text( 'user_not_activated' )->text, I18n::text( 'user_not_activated' )->context, FLWGB_TEXT_DOMAIN )
					) );

					wp_logout();

				}

			} else {

				$this->login_success_response();

			}

		}

		wp_die();

	}

	/**
	 * Json result for login. When login success
	 *
	 * @return string Json result
	 * @since 1.0.0
	 */
	private function login_success_response(): string {

		return json_encode( array(
			'status'     => true,
			'return_url' => site_url( get_option( 'flwgb_redirect_after_login' ) ),
			'message'    => esc_html_x( I18n::text( 'login_successful' )->text, I18n::text( 'login_successful' )->context, FLWGB_TEXT_DOMAIN )
		) );

	}

	/**
	 * Json result for login. When login failed
	 *
	 * @return string Json result
	 * @since 1.0.0
	 */
	private function login_failed_response(): string {

		return json_encode( array(
			'status'     => false,
			'message'    => esc_html_x( I18n::text( 'invalid_username_or_pass' )->text, I18n::text( 'invalid_username_or_pass' )->context, FLWGB_TEXT_DOMAIN )
		) );

	}

	/**
	 * Get login attempts count
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function get_login_attempts_count(): array {

		//$user_ip = $_SERVER['REMOTE_ADDR'];
		$user_ip = "1.172.00.13";

		return [
			'user_ip'        => $user_ip,
			'login_attempts' => get_transient( "login_attempts_" . $user_ip )
		];

	}

	/**
	 * Limit login attempt to prevent brute force attacks
	 *
	 * @since 1.0.0
	 */
	public function limit_login_attempts() {

		$max_attempts     = 5;
		$lockout_duration = 1 * 60;

		$user_ip        = $this->get_login_attempts_count()['user_ip'];
		$login_attempts = $this->get_login_attempts_count()['login_attempts'];

		if ( $login_attempts >= $max_attempts ) {

			echo $this->login_attempts_error();

		}


		set_transient( "login_attempts_" . $user_ip, $login_attempts + 1, $lockout_duration );

	}

	/**
	 * Json result for to login attemp error.
	 *
	 * @return string Json result
	 * @since 1.0.0
	 */
	private function login_attempts_error(): string {

		return json_encode( array(
			'status'  => false,
			'message' => esc_html_x( I18n::text( 'login_attempts_error' )->text, I18n::text( 'login_attempts_error' )->context, FLWGB_TEXT_DOMAIN )
		) );

	}

}
