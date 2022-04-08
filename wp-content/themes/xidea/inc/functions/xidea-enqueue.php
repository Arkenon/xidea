<?php

/*--------------------------------------------------------------
# Enqueue Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'xidea_enqueue_styles' ) ) :

	function xidea_enqueue_styles() {
		wp_register_style( 'themify-icons', XIDEA_URI . '/assets/css/themify-icons.css', [], XIDEA_VERSION );
		wp_register_style( 'font-awesome', XIDEA_URI . '/assets/css/font-awesome.min.css', [], XIDEA_VERSION );
		wp_register_style( 'flaticon', XIDEA_URI . '/assets/css/flaticon.css', [], XIDEA_VERSION );
		wp_register_style( 'style', XIDEA_URI . '/assets/css/style.css', [], XIDEA_VERSION );
		wp_register_style( 'xidea-blocks', XIDEA_URI . '/assets/css/blocks.css', ['style'], XIDEA_VERSION );
		wp_register_style( 'bootstrap', XIDEA_URI . '/assets/css/bootstrap.min.css', [], XIDEA_VERSION );

		wp_enqueue_style( 'themify-icons' );
		wp_enqueue_style( 'font-awesome.' );
		wp_enqueue_style( 'flaticon' );
		wp_enqueue_style( 'style' );
		wp_enqueue_style( 'xidea-blocks' );
		wp_enqueue_style( 'bootstrap' );

		wp_register_script('bootstrap-bundle',XIDEA_URI . '/assets/js/bootstrap.bundle.min.js',['jquery'],XIDEA_VERSION,true);
		wp_register_script('jquery-ui',XIDEA_URI . '/assets/js/jquery-ui.min.js',['jquery'],XIDEA_VERSION,true);
		wp_register_script('jquery-plugins',XIDEA_URI . '/assets/js/jquery-plugin-collection.js',['jquery'],XIDEA_VERSION,true);
		wp_register_script('custom',XIDEA_URI . '/assets/js/script.js',['jquery'],XIDEA_VERSION,true);
		wp_register_script('modernizr',XIDEA_URI . '/assets/js/modernizr.custom.js',['jquery'],XIDEA_VERSION,true);

		wp_enqueue_script('bootstrap-bundle');
		wp_enqueue_script('jquery-ui');
		wp_enqueue_script('jquery-plugins');
		wp_enqueue_script('custom');
		wp_enqueue_script('modernizr');
	}

	add_action( 'wp_enqueue_scripts', 'xidea_enqueue_styles' );

endif;

/*--------------------------------------------------------------
# Enqueue Editor Styles
--------------------------------------------------------------*/
if ( ! function_exists( 'xidea_editor_styles' ) ) :

	function xidea_editor_styles() {
		add_editor_style( array( './assets/css/blocks.css' ) );
		add_editor_style( array( './assets/css/style.css' ) );
		add_editor_style( array( './assets/css/bootstrap.min.css' ) );
	}

	add_action( 'admin_init', 'xidea_editor_styles' );

endif;


