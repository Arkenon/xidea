<?php
/**
 * Class for plugin settings.
 *
 * This is used to register settings, create an options page at admin dashboard.
 *
 * @since      1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/inc
 */

namespace FLWGB;

class Options {

	/**
	 * Load options page
	 *
	 * @since    1.0.0
	 */
	public function load_flwgb_options() {

		// Register the options menu page
		add_action( 'admin_menu', [ $this, 'flwgb_options_page' ] );

		// Register the options with their default values
		add_action( 'admin_init', [ $this, 'flwgb_register_settings' ] );

	}

	/**
	 * Add a menu page into admin dashboard
	 *
	 * @since    1.0.0
	 */
	public function flwgb_options_page() {

		add_menu_page(
			'Frontend Login with Gutenberg Blocks',
			'Frontend Login',
			'manage_options',
			'frontend-login-with-gutenberg-blocks-settings',
			[ $this, 'flwgb_settings_page_html' ],
			'dashicons-admin-generic'
		);
	}

	/**
	 * Register settings for options page
	 *
	 * @since    1.0.0
	 */
	public function flwgb_register_settings() {

		// General settings
		register_setting( 'flwgb-general-settings-group', 'flwgb_redirect_after_login', 'sanitize_text_field' );
		register_setting( 'flwgb-general-settings-group', 'flwgb_redirect_after_registration', 'sanitize_text_field' );
		register_setting( 'flwgb-general-settings-group', 'flwgb_lost_password_page', 'sanitize_text_field' );
		register_setting( 'flwgb-general-settings-group', 'flwgb_register_page', 'sanitize_text_field' );
		register_setting( 'flwgb-general-settings-group', 'flwgb_activation_page', 'sanitize_text_field' );
		register_setting( 'flwgb-general-settings-group', 'flwgb_user_settings_page', 'sanitize_text_field' );
		register_setting( 'flwgb-general-settings-group', 'flwgb_terms_and_conditions_page', 'sanitize_text_field' );
		register_setting( 'flwgb-general-settings-group', 'flwgb_privacy_policy_page', 'sanitize_text_field' );
		register_setting( 'flwgb-general-settings-group', 'flwgb_has_activation', 'sanitize_text_field' );
		register_setting( 'flwgb-general-settings-group', 'flwgb_has_user_dashboard', 'sanitize_text_field' );

		// E-Mail settings
		register_setting( 'flwgb-mail-settings-group', 'flwgb_register_mail_to_user' );
		register_setting( 'flwgb-mail-settings-group', 'flwgb_register_mail_to_admin' );
		register_setting( 'flwgb-mail-settings-group', 'flwgb_reset_request_mail_to_user' );

	}

	/**
	 * Define the options page markup
	 *
	 * @since    1.0.0
	 */
	public function flwgb_settings_page_html() {

		$backend = new Backend();

		//Get options page html output from Backend class
		$backend->get_options_page();

	}

}

