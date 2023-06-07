<?php
/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 *
 * @since      1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/inc
 */

namespace FLWGB;

class Blocks {

	public function load_flwgb_blocks() {
		add_action( 'init', [ $this, 'register_flwgb_blocks' ] );
	}

	/**
	 * Register Block Types
	 *
	 * @since    1.0.0
	 */
	public function register_flwgb_blocks() {

		//Login Form Block
		register_block_type( plugin_dir_path( dirname( __FILE__ ) ). '/build/login-form',
			[
				'render_callback' => [ $this, 'login_form_render_callback' ]
			] );

		//Register Form Block
		register_block_type( plugin_dir_path( dirname( __FILE__ ) ) . '/build/register-form',
			[
				'render_callback' => [ $this, 'register_form_render_callback' ]
			] );

		//Lost Password Form Block
		register_block_type( plugin_dir_path( dirname( __FILE__ ) ) . '/build/reset-password-form',
			[
				'render_callback' => [ $this, 'reset_password_form_render_callback' ]
			] );

	}

	/**
	 * Callback function for login form block
	 *
	 * @param array $block_attributes Get block attributes from block-name/edit.js
	 * @return string Login form html template
	 * @since    1.0.0
	 */
	public function login_form_render_callback(array $block_attributes): string {

		Helper::using('inc/Login.php');

		$login = new Login();

		return $login->login_form($block_attributes);

	}

	/**
	 * Callback function for register form block
	 *
	 * @return string Login form template html
	 * @since    1.0.0
	 */
	public function register_form_render_callback(): string {

		Helper::using('inc/Register.php');

		$register = new Register();

		return $register->register_form();


	}

	/**
	 * Callback function for lost password form block
	 *
	 * @return string Lost password form template html
	 * @since    1.0.0
	 */
	public function reset_password_form_render_callback(array $block_attributes): string {

		Helper::using('inc/LostPassword.php');

		$lost_password = new LostPassword();

		return $lost_password->lost_password_form($block_attributes);

	}

}
