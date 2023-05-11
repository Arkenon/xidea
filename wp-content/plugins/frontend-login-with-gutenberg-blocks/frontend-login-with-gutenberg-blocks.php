<?php
/**
 * Plugin Name:       Frontend Login With Gutenberg Blocks
 * Plugin URI:        https://xideathemes.com/frontend-login-with-gutenberg-blocks
 * Description:       Do login, register and lost password operations from frontend.
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           1.0.0
 * Author:            Xidea Themes
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       flwgb
 * Domain Path:       /languages
 * @package           Frontend_Login_With_Gutenberg_Blocks
 */

// Exit if accessed directly.
defined('ABSPATH') or die;

// Get plugin data
$plugin_data = get_file_data(
	__FILE__,
	array(
		'version' => 'Version',
		'plugin_name' => 'Text Domain'
	)
);


//Constants
define( 'FLWGB_VERSION', $plugin_data['version'] );
define( 'FLWGB_PLUGIN_NAME', $plugin_data['text_domain'] );

//Include classes and functions
require plugin_dir_path( __FILE__ ) . 'inc/Options.php';
require plugin_dir_path( __FILE__ ) . 'inc/simple_login.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_flwgb() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/Activator.php';
	\FLWGB\Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_flwgb() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/Deactivator.php';
	\FLWGB\Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_flwgb' );
register_deactivation_hook( __FILE__, 'deactivate_flwgb' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'inc/Flwgb.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
$plugin = new \FLWGB\Flwgb();
$plugin->run();




/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
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
