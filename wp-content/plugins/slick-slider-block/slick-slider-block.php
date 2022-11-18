<?php
/**
 * Plugin Name:       Slick Slider Block
 * Description:       Slick Slider Block Plugin uses Slick Slider to create sliders from core blocks.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           1.0.0
 * Author:            xideathemes
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       slick-slider-block
 *
 * @package           Slick Slider Block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*--------------------------------------------------------------
# CONSTANTS
--------------------------------------------------------------*/
define( 'SLICK_SLIDER_BLOCK_URL', plugin_dir_url( __FILE__ ) );
define( 'SLICK_SLIDER_BLOCK_VERSION', '1.0.0' );

/*--------------------------------------------------------------
# Enqueue Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'slick_slider_block_enque_styles_and_scripts' ) ) :

	function slick_slider_block_enque_styles_and_scripts() {
		wp_register_style( 'slick', SLICK_SLIDER_BLOCK_URL . '/assets/slick/slick/slick.css', [],SLICK_SLIDER_BLOCK_VERSION );
		wp_register_style( 'slick-theme', SLICK_SLIDER_BLOCK_URL . '/assets/slick/slick/slick-theme.css', [],SLICK_SLIDER_BLOCK_VERSION );
		wp_register_style( 'custom-css', SLICK_SLIDER_BLOCK_URL . '/assets/css/custom.css', [],SLICK_SLIDER_BLOCK_VERSION );

		wp_enqueue_style( 'custom-css' );
		wp_enqueue_style( 'slick' );
		wp_enqueue_style( 'slick-theme' );

		wp_register_script( 'slick-js', SLICK_SLIDER_BLOCK_URL . '/assets/slick/slick/slick.min.js', [ 'jquery' ], SLICK_SLIDER_BLOCK_VERSION, false );
		wp_register_script( 'custom-js', SLICK_SLIDER_BLOCK_URL . '/assets/js/custom.js', [ 'jquery', 'slick-js' ], SLICK_SLIDER_BLOCK_VERSION, true );
		wp_enqueue_script( 'slick-js' );
		wp_enqueue_script( 'custom-js' );
	}

	add_action( 'wp_enqueue_scripts', 'slick_slider_block_enque_styles_and_scripts' );

endif;

/*--------------------------------------------------------------
# Enqueue Editor Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'slick_slider_block_editor_styles' ) ) :

	function slick_slider_block_editor_styles() {
		add_editor_style(
			array(
				SLICK_SLIDER_BLOCK_URL . '/assets/slick/slick/slick.css',
				SLICK_SLIDER_BLOCK_URL . '/assets/slick/slick/slick-theme.css',
				SLICK_SLIDER_BLOCK_URL . '/assets/css/custom.css'
			)
		);
	}

	add_action( 'init', 'slick_slider_block_editor_styles' );
	add_action( 'pre_get_posts', 'slick_slider_block_editor_styles' );

endif;


/*--------------------------------------------------------------
# Enqueue Editor Scripts
--------------------------------------------------------------*/
if ( ! function_exists( 'slick_slider_block_editor_scripts' ) ) :
	function slick_slider_block_editor_scripts() {

		wp_register_script( 'slick-js', SLICK_SLIDER_BLOCK_URL . '/assets/slick/slick/slick.min.js', [ 'jquery' ], SLICK_SLIDER_BLOCK_VERSION, false );
		wp_register_script( 'custom-js', SLICK_SLIDER_BLOCK_URL . '/assets/js/core.js', [ 'jquery', 'slick-js' ], SLICK_SLIDER_BLOCK_VERSION, true );

		wp_enqueue_script( 'slick-js' );
		wp_enqueue_script( 'custom-js' );

	}

	add_action( 'enqueue_block_editor_assets', 'slick_slider_block_editor_scripts' );
endif;

/*--------------------------------------------------------------
# Register Blocks
--------------------------------------------------------------*/
if ( ! function_exists( 'slick_slider_block_init' ) ) :

	function slick_slider_block_init() {
		register_block_type( __DIR__ . '/build/slick-slider' );
		register_block_type( __DIR__ . '/build/slick-slider-item' );
	}

	add_action( 'init', 'slick_slider_block_init' );

endif;
