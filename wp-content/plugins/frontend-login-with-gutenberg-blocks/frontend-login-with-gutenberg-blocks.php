<?php
/**
 * Plugin Name:       Frontend Login With Gutenberg Blocks
 * Description:       Do login, register and lost password operations from frontend.
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           1.0.0
 * Author:            Xidea Themes
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       frontend-login-with-gutenberg-blocks
 * Domain Path: /languages
 * @package           Frontend Login With Gutenberg Blocks
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


require( "inc/Options.php" );
require( "inc/simple_login.php" );


function frontend_login_with_gutenberg_blocks_init() {
	register_block_type( __DIR__ . '/build/login-form',
		[
			'render_callback' => 'login_form_render_callback'
		] );
	register_block_type( __DIR__ . '/build/register-form',
		[
			'render_callback' => 'register_form_render_callback'
		] );
	register_block_type( __DIR__ . '/build/reset-password-form',
		[
			'render_callback' => 'reset_password_form_render_callback'
		] );
}
add_action( 'init', 'frontend_login_with_gutenberg_blocks_init' );


function login_form_render_callback() {
	return sl_login_form( site_url( 'kayit-ol' ), site_url( 'sifremi-unuttum' ), site_url( 'hesabim?sayfa=cikis' ), $lang = 'tr' );
}

function register_form_render_callback() {
	return sl_registeration_form( site_url( 'sartlar-ve-kosullar' ), site_url( 'gizlilik-politikasi' ) );
}

function reset_password_form_render_callback() {
	return sl_lost_password_form( site_url( 'sifremi-unuttum' ) );
}

new \FLWGB\Options();
