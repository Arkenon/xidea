<?php

use FLWGB\I18n;

if ( get('reset') == 'in-progress' ) {

	$code  = get('key');
	$user  = get('user');

	$code2 = get_user_meta( $user, 'flwgb_lost_password_key', true );

	if ( $code === $code2 ) {

		$view = view('public/partials/reset-password/reset-in-progress.php');

	} else {

		$view = '<p class="alert alert-danger">
					<strong class="font-s-14">'.esc_html_x(I18n::$wrong_reset_password_link,'Wrong reset password link',FLWGB_PLUGIN_NAME).'</strong>
				 </p>';

	}

} else {

	$view = view('public/partials/reset-password/reset-request.php');

}
