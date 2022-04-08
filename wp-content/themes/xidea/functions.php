<?php
/**
 * Theme functions and definitions.
 * @author     Xidea
 * @copyright  (c) Copyright by Xidea Themes
 * @link       https://xideathemes.com
 * @package     Xidea Block Theme
 * @since         1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

// Definitions
define( 'XIDEA_VERSION', '1.0.0' );
define( 'XIDEA_DIR', get_template_directory() );
define( 'XIDEA_URI', get_template_directory_uri() );

//Includes
require "inc/functions/xidea-enqueue.php";
require "inc/functions/xidea-setup.php";


