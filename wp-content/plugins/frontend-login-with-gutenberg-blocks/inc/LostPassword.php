<?php

namespace FLWGB;

class LostPassword {

	/**
	 * Reset password form html output
	 *
	 * @return string html result of reset password form
	 * @since 1.0.0
	 */
	public function lost_password_form($block_attributes): string {

		$frontend = new Frontend();

		//Get reset password form html output from Frontend class
		return $frontend->get_lost_password_form($block_attributes);
	}

	/**
	 * Load reset password actions.
	 *
	 * @since    1.0.0
	 */
	public function load_reset_password_actions() {

		add_action( 'wp_ajax_flwgbresetpasswordhandle', 'flwgb_reset_password_handle_ajax_callback' );

		add_action( 'wp_ajax_flwgbresetpasswordrequesthandle', 'flwgb_reset_password_request_handle_ajax_callback' );

	}

	/**
	 * POST operation for reset password form.
	 *
	 * @return string|false a JSON encoded string on success or FALSE on failure.
	 * @since 1.0.0
	 */
	public function flwgb_reset_password_handle_ajax_callback() {

		$response = array();

		if ( Helper::get( 'reset' ) == 'complete' ) {

			$success_message = '<p class="alert alert-success">' . esc_html_x( I18n::$password_changed, 'Password change message', FLWGB_PLUGIN_NAME ) . '</p>';
			$error_message   = '<p class="alert alert-danger"><strong class="font-s-14">' . esc_html_x( I18n::$general_error_message, 'General error message', FLWGB_PLUGIN_NAME ) . '</strong></p>';

			$resetpass = wp_update_user( array(
				'ID'        => $_POST['userid'],
				'user_pass' => wp_slash( $_POST['resetpss'] )
			) );

			delete_user_meta( intval( $_POST['userid'] ), 'flwgb_lost_password_key' );

			if ( ! is_wp_error( $resetpass ) ) {

				$response = [
					'message' => $success_message
				];

			} else {

				$response = [
					'message' => $error_message
				];

			}
		}

		echo json_encode( $response );

		wp_die();

	}

	/**
	 * POST operation for sending reset password request.
	 *
	 * @return string|false a JSON encoded string on success or FALSE on failure.
	 * @since 1.0.0
	 */
	public function flwgb_reset_password_request_handle_ajax_callback() {

		$response = array();

		if ( Helper::get( 'reset' ) == 'request' ) {

			$mail       = Helper::post( 'flwgb-reset-mail' );
			$user       = get_user_by( 'email', $mail );
			$user_id    = $user->ID;
			$username   = $user->user_login;
			$code       = sha1( $user_id . time() );
			$reset_link = site_url( get_option( 'flwgb_lost_password_page' ) ) . '/?reset=in-progress&key=' . $code . '&user=' . $user_id;

			//TODO mail op
			Helper::using( 'inc/MailTemplates.php' );
			$mail                      = new MailTemplates();
			$send_reset_password_email = $mail->flwgb_reset_password_mail_template( $username, $mail, $reset_link, "" );


			$error_message   = '<p class="alert alert-danger"><strong class="font-s-14">' . esc_html_x( I18n::$general_error_message, 'General error message', FLWGB_PLUGIN_NAME ) . '</strong></p>';
			$success_message = '</strong></p>' . esc_html_x( I18n::$reset_password_request_confirmation, 'Password request confirmation message', FLWGB_PLUGIN_NAME ) . '</strong></p>';

			if ( ! is_wp_error( $send_reset_password_email ) ) {

				update_user_meta( $user_id, 'flwgb_lost_password_key', $code );

				$response = [
					'message' => $success_message
				];

			} else {

				$response = [
					'message' => $error_message
				];

			}
		}

		echo json_encode( $response );

		wp_die();

	}

}
