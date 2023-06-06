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

		global $wpdb;

		$check_user = $wpdb->get_var( "SELECT user_status FROM $wpdb->users WHERE ID=$user_id" );

		if ( $check_user == 0 ) {

			return false;

		} else {

			return true;
		}

	}
}
