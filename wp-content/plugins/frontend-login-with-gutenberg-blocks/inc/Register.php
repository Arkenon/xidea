<?php
/**
 * Register operation methods, hooks and more.
 *
 * @since      1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/inc
 */

namespace FLWGB;

class Register {

	/**
	 * Load registration actions.
	 *
	 * @since    1.0.0
	 */
	public function load_register_actions() {

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

		using("inc/MailTemplates.php");
		$mail = new MailTemplates();

		$message    = esc_html_x( I18n::$register_succession, 'Registration success message', FLWGB_PLUGIN_NAME );
		$return_url = site_url( get_option( 'flwgb_return_after_registration' ) ) ?: '';

		if ( get_option( "flwgb_has_activation" ) ) {

			$message = esc_html_x( I18n::$register_succession_with_activation, 'Registration success message with activation', FLWGB_PLUGIN_NAME );

		}

		if ( ( ! empty( post( 'user_pass' ) ) && ! empty( post( 'user_pass_repeat' ) ) ) && ( post( 'user_pass' ) != post( 'user_pass_repeat' ) ) ) {

			$message = I18n::$password_match_error;

		} else {

			$username = post( 'username' );
			$email    = post( 'user_email' );
			$password = post( 'user_pass' );

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

							$mail->flwgb_activation_mail_template($username, $email, $activation_link, "", "");


						} else {

							$mail->flwgb_new_member_mail_user_template( $username, $email, "", "" );

						}

						$mail->flwgb_new_member_mail_admin_template( 'Admin', get_option( 'admin_email' ), $username, admin_url( 'users.php' ), "", "" );


					} else {

						$message = I18n::$general_error_message;

					}
				}
			} else {
				if ( username_exists( $username ) ) {

					$message = I18n::$username_exist_error;

				}
				if ( email_exists( $email ) ) {

					$message = I18n::$user_exist_error;

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
