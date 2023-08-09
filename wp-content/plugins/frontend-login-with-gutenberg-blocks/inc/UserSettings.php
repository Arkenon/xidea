<?php

namespace FLWGB;

use FLWGB\I18n\I18n;

class UserSettings {

	/**
	 * Load user settings actions.
	 *
	 * @since    1.0.0
	 */
	public function load_user_settings_actions() {

		//Load ajax callback
		add_action( 'wp_ajax_nopriv_flwgbusersettingsupdatehandle', [
			$this,
			'flwgb_user_settings_handle_ajax_callback'
		] );
		add_action( 'wp_ajax_flwgbusersettingsupdatehandle', [ $this, 'flwgb_user_settings_handle_ajax_callback' ] );

	}


	/**
	 * User settings form html output
	 *
	 * @param array $block_attributes Get block attributes from block-name/edit.js
	 *
	 * @return string html result of user settings form
	 * @since 1.0.0
	 */
	public function user_settings_form( array $block_attributes ) {

		$frontend = new Frontend();

		//Get user settings form html output from Frontend class
		return $frontend->get_the_form( 'public/partials/user-settings/user-settings-form.php', $block_attributes );

	}

	/**
	 * POST operation for user settings.
	 *
	 * @return string|false a JSON encoded string on success or FALSE on failure.
	 * @since 1.0.0
	 */
	public function flwgb_user_settings_handle_ajax_callback() {

		header( 'Access-Control-Allow-Origin: *' );

		$user_id = Helper::post( 'user_id' );

		$user_info = get_userdata( $user_id );

		$user_info->first_name  = Helper::post( 'flwgb-user-first-name' );
		$user_info->last_name   = Helper::post( 'flwgb-user-last-name' );
		$user_info->user_email  = Helper::post( 'flwgb-email-update' );
		$user_info->user_url    = Helper::post( 'flwgb-user-website' );
		$user_info->description = Helper::post( 'flwgb-user-bio' );

		$update = wp_update_user( $user_info );

		if ( ! is_wp_error( $update ) ) {

			$current_password   = Helper::post( 'flwgb-current-password' );
			$new_password       = Helper::post( 'flwgb-password-update' );
			$new_password_again = Helper::post( 'flwgb-password-again-update' );

			if ( ! empty( $new_password ) && ! empty( $new_password_again ) ) {

				if ( $user_info && wp_check_password( $current_password, $user_info->user_pass, $user_id ) ) {

					if ( ( ! empty( $new_password ) && ! empty( $new_password_again ) ) && ( $new_password != $new_password_again ) ) {

						echo json_encode( array(
							'status'  => false,
							'message' => esc_html_x( I18n::text( 'password_match_error' )->text, I18n::text( 'password_match_error' )->context, FLWGB_TEXT_DOMAIN )
						) );

						wp_die();

					} else {

						wp_set_password( $new_password, $user_id );

						echo json_encode( array(
							'status'  => true,
							'message' => esc_html_x( I18n::text( 'general_success_message' )->text, I18n::text( 'general_success_message' )->context, FLWGB_TEXT_DOMAIN )
						) );

						wp_die();

					}
				} else {

					echo json_encode( array(
						'status'  => false,
						'message' => esc_html_x( I18n::text( 'current_password_error' )->text, I18n::text( 'current_password_error' )->context, FLWGB_TEXT_DOMAIN )
					) );

					wp_die();

				}
			} else {

				echo json_encode( array(
					'status'  => true,
					'message' => esc_html_x( I18n::text( 'general_success_message' )->text, I18n::text( 'general_success_message' )->context, FLWGB_TEXT_DOMAIN )
				) );

				wp_die();

			}

		} else {

			echo json_encode( array(
				'status'  => false,
				'message' => esc_html_x( I18n::text( 'general_error_message' )->text, I18n::text( 'general_error_message' )->context, FLWGB_TEXT_DOMAIN )
			) );

			wp_die();

		}

	}

}
