<?php
/**
 * Theme functions and definitions.
 * @author     BlockStar
 * @copyright  (c) Copyright by Xidea Themes
 * @link       https://xideathemes.com
 * @package    BlockStar Theme
 * @since         1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

// Definitions
define( 'BLOCKSTAR_VERSION', '1.0.0' );
define( 'BLOCKSTAR_DIR', get_template_directory() );
define( 'BLOCKSTAR_URI', get_template_directory_uri() );

/*--------------------------------------------------------------
# Theme Supports
--------------------------------------------------------------*/
if ( ! function_exists( 'blockstar_setup' ) ) :
	function blockstar_setup() {
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );

		register_nav_menus(
			array(
				'blockstar-primary-menu' => esc_html__( 'Primary', 'blockstar' ),
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
		load_theme_textdomain( 'blockstar', get_template_directory() . '/languages' );
	}

	add_action( 'after_setup_theme', 'blockstar_setup' );
endif;

/*--------------------------------------------------------------
# Enqueue Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'blockstar_enqueue_styles' ) ) :

	function blockstar_enqueue_styles() {

		wp_register_style( 'blockstar-style', BLOCKSTAR_URI . '/assets/css/style.css', [], BLOCKSTAR_VERSION );
		wp_register_style( 'bootstrap', BLOCKSTAR_URI . '/assets/css/bootstrap.min.css', [], BLOCKSTAR_VERSION );
		wp_add_inline_style( 'blockstar-style', blockstar_get_custom_fonts() );

		wp_enqueue_style( 'blockstar-style' );
		wp_enqueue_style( 'bootstrap' );

		wp_register_script( 'bootstrap-bundle', BLOCKSTAR_URI . '/assets/js/bootstrap.bundle.min.js', [ 'jquery' ], BLOCKSTAR_VERSION, true );
		wp_register_script( 'blockstar-custom', BLOCKSTAR_URI . '/assets/js/custom.js', [ 'jquery' ], BLOCKSTAR_VERSION, true );

		wp_enqueue_script( 'bootstrap-bundle' );
		wp_enqueue_script( 'blockstar-custom' );

	}

	add_action( 'wp_enqueue_scripts', 'blockstar_enqueue_styles' );

endif;

/*--------------------------------------------------------------
# Enqueue Editor Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'blockstar_editor_styles' ) ) :

	function blockstar_editor_styles() {
		wp_add_inline_style( 'wp-block-library', blockstar_get_custom_fonts() );
		add_editor_style( array( './assets/css/style.css' ) );
		add_editor_style( array( './assets/css/bootstrap.min.css' ) );;
	}

	add_action( 'init', 'blockstar_editor_styles' );
	add_action( 'pre_get_posts', 'blockstar_editor_styles' );

endif;

/*--------------------------------------------------------------
# Custom Fonts
--------------------------------------------------------------*/
if ( ! function_exists( 'blockstar_get_custom_fonts' ) ) :
	/**
	 * Get font face styles.
	 *
	 * @return string
	 */
	function blockstar_get_custom_fonts() {
		return "
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
		";
	}
endif;

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
