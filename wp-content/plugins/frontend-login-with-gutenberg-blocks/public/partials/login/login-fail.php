<?php

use FLWGB\Helper;
use FLWGB\I18n;

$view = "";

$get_login_fail_message = get_option( 'flwgb_login_fail_message' );

if ( Helper::get( 'login' ) == 'error' ) {

	$view = '<div class="text-center"><p class="alert alert-danger">';
	$view .= $get_login_fail_message ?: esc_html_x( I18n::$login_fail_message, 'Login fail message', FLWGB_PLUGIN_NAME );
	$view .= '</p></div>';

}
