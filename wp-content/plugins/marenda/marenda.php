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
if ( ! function_exists( 'marenda_enque_styles' ) ) :

	function marenda_enque_styles() {
		wp_register_style( 'slick', CORE_URL . '/assets/css/slick.min.css', [] );
		wp_register_style( 'slick-theme', CORE_URL . '/assets/css/slick-theme.min.css', [] );
		wp_register_style( 'marenda', CORE_URL . '/assets/css/marenda.css', [] );

		wp_enqueue_style( 'marenda' );
		wp_enqueue_style( 'slick' );
		wp_enqueue_style( 'slick-theme' );

		wp_register_script( 'slick-js', CORE_URL . '/assets/js/slick.min.js', [ 'jquery' ], "", false );
		wp_register_script( 'core-js', CORE_URL . '/assets/js/core.js', [ 'jquery', 'slick-js' ], "", false );
		wp_enqueue_script( 'slick-js' );
		wp_enqueue_script( 'core-js' );
	}

	add_action( 'wp_enqueue_scripts', 'marenda_enque_styles' );

endif;

/*--------------------------------------------------------------
# Enqueue Editor Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'marenda_editor_styles' ) ) :

	function marenda_editor_styles() {
		add_editor_style( array( CORE_URL . '/assets/css/slick.min.css' ) );
		add_editor_style( array( CORE_URL . '/assets/css/slick-theme.min.css' ) );
	}

endif;

add_action( 'init', 'marenda_editor_styles' );

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


function marenda_slick_slider_render_callback( $attributes, $content ) {
	$options  = [
		"dots"           => true,
		"infinite"       => true,
		"speed"          => 500,
		"autoplay"       => true,
		"slidesToShow"   => 3,
		"slidesToScroll" => 1
	];
	$sliderId = $attributes['sliderId'];
	$html     = '<div id="' . $sliderId . '">
					' . $content . '
			</div>
			<script type="text/javascript">
				(function ($) {
					$("#' . $sliderId . '").find(".wp-block-columns").addClass("' . $sliderId . '")
					$(".' . $sliderId . '").slick({
						dots: ' . $options["dots"] . ',
						arrows: true,
						infinite: ' . $options["infinite"] . ',
						speed: ' . $options["speed"] . ',
						slidesToShow: ' . $options["slidesToShow"] . ',
						autoplay: ' . $options["autoplay"] . ',
						slidesToScroll: ' . $options["slidesToScroll"] . ',
						responsive: [
								    {
								      breakpoint: 1920,
								      settings: {
								        slidesToShow: 3,
								        slidesToScroll: 3,
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
