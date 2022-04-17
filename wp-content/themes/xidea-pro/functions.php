<?php
/**
 * Theme functions and definitions.
 * @author     Xidea
 * @copyright  (c) Copyright by Xidea Themes
 * @link       https://xideathemes.com
 * @package     Xidea Pro
 * @since         1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

// Definitions
define( 'XIDEA_VERSION', '1.0.0' );
define( 'XIDEA_DIR', get_template_directory() );
define( 'XIDEA_URI', get_template_directory_uri() );

/*--------------------------------------------------------------
# Theme Supports
--------------------------------------------------------------*/
if ( ! function_exists( 'xidea_pro_setup' ) ) :
	function xidea_pro_setup() {
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );

		register_nav_menus(
			array(
				'xidea-pro-primary-menu' => esc_html__( 'Primary', 'xidea-pro' ),
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
		load_theme_textdomain( 'xidea-pro', get_template_directory() . '/languages' );
	}

	add_action( 'after_setup_theme', 'xidea_pro_setup' );
endif;

/*--------------------------------------------------------------
# Enqueue Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'xidea_pro_enqueue_styles' ) ) :

	function xidea_pro_enqueue_styles() {

		wp_register_style( 'xidea-pro-style', XIDEA_URI . '/assets/css/style.css', [], XIDEA_VERSION );
		wp_register_style( 'bootstrap', XIDEA_URI . '/assets/css/bootstrap.min.css', [], XIDEA_VERSION );
		wp_register_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css', [], XIDEA_VERSION );
		wp_add_inline_style( 'xidea-pro-style', xidea_pro_get_custom_fonts() );

		wp_enqueue_style( 'xidea-pro-style' );
		wp_enqueue_style( 'bootstrap' );
		wp_enqueue_style( 'bootstrap-icons' );

		wp_register_script( 'bootstrap-bundle', XIDEA_URI . '/assets/js/bootstrap.bundle.min.js', [ 'jquery' ], XIDEA_VERSION, true );
		wp_register_script( 'xidea-pro-custom', XIDEA_URI . '/assets/js/custom.js', [ 'jquery' ], XIDEA_VERSION, true );

		wp_enqueue_script( 'bootstrap-bundle' );
		wp_enqueue_script( 'xidea-pro-custom' );

	}

	add_action( 'wp_enqueue_scripts', 'xidea_pro_enqueue_styles' );

endif;

/*--------------------------------------------------------------
# Enqueue Editor Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'xidea_pro_editor_styles' ) ) :

	function xidea_pro_editor_styles() {
		wp_add_inline_style( 'wp-block-library', xidea_pro_get_custom_fonts() );
		add_editor_style( array( './assets/css/style.css' ) );
		add_editor_style( array( './assets/css/bootstrap.min.css' ) );;
		add_editor_style( array( 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' ) );;
	}

	add_action( 'init', 'xidea_pro_editor_styles' );
	add_action( 'pre_get_posts', 'xidea_pro_editor_styles' );

endif;

/*--------------------------------------------------------------
# Custom Fonts
--------------------------------------------------------------*/
if ( ! function_exists( 'xidea_pro_get_custom_fonts' ) ) :
	/**
	 * Get font face styles.
	 *
	 * @return string
	 */
	function xidea_pro_get_custom_fonts() {
		return "
		@font-face{
			font-family: 'Nunito Sans';
			font-weight: 700;
			font-style: normal;
			font-stretch: normal;
			src: url('" . get_theme_file_uri( 'assets/fonts/NunitoSans-Regular.ttf' ) . "') format('ttf');
		}
		";
	}
endif;

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
