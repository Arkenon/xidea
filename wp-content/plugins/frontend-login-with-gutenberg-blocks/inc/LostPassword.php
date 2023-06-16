<?php

namespace FLWGB;

use FLWGB\I18n\I18n;

class LostPassword {

	/**
	 * Reset password form html output
	 *
	 * @param array $block_attributes Get block attributes from block-name/edit.js
	 *
	 * @return string html result of reset password form
	 * @since 1.0.0
	 */
	public function lost_password_form( array $block_attributes ): string {

		$frontend = new Frontend();

		//Get reset password form html output from Frontend class
		return $frontend->get_lost_password_form( $block_attributes );
	}

	/**
	 * Load reset password actions.
	 *
	 * @since    1.0.0
	 */
	public function load_reset_password_actions() {

		add_action( 'wp_ajax_nopriv_flwgbresetpasswordhandle', [ $this, 'flwgb_reset_password_handle_ajax_callback' ] );
		add_action( 'wp_ajax_flwgbresetpasswordhandle', [ $this, 'flwgb_reset_password_handle_ajax_callback' ] );

		add_action( 'wp_ajax_nopriv_flwgbresetrequesthandle', 'flwgb_reset_password_request_handle_ajax_callback' );
		add_action( 'wp_ajax_flwgbresetrequesthandle', [ $this, 'flwgb_reset_password_request_handle_ajax_callback' ] );

	}

	/**
	 * POST operation for sending reset password request.
	 *
	 * @since 1.0.0
	 */
	public function flwgb_reset_password_request_handle_ajax_callback() {

		check_ajax_referer( 'flwgbresetrequesthandle', 'security' );

		$email      = Helper::post( 'flwgb-email' );
		$user       = get_user_by( 'email', $email );
		$user_id    = $user->ID;
		$username   = $user->user_login;
		$code       = sha1( $user_id . time() );
		$reset_link = site_url( get_option( 'flwgb_lost_password_page' ) ) . '/?reset=in-progress&key=' . $code . '&user=' . $user_id;

		$params = [
			'username'   => $username,
			'email'      => $email,
			'reset_link' => $reset_link
		];

		Helper::using( 'inc/Mail.php' );
		$mail_templates = new Mail();

		$send_reset_password_email = $mail_templates->flwgb_reset_password_request_mail_template( 'flwgb_reset_request_mail_to_user', $params );

		if ( $send_reset_password_email ) {

			update_user_meta( $user_id, 'flwgb_lost_password_key', $code );

			echo json_encode( array(
				'status'  => true,
				'message' => esc_html_x( I18n::text( 'reset_password_request_confirmation' )->text, I18n::text( 'reset_password_request_confirmation' )->context, FLWGB_TEXT_DOMAIN )
			) );

		} else {

			echo json_encode( array(
				'status'  => false,
				'message' => esc_html_x( I18n::text( 'general_error_message' )->text, I18n::text( 'general_error_message' )->context, FLWGB_TEXT_DOMAIN )
			) );

		}

		wp_die();

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

			$success_message = '<p class="alert alert-success">' . esc_html_x( I18n::text( 'password_changed' )->text, I18n::text( 'password_changed' )->context, FLWGB_TEXT_DOMAIN ) . '</p>';
			$error_message   = '<p class="alert alert-danger"><strong class="font-s-14">' . esc_html_x( I18n::text( 'general_error_message' )->text, I18n::text( 'general_error_message' )->context, FLWGB_TEXT_DOMAIN ) . '</strong></p>';

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

}
