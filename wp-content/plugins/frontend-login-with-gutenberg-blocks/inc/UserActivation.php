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

// Exit if accessed directly.
defined( 'ABSPATH' ) or die;

use FLWGB\I18n\I18n;

class UserActivation {

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

	/**
	 * Check user activation from database.
	 *
	 * @param int $user_id ID of current user
	 *
	 * @return bool If user activated returns True else False
	 * @since 1.0.0
	 *
	 */
	public function check_is_user_activated( int $user_id ): bool {

		$check_activation = get_user_meta( $user_id, 'flwgb_user_activation', true );

		if($check_activation === 'not_activated'){

			return false;

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

		$activation_code  = get_user_meta( $user_id, 'flwgb_user_activation_code', true );
		$check_activation = $this->check_is_user_activated( $user_id );

		if ( $activation_code === $code ) {

			if ( $check_activation ) {

				return array(
					'status'  => true,
					'message' => esc_html_x( I18n::text( 'user_already_activated' )->text, I18n::text( 'user_already_activated' )->context, FLWGB_TEXT_DOMAIN )
				);

			}

			$update = update_user_meta( $user_id, 'flwgb_user_activation', 'activated' );

			if ( ! $update ) {

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

}
