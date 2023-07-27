<?php

use FLWGB\Helper;
use FLWGB\I18n\I18n;
use FLWGB\UserActivation;

Helper::using('inc/UserActivation.php');

$activation = new UserActivation();

$activation_code = Helper::get( 'key' );
$user_id         = Helper::get( 'user' );

if(!empty($activation_code)){

	$activation_result = $activation->activate_user( $activation_code, $user_id );
	$color = $activation_result['status'] ? "green" : "red";

} else {

	$activation_result = array(
		'status' => false,
		'message' => esc_html_x( I18n::text( 'wrong_activation_code' )->text, I18n::text( 'wrong_activation_code' )->context, FLWGB_TEXT_DOMAIN )
	);
	$color = $activation_result['status'] ? "green" : "red";

}



$view = '<div style="text-align: center">';
$view .= '<p style="color:' . $color . '">' . $activation_result['message'] . '</p>';
$view .= '</div>';
