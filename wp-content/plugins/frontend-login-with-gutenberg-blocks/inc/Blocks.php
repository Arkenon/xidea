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

	public function __construct() {
		add_action( 'init', [ $this, 'flwgb_blocks_init' ] );
	}

	/**
	 * Register Block Types
	 *
	 * @since    1.0.0
	 */
	public function flwgb_blocks_init() {

		//Login Form Block
		register_block_type( __DIR__ . '/build/login-form',
			[
				'render_callback' => [ $this, 'login_form_render_callback' ]
			] );

		//Register Form Block
		register_block_type( __DIR__ . '/build/register-form',
			[
				'render_callback' => [ $this, 'register_form_render_callback' ]
			] );

		//Lost Password Form Block
		register_block_type( __DIR__ . '/build/reset-password-form',
			[
				'render_callback' => [ $this, 'reset_password_form_render_callback' ]
			] );

	}

	/**
	 * Callback function for login form block
	 *
	 * @since    1.0.0
	 */
	public function login_form_render_callback() {
		return sl_login_form( site_url( 'kayit-ol' ), site_url( 'sifremi-unuttum' ), site_url( 'hesabim?sayfa=cikis' ), $lang = 'tr' );
	}

	/**
	 * Callback function for register form block
	 *
	 * @since    1.0.0
	 */
	public function register_form_render_callback() {
		return sl_registeration_form( site_url( 'sartlar-ve-kosullar' ), site_url( 'gizlilik-politikasi' ) );
	}

	/**
	 * Callback function for lost password form block
	 *
	 * @since    1.0.0
	 */
	public function reset_password_form_render_callback() {
		return sl_lost_password_form( site_url( 'sifremi-unuttum' ) );
	}
}
