<?php
/**
 * Theme functions and definitions.
 * @author     xideathemes
 * @copyright  (c) Copyright by Xidea Themes
 * @link       https://xideathemes.com
 * @package     Shana Lite
 * @since         1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

// Definitions
define( 'SHANA_LITE_VERSION', '1.0.0' );
define( 'SHANA_LITE_DIR', get_template_directory() );
define( 'SHANA_LITE_URI', get_template_directory_uri() );

/*--------------------------------------------------------------
# Theme Supports
--------------------------------------------------------------*/
if ( ! function_exists( 'shana_lite_setup' ) ) :
	function shana_lite_setup() {
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );

		register_nav_menus(
			array(
				'shana-lite-primary-menu'   => esc_html__( 'Shana Lite Primary Menu', 'shana_lite' ),
				'shana-lite-footer-menu'    => esc_html__( 'Shana Lite Footer Menu', 'shana_lite' ),
				'shana-lite-top-left-menu'  => esc_html__( 'Shana Lite Top Left Menu', 'shana_lite' ),
				'shana-lite-top-right-menu' => esc_html__( 'Shana Lite Top Right Menu', 'shana_lite' ),
				'shana-lite-mobile-menu-1'  => esc_html__( 'Shana Lite Mobile Menu 1', 'shana_lite' ),
				'shana-lite-mobile-menu-2'  => esc_html__( 'Shana Lite Mobile Menu 2', 'shana_lite' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		//Translations
		load_theme_textdomain( 'shana_lite', get_template_directory() . '/languages' );
	}

endif;

add_action( 'after_setup_theme', 'shana_lite_setup' );

/*--------------------------------------------------------------
# Enqueue Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'shana_lite_enqueue_styles' ) ) :

	function shana_lite_enqueue_styles() {

		wp_register_style( 'shana-lite-style', SHANA_LITE_URI . '/assets/css/shana-lite.css', [], SHANA_LITE_VERSION );
		wp_add_inline_style( 'shana-lite-style', shana_lite_get_custom_fonts() );
		wp_enqueue_style( 'shana-lite-style' );

		wp_register_script( 'shana-lite-custom', SHANA_LITE_URI . '/assets/js/shana-lite.js', [ 'jquery' ], SHANA_LITE_VERSION, true );
		wp_enqueue_script( 'shana-lite-custom' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'shana_lite_enqueue_styles' );

/*--------------------------------------------------------------
# Enqueue Editor Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'shana_lite_editor_styles' ) ) :

	function shana_lite_editor_styles() {
		wp_add_inline_style( 'wp-block-library', shana_lite_get_custom_fonts() );
		add_editor_style( array( './assets/css/shana-lite.css' ) );
	}

endif;

add_action( 'init', 'shana_lite_editor_styles' );


/*--------------------------------------------------------------
# Custom Fonts
--------------------------------------------------------------*/
if ( ! function_exists( 'shana_lite_get_custom_fonts' ) ) :
	/**
	 * Get font face styles.
	 *
	 * @return string
	 */
	function shana_lite_get_custom_fonts() {
		return "
		@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;700&display=swap');
		@import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
		";
	}
endif;

// Add TGMPA
//require get_template_directory() . '/inc/tgmpa.php';

// Add One Click Demo Import
//require get_template_directory() . '/inc/demo-import.php';