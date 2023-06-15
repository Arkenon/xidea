<?php

use FLWGB\Helper;
use FLWGB\I18n\I18n;

if ( Helper::get('reset') == 'in-progress' ) {

	$code  = Helper::get('key');
	$user  = Helper::get('user');

	$code2 = get_user_meta( $user, 'flwgb_lost_password_key', true );

	if ( $code === $code2 ) {

		$view = Helper::return_view('public/partials/reset-password/reset-in-progress.php', $form_attributes);

	} else {

		$view = '<p class="alert alert-danger">
					<strong class="font-s-14">'.esc_html_x(I18n::$wrong_reset_password_link,'Wrong reset password link',FLWGB_TEXT_DOMAIN).'</strong>
				 </p>';

	}

} else {

	$view = Helper::return_view('public/partials/reset-password/reset-request.php', $form_attributes);

}
