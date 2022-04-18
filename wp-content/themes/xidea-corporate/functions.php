<?php
/**
 * Theme functions and definitions.
 * @author     Xidea
 * @copyright  (c) Copyright by Xidea Themes
 * @link       https://xideathemes.com
 * @package     Xidea Blocks
 * @since         1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}


/*--------------------------------------------------------------
# Enqueue Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'xidea_blocks_enqueue_styles' ) ) :

	function xidea_blocks_corporate_enqueue_styles() {

		wp_add_inline_style( 'xidea-blocks-style', xidea_blocks_corporate_get_custom_fonts() );

	}

	add_action( 'wp_enqueue_scripts', 'xidea_blocks_corporate_enqueue_styles' );

endif;

/*--------------------------------------------------------------
# Enqueue Editor Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'xidea_blocks_corporate_editor_styles' ) ) :

	function xidea_blocks_corporate_editor_styles() {

		wp_add_inline_style( 'wp-block-library', xidea_blocks_corporate_get_custom_fonts() );

	}

	add_action( 'init', 'xidea_blocks_corporate_editor_styles' );
	add_action( 'pre_get_posts', 'xidea_blocks_corporate_editor_styles' );

endif;


/*--------------------------------------------------------------
# Custom Fonts
--------------------------------------------------------------*/
if ( ! function_exists( 'xidea_blocks_corporate_get_custom_fonts' ) ) :
	/**
	 * Get font face styles.
	 *
	 * @return string
	 */
	function xidea_blocks_corporate_get_custom_fonts() {
		return "
		@font-face{
			font-family: 'Poppins', sans-serif';
			font-weight: 400;
			font-style: normal;
			font-stretch: normal;
			src: url('" . get_theme_file_uri( 'assets/fonts/Poppins-Regular.ttf' ) . "') format('ttf');
		}
		";
	}
endif;

