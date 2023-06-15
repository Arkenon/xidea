<?php
/**
 * Register operation methods, hooks and more.
 *
 * @since      1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/inc
 */

namespace FLWGB;

use FLWGB\I18n\I18n;

class Register {

	/**
	 * Load registration actions.
	 *
	 * @since    1.0.0
	 */
	public function load_register_actions() {

		//Load ajax callback
		add_action( 'wp_ajax_flwgbregisterhandle', 'flwgb_register_handle_ajax_callback' );

	}

	/**
	 * Registeration form html output
	 *
	 * @return string html result of register form
	 * @since 1.0.0
	 */
	public function register_form(): string {

		$frontend = new \FLWGB\Frontend();

		//Get register form html output from Frontend class
		return $frontend->get_register_form();
	}


	/**
	 * POST operation for registration.
	 *
	 * @return string|false a JSON encoded string on success or FALSE on failure.
	 * @since 1.0.0
	 */
	public function flwgb_register_handle_ajax_callback() {

		Helper::using( "inc/Mail.php" );
		$mail = new Mail();

		$message    = esc_html_x( I18n::$register_succession, 'Registration success message', FLWGB_TEXT_DOMAIN );
		$return_url = site_url( get_option( 'flwgb_redirect_after_registration' ) ) ?: '';

		if ( get_option( "flwgb_has_activation" ) ) {

			$message = esc_html_x( I18n::$register_succession_with_activation, 'Registration success message with activation', FLWGB_TEXT_DOMAIN );

		}

		if ( ( ! empty( Helper::post( 'user_pass' ) ) && ! empty( Helper::post( 'user_pass_repeat' ) ) ) && ( Helper::post( 'user_pass' ) != Helper::post( 'user_pass_repeat' ) ) ) {

			$message = esc_html_x( I18n::$password_match_error, 'Reset password matching error', FLWGB_TEXT_DOMAIN );

		} else {

			$username = Helper::post( 'username' );
			$email    = Helper::post( 'user_email' );
			$password = Helper::post( 'user_pass' );

			if ( ! username_exists( $username ) && ! email_exists( $email ) ) {

				$userdata = array(
					'user_login' => $username,
					'user_email' => $email,
					'user_pass'  => $password
				);

				$newuser = wp_insert_user( $userdata );

				if ( ! is_wp_error( $newuser ) ) {

					$code = sha1( $newuser . time() );

					global $wpdb;

					$update = $wpdb->update( $wpdb->prefix . '_users', array(
						'ID'                  => $newuser,
						'user_activation_key' => $code
					), array( 'ID' => $newuser ) );

					if ( ! is_wp_error( $update ) ) {

						if ( get_option( "flwgb_has_activation" ) ) {

							$activation_link = get_option( "flwgb_activation_page" ) . '/activation?key=' . $code . '&user=' . $newuser;

							//$mail->flwgb_activation_mail_template( $username, $email, $activation_link, "", "" );


						} else {

							//$mail->flwgb_new_member_mail_user_template( $username, $email, "", "" );

						}

						//$mail->flwgb_new_member_mail_admin_template( 'Admin', get_option( 'admin_email' ), $username, admin_url( 'users.php' ), "", "" );


					} else {

						$message = esc_html_x(I18n::$general_error_message,'General error message',FLWGB_TEXT_DOMAIN);

					}

				}
			} else {

				if ( username_exists( $username ) ) {

					$message = esc_html_x(I18n::$username_exist_error,'General error message',FLWGB_TEXT_DOMAIN);

				}

				if ( email_exists( $email ) ) {

					$message = esc_html_x(I18n::$user_exist_error,'General error message',FLWGB_TEXT_DOMAIN);

				}

			}
		}

		$response = [
			'message'    => $message,
			'return_url' => $return_url,
		];

		echo json_encode( $response );

		wp_die();

	}

}
