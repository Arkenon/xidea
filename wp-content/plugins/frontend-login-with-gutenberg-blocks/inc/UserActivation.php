<?php
/**
 * This class is responsible for user activation operations.
 *
 * If user activation enabled, this class creates and checks activation code.
 *
 * @since      1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/inc
 */

namespace FLWGB;

use FLWGB\I18n\I18n;

class UserActivation {

	/**
	 * Check user activation from database.
	 *
	 * @param string $user_id ID of current user
	 *
	 * @return bool If user activated returns true else false
	 * @since 1.0.0
	 *
	 */
	public function check_is_user_activated( $user_id ) {

		$user = get_user_by( 'ID', $user_id );

		$get_user_status         = $user->user_status;
		$get_activation_metadata = get_user_meta( $user_id, 'flwgb_needs_user_activation', true );

		if ( ! empty( $get_activation_metadata ) || $get_activation_metadata ) {

			return $get_user_status;

		}

		return true;

	}

	/**
	 *
	 * Activate user with activation code
	 *
	 * @param string $user_id ID of the user
	 * @param string $code Activation code
	 *
	 * @return array Activation result
	 *
	 * @since 1.0.0
	 *
	 */
	public function activate_user( string $code, int $user_id ): array {

		$user            = get_user_by( 'ID', $user_id );
		$activation_code = $user->user_activation_key;

		if ( $activation_code === $code ) {

			$user->user_status = true;

			$update = wp_update_user( $user );

			if ( is_wp_error( $update ) ) {

				return array(
					'status'  => false,
					'message' => esc_html_x( I18n::text( 'general_error_message' )->text, I18n::text( 'general_error_message' )->context, FLWGB_TEXT_DOMAIN )
				);

			}

//TODO user activation test and errors

			$update_meta  =update_user_meta($user_id,'flwgb_needs_user_activation',0);

			if ( is_wp_error( $update_meta ) ) {

				return array(
					'status'  => false,
					'message' => esc_html_x( I18n::text( 'general_error_message' )->text, I18n::text( 'general_error_message' )->context, FLWGB_TEXT_DOMAIN )
				);

			}

			return array(
				'status'  => true,
				'message' => esc_html_x( I18n::text( 'your_account_has_activated' )->text, I18n::text( 'your_account_has_activated' )->context, FLWGB_TEXT_DOMAIN )
			);

		} else {

			return array(
				'status'  => false,
				'message' => esc_html_x( I18n::text( 'wrong_activation_code' )->text, I18n::text( 'wrong_activation_code' )->context, FLWGB_TEXT_DOMAIN )
			);

		}

	}

	/**
	 * User Activation block html output
	 *
	 * @param array $block_attributes Get block attributes from block-name/edit.js
	 *
	 * @return string html result of user activation block
	 * @since 1.0.0
	 */
	public function user_activation_block( array $block_attributes ): string {

		$frontend = new Frontend();

		//Get login form html output from Frontend class
		return $frontend->get_the_form( 'public/partials/user-activation/user-activation.php', $block_attributes );

	}


}
