<?php
/**
 * Theme functions and definitions.
 * @author     techatami
 * @copyright  (c) Copyright by Techatami
 * @link       https://techatami.com/
 * @package     Iscope
 * @since         1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

// Definitions
define( 'ISCOPE_VERSION', '1.0.0' );
define( 'ISCOPE_DIR', get_template_directory() );
define( 'ISCOPE_URI', get_template_directory_uri() );

/*--------------------------------------------------------------
# Theme Supports
--------------------------------------------------------------*/
if ( ! function_exists( 'iscope_setup' ) ) :
	function iscope_setup() {
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );

		register_nav_menus(
			array(
				'iscope-primary-menu'   => esc_html__( 'Iscope Primary Menu', 'iscope' ),
				'iscope-footer-menu'    => esc_html__( 'Iscope Footer Menu', 'iscope' ),
				'iscope-top-left-menu'  => esc_html__( 'Iscope Top Left Menu', 'iscope' ),
				'iscope-top-right-menu' => esc_html__( 'Iscope Top Right Menu', 'iscope' ),
				'iscope-mobile-menu-1'  => esc_html__( 'Iscope Mobile Menu 1', 'iscope' ),
				'iscope-mobile-menu-2'  => esc_html__( 'Iscope Mobile Menu 2', 'iscope' ),
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
		load_theme_textdomain( 'iscope', get_template_directory() . '/languages' );
	}

endif;

add_action( 'after_setup_theme', 'iscope_setup' );

/*--------------------------------------------------------------
# Enqueue Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'iscope_enqueue_styles' ) ) :

	function iscope_enqueue_styles() {

		wp_register_style( 'iscope-style', ISCOPE_URI . '/assets/css/style.css', [], ISCOPE_VERSION );
		wp_add_inline_style( 'iscope-style', iscope_get_custom_fonts() );
		wp_enqueue_style( 'iscope-style' );

		wp_register_script( 'iscope-custom', ISCOPE_URI . '/assets/js/iscope.js', [ 'jquery' ], ISCOPE_VERSION, true );
		wp_enqueue_script( 'iscope-custom' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'iscope_enqueue_styles' );

/*--------------------------------------------------------------
# Enqueue Editor Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'iscope_editor_styles' ) ) :

	function iscope_editor_styles() {
		wp_add_inline_style( 'wp-block-library', iscope_get_custom_fonts() );
		add_editor_style( array( './assets/css/style.css' ) );
		add_editor_style( array( './assets/css/bootstrap.min.css' ) );
		add_editor_style( array( './assets/css/animate.min.css' ) );
	}

endif;

add_action( 'init', 'iscope_editor_styles' );


/*--------------------------------------------------------------
# Custom Fonts
--------------------------------------------------------------*/
if ( ! function_exists( 'iscope_get_custom_fonts' ) ) :
	/**
	 * Get font face styles.
	 *
	 * @return string
	 */
	function iscope_get_custom_fonts() {
		return "
		@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
		@import url('https://fonts.googleapis.com/css2?family=Tiro+Gurmukhi:ital@0;1&display=swap');
		";
	}
endif;

// Add TGMPA
//require get_template_directory() . '/inc/tgmpa.php';

// Add One Click Demo Import
//require get_template_directory() . '/inc/demo-import.php';