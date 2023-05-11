<?php

namespace FLWGB;

class Options {
// Add the options page to the admin menu

	public function load_flwgb_options() {

		// Register the options menu page
		add_action( 'admin_menu', [ $this, 'flwgb_options_page' ] );

		// Register the options with their default values
		add_action( 'admin_init', [ $this, 'flwgb_register_settings' ] );

	}

	public function flwgb_options_page() {

		// Add the options menu page
		add_menu_page(
				'Frontend Login with Gutenberg Blocks',
				'Frontend Login',
				'manage_options',
				'frontend-login-with-gutenber-blocks-settings',
				[ $this, 'flwgb_settings_page_html' ],
				'dashicons-admin-generic'
		);
	}

	public function flwgb_register_settings() {
		register_setting( 'flwgb-settings-group', 'flwgb_redirect_after_logout', 'sanitize_text_field' );
		register_setting( 'flwgb-settings-group', 'flwgb_redirect_after_login', 'sanitize_text_field' );
	}

// Define the options page markup
	public function flwgb_settings_page_html() {

		require_once plugin_dir_path( __FILE__ ) . '../admin/Backend.php';
		$backend = new \FLWGB\Backend();

		$backend->get_options_page();
	}

}

