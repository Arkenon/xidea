<?php

use FLWGB\I18n;

//Define variable for already logged in alert message
$logged_in_alert = "";

//Include already logged in alert message
using( 'public/partials/login/already-logged-in.php' );

//Define variable for login fail message
$login_fail_message = "";

//Include login fail message
using( 'public/partials/login/login-fail.php' );

//Login Form
if ( is_user_logged_in() ) {

	$form = $logged_in_alert;

} else {

	$form = $login_fail_message;
	$form .= '<div class="border p-2 bg-white">
        <form name="loginform" id="loginform" action="' . wp_login_url( home_url() ) . '" method="post">
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="log" id="user_login"
                               placeholder="' . I18n::$email_input_text . '" required>
                        <div class="invalid-feedback">
							' . I18n::$email_input_text . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input class="form-control" type="password" name="pwd" id="user_pass"
                               placeholder="' . I18n::$password_input_text . '"
                               required>
                        <div class="invalid-feedback">
							' . I18n::$password_input_text . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="form-check">
                        <input id="keepme" name="rememberme" checked="checked" type="checkbox" class="form-check-input">
                        <label class="form-check-label" for="keepme">' . I18n::$remember_me_checkbox_text . '</label>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="wp-submit" id="wp-submit"
                        class="btn btn-dark btn-block">' . I18n::$login_button_text . '</button>
				' . do_action( 'wp_login' ) . '
            </div>
            <div class="mt-2 text-center">
            <a href="' . site_url( get_option( 'flwgb_register_page' ) ) . '">' . I18n::$login_button_text . ' | </a>
            <a href="' . site_url( get_option( 'flwgb_lost_password_page' ) ) . '">' . I18n::$reset_password_button_text . '</a>
            </div>
        </form>
    </div>';

}

return $form;
