<?php
/**
 * Login operation methods, hooks and more.
 *
 * @since      1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/inc
 */

namespace FLWGB;

// Exit if accessed directly.
defined( 'ABSPATH' ) or die;

use FLWGB\I18n\I18n;

class Login {

	private $max_attempts = 5; //times
	private $lockout_duration = 300; //seconds

	public function load_login_actions() {

		///Load ajax callback
		add_action( 'wp_ajax_nopriv_flwgbloginhandle', [ $this, 'login_handle_ajax_callback' ] );
		add_action( 'wp_ajax_flwgbloginhandle', [ $this, 'login_handle_ajax_callback' ] );

		//Limit login
		if ( get_option( 'flwgb_enable_limit_login' ) == 'yes' ) {

			add_action( 'wp_login_failed', [ $this, 'limit_login_attempts' ] );

		}

	}


	/**
	 * Welcome Card html output (for logged in users)
	 *
	 * @param array $block_attributes Get block attributes from block-name/edit.js
	 *
	 * @return string html result of welcome card
	 * @since 1.0.0
	 */
	public function welcome_card( array $block_attributes ): string {

		$frontend = new Frontend();

		//Get html output from Frontend class
		return $frontend->get_the_form( 'public/partials/login/welcome-card.php', $block_attributes );

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

		header( 'Access-Control-Allow-Origin: *' );

		if ( get_option( 'flwgb_enable_limit_login' ) == 'yes' && $this->get_login_attempts_count()['login_attempts'] >= $this->get_limit_login_options()['max_attempts'] ) {

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
			'status'  => false,
			'message' => esc_html_x( I18n::text( 'invalid_username_or_pass' )->text, I18n::text( 'invalid_username_or_pass' )->context, FLWGB_TEXT_DOMAIN )
		) );

	}

	/**
	 * Get login attempts count
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function get_login_attempts_count(): array {

		$user_ip = $_SERVER['REMOTE_ADDR'];

		//$user_ip = "172.1.00.125";

		return [
			'user_ip'        => $user_ip,
			'login_attempts' => get_transient( "login_attempts_" . $user_ip )
		];

	}

	/**
	 * Get limit login options from database
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function get_limit_login_options(): array {

		$max_attempts     = ! get_option( 'flwgb_limit_login_max_attempts' ) ? $this->max_attempts : get_option( 'flwgb_limit_login_max_attempts' );
		$lockout_duration = ! get_option( 'flwgb_limit_login_lockout_duration' ) ? $this->lockout_duration : get_option( 'flwgb_limit_login_lockout_duration' );

		return [
			'max_attempts'    => $max_attempts,
			'lockout_duration' => $lockout_duration
		];

	}

	/**
	 * Limit login attempt to prevent brute force attacks
	 *
	 * @since 1.0.0
	 */
	public function limit_login_attempts() {

		$lockout_duration = $this->get_limit_login_options()['lockout_duration'];

		$user_ip        = $this->get_login_attempts_count()['user_ip'];
		$login_attempts = $this->get_login_attempts_count()['login_attempts'];

		set_transient( "login_attempts_" . $user_ip, $login_attempts + 1, $lockout_duration );

	}

	/**
	 * Json result for to login attempt error.
	 *
	 * @return string Json result
	 * @since 1.0.0
	 */
	private function login_attempts_error(): string {

		//TODO does sprintf return translatable text?

		$limit_login_options = $this->get_limit_login_options();

		if ( $limit_login_options['lockout_duration'] >= 60 ) {

			$duration_type  = "minutes";
			$duration_limit = $limit_login_options['lockout_duration'] / 60;

		} else {

			$duration_type  = "seconds";
			$duration_limit = $limit_login_options['lockout_duration'];

		}

		return json_encode( array(
			'status'  => false,
			'message' => sprintf( __( I18n::text( 'login_attempts_error' )->text, FLWGB_TEXT_DOMAIN ), $duration_limit, $duration_type )
		) );

	}

}
