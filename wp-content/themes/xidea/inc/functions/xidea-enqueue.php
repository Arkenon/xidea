<?php

/*--------------------------------------------------------------
# Enqueue Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'xidea_enqueue_styles' ) ) :

	function xidea_enqueue_styles() {

		wp_register_style( 'style', XIDEA_URI . '/assets/css/style.css', [], XIDEA_VERSION );
		wp_register_style( 'bootstrap', XIDEA_URI . '/assets/css/bootstrap.min.css', [], XIDEA_VERSION );
		wp_register_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css', [], XIDEA_VERSION );

		wp_enqueue_style( 'style' );
		wp_enqueue_style( 'bootstrap' );
		wp_enqueue_style( 'bootstrap-icons' );

		wp_register_script( 'bootstrap-bundle', XIDEA_URI . '/assets/js/bootstrap.bundle.min.js', [ 'jquery' ], XIDEA_VERSION, true );
		wp_register_script( 'custom', XIDEA_URI . '/assets/js/custom.js', [ 'jquery' ], XIDEA_VERSION, true );

		wp_enqueue_script( 'bootstrap-bundle' );
		wp_enqueue_script( 'custom' );

	}

	add_action( 'wp_enqueue_scripts', 'xidea_enqueue_styles' );

endif;

/*--------------------------------------------------------------
# Enqueue Editor Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'xidea_editor_styles' ) ) :

	function xidea_editor_styles() {
		$request_uri     = stristr( $_SERVER['REQUEST_URI'], 'site-editor.php' );
		if ( false !== $request_uri ) {
			add_editor_style( array( './assets/css/style.css' ) );
			add_editor_style( array( './assets/css/bootstrap.min.css' ) );;
		}
	}

	add_action( 'init', 'xidea_editor_styles' );
	add_action( 'pre_get_posts', 'xidea_editor_styles' );

endif;




