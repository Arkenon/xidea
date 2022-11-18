<?php
/**
 * Plugin Name:       Marenda
 * Description:       Example static block scaffolded with Create Block tool.
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       marenda
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

/*--------------------------------------------------------------
# CONSTANTS
--------------------------------------------------------------*/
define( 'CORE_URL', plugin_dir_url( __FILE__ ) );

/*--------------------------------------------------------------
# Enqueue Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'marenda_enque_styles_and_scripts' ) ) :

	function marenda_enque_styles_and_scripts() {
		wp_register_style( 'slick', CORE_URL . '/assets/slick/slick/slick.css', [] );
		wp_register_style( 'slick-theme', CORE_URL . '/assets/slick/slick/slick-theme.css', [] );
		wp_register_style( 'core-css', CORE_URL . '/assets/css/custom.css', [] );

		wp_enqueue_style( 'core-css' );
		wp_enqueue_style( 'slick' );
		wp_enqueue_style( 'slick-theme' );

		wp_register_script( 'slick-js', CORE_URL . '/assets/slick/slick/slick.min.js', [ 'jquery' ], "", false );
		wp_register_script( 'core-js', CORE_URL . '/assets/js/core.js', [ 'jquery', 'slick-js' ], "", true );
		wp_enqueue_script( 'slick-js' );
		wp_enqueue_script( 'core-js' );
	}

	add_action( 'wp_enqueue_scripts', 'marenda_enque_styles_and_scripts' );

endif;

/*--------------------------------------------------------------
# Enqueue Editor Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'marenda_editor_styles' ) ) :

	function marenda_editor_styles() {
		add_editor_style( array( CORE_URL . '/assets/slick/slick/slick.css' ) );
		add_editor_style( array( CORE_URL . '/assets/slick/slick/slick-theme.css' ) );
		add_editor_style( array( CORE_URL . '/assets/css/custom.css' ) );
	}

endif;

add_action( 'init', 'marenda_editor_styles' );
add_action( 'pre_get_posts', 'marenda_editor_styles' );

/*--------------------------------------------------------------
# Enqueue Editor Scripts
--------------------------------------------------------------*/
if ( ! function_exists( 'marenda_editor_scripts' ) ) :
	function marenda_editor_scripts() {

//		wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.6.1.min.js' );

		wp_register_script( 'slick-js', CORE_URL . '/assets/slick/slick/slick.min.js', [ 'jquery' ], "", false );
		wp_register_script( 'core-js', CORE_URL . '/assets/js/core.js', [ 'jquery', 'slick-js' ], "", true );

		wp_enqueue_script( 'slick-js' );
		wp_enqueue_script( 'marenda-core-js' );

	}

	add_action( 'enqueue_block_editor_assets', 'marenda_editor_scripts' );
endif;

/*--------------------------------------------------------------
# Register Blocks
--------------------------------------------------------------*/
if ( ! function_exists( 'marenda_block_init' ) ) :
	function marenda_block_init() {
		register_block_type( __DIR__ . '/build/slick-slider',
			[
				'render_callback' => 'marenda_slick_slider_render_callback'
			]
		);
	}

	add_action( 'init', 'marenda_block_init' );
endif;


/*--------------------------------------------------------------
# Register Blocks Callback Functions
--------------------------------------------------------------*/
if ( ! function_exists( 'marenda_slick_slider_render_callback' ) ) :
	function marenda_slick_slider_render_callback( $attributes, $content ) {

		$html = '<div id="' . $attributes['sliderId'] . '">
					' . $content . '
			</div>
			<script type="text/javascript">
				(function ($) {
					$("#' . $attributes['sliderId'] . '").find(".wp-block-columns").addClass("' . $attributes['sliderId'] . '")
					$(".' . $attributes['sliderId'] . '").slick({
						dots          : false,
						infinite       : true,
						speed         : 500,
						autoplay      : true,
						slidesToShow   : ' . $attributes['slidesToShow'] . ',
						slidesToScroll : ' . $attributes['slidesToScroll'] . ',
						responsive: [
								    {
								      breakpoint: 1920,
								      settings: {
								        slidesToShow: ' . $attributes['slidesToShow'] . ',
								        slidesToScroll: ' . $attributes['slidesToScroll'] . ',
								      }
								    },
								    {
								      breakpoint: 600,
								      settings: {
								        slidesToShow: 2,
								        slidesToScroll: 2
								      }
								    },
								    {
								      breakpoint: 480,
								      settings: {
								        slidesToShow: 1,
								        slidesToScroll: 1
								      }
								    }
								  ]
					})
				})(window.jQuery);
			</script>';

		return $html;
	}
endif;
