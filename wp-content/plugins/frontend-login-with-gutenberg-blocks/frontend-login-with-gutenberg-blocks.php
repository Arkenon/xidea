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
defined( 'ABSPATH' ) or die;

use FLWGB\Flwgb;

//Get helper functions at first.
require plugin_dir_path( __FILE__ ) . 'inc/helpers.php';

// Get plugin data
$plugin_data = get_file_data(
	__FILE__,
	array(
		'version'     => 'Version',
		'plugin_name' => 'Text Domain'
	)
);

//Constants
define( 'FLWGB_VERSION', $plugin_data['version'] );
define( 'FLWGB_PLUGIN_NAME', $plugin_data['text_domain'] );

/**
 * The code that runs during plugin activation.
 * This action is documented in inc/Activator.php
 * @since    1.0.0
 */
function activate_flwgb() {

	using('inc/Activator.php');

	\FLWGB\Activator::activate();

}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in inc/Deactivator.php
 * @since    1.0.0
 */
function deactivate_flwgb() {

	using('inc/Deactivator.php');

	\FLWGB\Deactivator::deactivate();

}

/**
 * Register activation and deactivation hooks
 * @since    1.0.0
 */
register_activation_hook( __FILE__, 'activate_flwgb' );
register_deactivation_hook( __FILE__, 'deactivate_flwgb' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, public-facing site hooks and more...
 */
using('inc/Flwgb.php');

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
$plugin = new Flwgb();

$plugin->run();
