<?php

use FLWGB\Helper;
use FLWGB\I18n;

//Login Form
if ( is_user_logged_in() ) {

	$view = Helper::view( 'public/partials/login/already-logged-in.php' );

} else {

	$view = Helper::view( 'public/partials/login/login-fail.php' );
	$view .= '<div class="border p-2 bg-white">
        <form name="loginform" id="loginform" action="' . wp_login_url( home_url() ) . '" method="post">
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="log" id="user_login"
                               placeholder="' . esc_attr_x( I18n::$email_input_text, "User e-mail input text", FLWGB_PLUGIN_NAME ) . '" required>
                        <div class="invalid-feedback">
							' . esc_html_x( I18n::$email_input_text, 'User e-mail input text', FLWGB_PLUGIN_NAME ) . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input class="form-control" type="password" name="pwd" id="user_pass"
                               placeholder="' . esc_attr_x( I18n::$password_input_text, "User password input text", FLWGB_PLUGIN_NAME ) . '"
                               required>
                        <div class="invalid-feedback">
							' . esc_html_x( I18n::$password_input_text, 'User password input text', FLWGB_PLUGIN_NAME ) . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="form-check">
                        <input id="keepme" name="rememberme" checked="checked" type="checkbox" class="form-check-input">
                        <label class="form-check-label" for="keepme">' . esc_html_x( I18n::$remember_me_checkbox_text, 'Remember me checkbox text', FLWGB_PLUGIN_NAME ) . '</label>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="wp-submit" id="wp-submit"
                        class="btn btn-dark btn-block">' . esc_html_x( I18n::$login_button_text, 'Login button text', FLWGB_PLUGIN_NAME ) . '</button>
				' . do_action( 'wp_login' ) . '
            </div>
            <div class="mt-2 text-center">
            <a href="' . site_url( get_option( 'flwgb_register_page' ) ) . '">' . esc_html_x( I18n::$register_button_text, 'Register button text', FLWGB_PLUGIN_NAME ) . ' | </a>
            <a href="' . site_url( get_option( 'flwgb_lost_password_page' ) ) . '">' . esc_html_x( I18n::$reset_password_button_text, 'Reset password button text', FLWGB_PLUGIN_NAME ) . '</a>
            </div>
        </form>
    </div>';

}
