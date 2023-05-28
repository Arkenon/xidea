<?php


use FLWGB\Helper;
use FLWGB\I18n;

$view = '<div class="border p-2">
		<div class="flwgb-form-result"></div>
        <form name="flwgb-reset-pass-form" id="flwgb-reset-pass-form" method="post">
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input type="password" class="form-control" name="resetpss" id="resetpss"
                               placeholder="' . esc_attr_x( I18n::$password_input_text, 'User password input text', FLWGB_PLUGIN_NAME ) . '" required>
                        <div class="invalid-feedback">
							' . esc_html_x( I18n::$password_input_text, 'User password input text', FLWGB_PLUGIN_NAME ) . '
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="userid" value="' . Helper::get( 'user' ) . '">
            <button type="submit" name="rest-submit" id="rest-submit"
                    class="btn btn-dark btn-block">' . esc_html_x( I18n::$submit_reset_password_button_text, 'Change password button text', FLWGB_PLUGIN_NAME ) . '</button>
        </form>
        <div class="flwgb-loading flwgb-hide">' . esc_html_x( I18n::$loading_text, 'Loading text', FLWGB_PLUGIN_NAME ) . '</div>
    </div>';
