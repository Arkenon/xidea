<?php
/**
 * Theme functions and definitions.
 * @author     xideathemes
 * @copyright  (c) Copyright by Xidea Themes
 * @link       https://xideathemes.com
 * @package     Blocland FSE Block Theme
 * @since         1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

// Definitions
define( 'BLOCLAND_FSE_VERSION', '1.0.0' );
define( 'BLOCLAND_FSE_DIR', get_template_directory() );
define( 'BLOCLAND_FSE_URI', get_template_directory_uri() );


/*--------------------------------------------------------------
# Enqueue Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'blocland_fse_enqueue_styles' ) ) :

	function blocland_fse_enqueue_styles() {

		wp_register_style( 'blocland-fse-custom', BLOCLAND_FSE_URI . '/assets/css/blocland_fse.css', [], BLOCLAND_FSE_VERSION);
		wp_enqueue_style( 'blocland-fse-custom' );

	}

	add_action( 'wp_enqueue_scripts', 'blocland_fse_enqueue_styles' );

endif;

/*--------------------------------------------------------------
# Add TGMPA
--------------------------------------------------------------*/
require get_template_directory() . '/inc/tgmpa.php';