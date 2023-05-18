<?php

use FLWGB\I18n;

$message = "";

$login_fail_message = get_option( 'flwgb_login_fail_message' );

if ( get( 'login' ) == 'error' ) {

	$message = '<div class="text-center"><p class="alert alert-danger">';
	$message .= $login_fail_message ?: esc_html_x( I18n::$login_fail_message, 'Login fail message', FLWGB_PLUGIN_NAME );
	$message .= '</p></div>';

}

return $message;
