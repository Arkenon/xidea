<?php
/**
 * Login operation methods, hooks and more.
 *
 * @since      1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/inc
 */

namespace FLWGB;

class Login {

	public function load_login_actions() {

		// Hook: Redirect user if login completed
		add_filter( 'login_redirect', [ $this, 'redirect_after_login' ] );

	}

	/**
	 * Redirect after use login
	 *
	 * @since 1.0.0
	 */
	public function redirect_after_login() {

		return site_url( get_option( 'flwgb_redirect_after_login' ) );

	}

	/**
	 * Login form html output
	 *
	 * @param array $block_attributes Get block attributes from block-name/edit.js
	 * @return string html result of login form
	 * @since 1.0.0
	 */
	public function login_form(array $block_attributes): string {

		$frontend = new Frontend();

		//Get login form html output from Frontend class
		return $frontend->get_login_form($block_attributes);

	}

}
