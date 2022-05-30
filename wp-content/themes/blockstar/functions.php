<?php
/**
 * Theme functions and definitions.
 * @author     xideathemes
 * @copyright  (c) Copyright by Xidea Themes
 * @link       https://xideathemes.com
 * @package     Societas Block Theme
 * @since         1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

// Definitions
define( 'BUSINESS_X_VERSION', '1.0.0' );
define( 'BUSINESS_X_DIR', get_template_directory() );
define( 'BUSINESS_X_URI', get_template_directory_uri() );

/*--------------------------------------------------------------
# Theme Supports
--------------------------------------------------------------*/
if ( ! function_exists( 'societas_setup' ) ) :
	function societas_setup() {
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );

		register_nav_menus(
			array(
				'societas-primary-menu'   => esc_html__( 'Societas Primary Menu', 'societas' ),
				'societas-footer-menu'    => esc_html__( 'Societas Footer Menu', 'societas' ),
				'societas-top-left-menu'  => esc_html__( 'Societas Top Left Menu', 'societas' ),
				'societas-top-right-menu' => esc_html__( 'Societas Top Right Menu', 'societas' ),
				'societas-mobile-menu-1'  => esc_html__( 'Societas Mobile Menu 1', 'societas' ),
				'societas-mobile-menu-2'  => esc_html__( 'Societas Mobile Menu 2', 'societas' ),
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
		load_theme_textdomain( 'societas', get_template_directory() . '/languages' );
	}

	add_action( 'after_setup_theme', 'societas_setup' );
endif;

/*--------------------------------------------------------------
# Enqueue Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'societas_enqueue_styles' ) ) :

	function societas_enqueue_styles() {

		wp_register_style( 'societas-style', BUSINESS_X_URI . '/assets/css/style.css', [], BUSINESS_X_VERSION );
		wp_register_style( 'bootstrap', BUSINESS_X_URI . '/assets/css/bootstrap.min.css', [], BUSINESS_X_VERSION );
		wp_register_style( 'animate', BUSINESS_X_URI . '/assets/css/animate.min.css', [], BUSINESS_X_VERSION );
		wp_add_inline_style( 'societas-style', societas_get_custom_fonts() );

		wp_enqueue_style( 'societas-style' );
		wp_enqueue_style( 'bootstrap' );
		wp_enqueue_style( 'animate' );

		wp_register_script( 'bootstrap-bundle', BUSINESS_X_URI . '/assets/js/bootstrap.bundle.min.js', [ 'jquery' ], BUSINESS_X_VERSION, true );
		wp_register_script( 'wow', BUSINESS_X_URI . '/assets/js/wow.min.js', [ 'jquery' ], BUSINESS_X_VERSION, true );
		wp_register_script( 'societas-custom', BUSINESS_X_URI . '/assets/js/custom.js', [ 'jquery' ], BUSINESS_X_VERSION, true );


		wp_enqueue_script( 'bootstrap-bundle' );
		wp_enqueue_script( 'wow' );
		wp_enqueue_script( 'societas-custom' );

	}

	add_action( 'wp_enqueue_scripts', 'societas_enqueue_styles' );

endif;

/*--------------------------------------------------------------
# Enqueue Editor Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'societas_editor_styles' ) ) :

	function societas_editor_styles() {
		wp_add_inline_style( 'wp-block-library', societas_get_custom_fonts() );
		add_editor_style( array( './assets/css/style.css' ) );
		add_editor_style( array( './assets/css/bootstrap.min.css' ) );
		add_editor_style( array( './assets/css/animate.min.css' ) );
	}

	add_action( 'init', 'societas_editor_styles' );
	add_action( 'pre_get_posts', 'societas_editor_styles' );

endif;

/*--------------------------------------------------------------
# Custom Fonts
--------------------------------------------------------------*/
if ( ! function_exists( 'societas_get_custom_fonts' ) ) :
	/**
	 * Get font face styles.
	 *
	 * @return string
	 */
	function societas_get_custom_fonts() {
		return "
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
		";
	}
endif;

// Add Post Types
require get_template_directory() . '/inc/post-types.php';

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

// Add TGMPA
require get_template_directory() . '/inc/tgmpa.php';


// Add One Click Demo Import
require get_template_directory() . '/inc/demo-import.php';