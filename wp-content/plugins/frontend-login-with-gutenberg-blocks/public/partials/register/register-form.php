<?php

use FLWGB\I18n;

if ( isset( $_POST ) ) {

	//sl_registeration_control( $activate, $activation_url, $logo_url );

}

$view = '<div class="border p-2 bg-white">
		<div class="flwgb-register-result"></div>
        <form name="flwgb-register-form" id="flwgb-register-form" action="" method="post">
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="username" id="username"
                               placeholder="' . esc_attr_x( I18n::$user_input_text, 'Username input text', FLWGB_PLUGIN_NAME ) . '" required>
                        <div class="invalid-feedback">
							' . esc_html_x( I18n::$user_input_text, 'Username input text', FLWGB_PLUGIN_NAME ) . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="user_email" id="user_email"
                               placeholder="' . esc_attr_x( I18n::$email_input_text, 'User e-mail input text', FLWGB_PLUGIN_NAME ) . '" required>
                        <div class="invalid-feedback">
							' . esc_html_x( I18n::$email_input_text, 'User e-mail input text', FLWGB_PLUGIN_NAME ) . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input class="form-control" type="password" name="user_pass" id="user_pass"
                               placeholder="' . esc_attr_x( I18n::$password_input_text, 'User password input text', FLWGB_PLUGIN_NAME ) . '"
                               required>
                        <div class="invalid-feedback">
							' . esc_html_x( I18n::$password_input_text, 'User, password input text', FLWGB_PLUGIN_NAME ) . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input class="form-control" type="password" name="user_pass_repeat" id="user_pass_repeat"
                               placeholder="' . esc_attr_x( I18n::$password_again_input_text, "User pass repeat text", FLWGB_PLUGIN_NAME ) . '"
                               required>
                        <div class="invalid-feedback">
							' . esc_html_x( I18n::$password_again_input_text, "User pass repeat text", FLWGB_PLUGIN_NAME ) . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
						' . sprintf( __( I18n::$terms_and_conditions_text, FLWGB_PLUGIN_NAME ), get_option( 'flwgb_terms_and_conditions_page' ), get_option( 'flwgb_privacy_policy_page' ) ) . '
                    </label>
                    <div class="invalid-feedback">
						' . esc_html_x( I18n::$terms_and_conditions_validation, 'Terms and conditions checkboxt text', FLWGB_PLUGIN_NAME ) . '
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <button id="kayit-buton" class="btn btn-dark btn-block"
                        type="submit">' . esc_html_x( I18n::$register_button_text, 'Register form submit text', FLWGB_PLUGIN_NAME ) . '</button>
            </div>
            <div class="flwgb-loading flwgb-hide">' . esc_html_x( I18n::$loading_text, 'Loading text', FLWGB_PLUGIN_NAME ) . '</div>
        </form>
    </div>';

