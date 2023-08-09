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
		add_action( 'wp_ajax_nopriv_flwgbregisterhandle', [ $this, 'flwgb_register_handle_ajax_callback' ] );
		add_action( 'wp_ajax_flwgbregisterhandle', [ $this, 'flwgb_register_handle_ajax_callback' ] );

	}

	/**
	 * Registeration form html output
	 *
	 * @param array $block_attributes Get block attributes from block-name/edit.js
	 *
	 * @return string html result of register form
	 * @since 1.0.0
	 */
	public function register_form( array $block_attributes ): string {

		$frontend = new Frontend();

		//Get register form html output from Frontend class
		return $frontend->get_the_form( 'public/partials/register/register-form.php', $block_attributes );
	}


	/**
	 * POST operation for registration.
	 *
	 * @return string|false a JSON encoded string on success or FALSE on failure.
	 * @since 1.0.0
	 */
	public function flwgb_register_handle_ajax_callback() {

		header( 'Access-Control-Allow-Origin: *' );

		$password       = Helper::post( 'flwgb-password-for-register' );
		$password_again = Helper::post( 'flwgb-password-again-for-register' );
		$username       = Helper::post( 'flwgb-username-for-register' );
		$email          = Helper::post( 'flwgb-email-for-register' );

		$params = [
			'username'        => $username,
			'email'           => $email,
			'admin_email'     => get_bloginfo( 'admin_email' ),
			'activation_link' => ''
		];

		if ( ( ! empty( $password ) && ! empty( $password_again ) ) && ( $password != $password_again ) ) {

			echo json_encode( array(
				'status'  => false,
				'message' => esc_html_x( I18n::text( 'password_match_error' )->text, I18n::text( 'password_match_error' )->context, FLWGB_TEXT_DOMAIN )
			) );

			wp_die();

		}

		if ( username_exists( $username ) ) {

			echo json_encode( array(
				'status'  => false,
				'message' => esc_html_x( I18n::text( 'username_exist_error' )->text, I18n::text( 'username_exist_error' )->context, FLWGB_TEXT_DOMAIN )
			) );

			wp_die();

		}

		if ( email_exists( $email ) ) {

			echo json_encode( array(
				'status'  => false,
				'message' => esc_html_x( I18n::text( 'user_exist_error' )->text, I18n::text( 'user_exist_error' )->context, FLWGB_TEXT_DOMAIN )
			) );

			wp_die();

		}

		$userdata = array(
			'user_login' => $username,
			'user_email' => $email,
			'user_pass'  => $password,
		);

		$newuser = wp_insert_user( $userdata );

		if ( ! is_wp_error( $newuser ) ) {

			$message = "";

			if ( get_option( "flwgb_has_activation" ) ) {

				$code = sha1( $email . time() );

				$add_user_activation      = add_user_meta( $newuser, 'flwgb_user_activation', 'not_activated' );
				$add_user_activation_code = add_user_meta( $newuser, 'flwgb_user_activation_code', $code );

				if ( $add_user_activation && $add_user_activation_code ) {

					$message = esc_html_x( I18n::text( 'register_succession_with_activation' )->text, I18n::text( 'register_succession_with_activation' )->context, FLWGB_TEXT_DOMAIN );

					$activation_link = site_url() . '/' . get_option( "flwgb_activation_page" ) . '?key=' . $code . '&user=' . $newuser;

					$params['activation_link'] = $activation_link;

				}

			} else {

				$message = esc_html_x( I18n::text( 'register_succession' )->text, I18n::text( 'register_succession' )->context, FLWGB_TEXT_DOMAIN );

			}

			Helper::using( 'inc/Mail.php' );
			$mail = new Mail();

			if ( get_option( "flwgb_has_activation" ) ) {

				$mail->send_mail( 'flwgb_register_mail_to_user_with_activation', 'register_mail_to_user_template_with_activation', $params, 'register_mail_title_to_user' );

			} else {

				$mail->send_mail( 'flwgb_register_mail_to_user', 'register_mail_to_user_template', $params, 'register_mail_title_to_user' );

			}

			$mail->send_mail( 'flwgb_register_mail_to_admin', 'register_mail_to_admin_template', $params, 'register_mail_title_to_admin', true );

			echo json_encode( array(
				'status'  => true,
				'message' => $message,
			) );

		} else {

			echo json_encode( array(
				'status'  => false,
				'message' => esc_html_x( I18n::text( 'general_error_message' )->text, I18n::text( 'general_error_message' )->context, FLWGB_TEXT_DOMAIN )
			) );

		}

		wp_die();

	}

}
