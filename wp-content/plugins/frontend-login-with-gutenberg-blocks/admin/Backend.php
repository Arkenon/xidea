<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @since      1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/admin
 */

namespace FLWGB;

class Backend {
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( FLWGB_TEXT_DOMAIN, plugin_dir_url( __FILE__ ) . 'css/flwgb-admin.css', array(), FLWGB_VERSION, 'all' );

	}

	/**
	 * Register the stylesheets for the block editor (Common styles).
	 *
	 * @since    1.0.0
	 */
	public function editor_styles() {

		add_editor_style( array( plugin_dir_url( __FILE__ ) . 'css/flwgb-editor.css' ) );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( FLWGB_TEXT_DOMAIN, plugin_dir_url( __FILE__ ) . 'js/flwgb-admin.js', array( 'jquery' ), FLWGB_VERSION, false );

		wp_localize_script( 'flwgb-plugin-data', 'FLWGB', flwgb_get_plugin_data() );

	}

	/**
	 * Print admin panel options page.
	 *
	 * @since    1.0.0
	 */
	public function get_options_page() {

		//Include options page html template from options_page.php
		Helper::print_view( 'admin/partials/options-page.php' );

	}
}
