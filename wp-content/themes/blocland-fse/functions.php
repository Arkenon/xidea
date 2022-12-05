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

if ( function_exists( 'register_block_style' ) ) {
	register_block_style(
		'core/group',
		array(
			'name'         => 'blocland-top-negative-margin-100',
			'label'        => __( '100:Top Negative Margin 100', 'blocland-fse' ),
			'is_default'   => false,
			'inline_style' => '.is-style-blocland-top-negative-margin-100 {position: relative!important; margin-top: -100px!important;z-index:1!important}',
		)
	);
	register_block_style(
		'core/group',
		array(
			'name'         => 'blocland-top-negative-margin-150',
			'label'        => __( '150:Top Negative Margin 150', 'blocland-fse' ),
			'is_default'   => false,
			'inline_style' => '.is-style-blocland-top-negative-margin-150 {position: relative!important; margin-top: -150px!important;z-index:1!important}',
		)
	);
	register_block_style(
		'core/group',
		array(
			'name'         => 'blocland-top-negative-margin-200',
			'label'        => __( '200:Top Negative Margin 200', 'blocland-fse' ),
			'is_default'   => false,
			'inline_style' => '.is-style-blocland-top-negative-margin-200 {position: relative!important; margin-top: -200px!important;z-index:1!important}',
		)
	);
	register_block_style(
		'core/group',
		array(
			'name'         => 'blocland-box-shadow',
			'label'        => __( 'Box Shadow', 'blocland-fse' ),
			'is_default'   => false,
			'inline_style' => '.is-style-blocland-box-shadow {box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;}',
		)
	);
};


/*--------------------------------------------------------------
# Add TGMPA
--------------------------------------------------------------*/
require get_template_directory() . '/inc/tgmpa.php';