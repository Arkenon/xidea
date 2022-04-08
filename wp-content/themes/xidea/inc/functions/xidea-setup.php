<?php
/*--------------------------------------------------------------
# Theme Supports
--------------------------------------------------------------*/
if ( ! function_exists( 'xidea_setup' ) ) :
	function xidea_setup() {
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'html5', array( 'comment-form', 'comment-list' ) );
		//Translations
		load_theme_textdomain( 'xidea', get_template_directory() . '/languages' );
	}

	add_action( 'after_setup_theme', 'xidea_setup' );
endif;
