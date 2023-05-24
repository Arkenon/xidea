<?php


use FLWGB\I18n;

$view = '<div class="border p-2 bg-white">
		<div class="flwgb-form-result"></div>
        <form name="flwgb-reset-pass-request-form" id="flwgb-reset-pass-request-form" method="post">
            <div class="form-row">
                <div class="col-12 mb-3">
                    <p></p>
                    <div class="input-group">
                        <input type="email" class="form-control" name="flwgb-reset-mail" id="flwgb-reset-mail"
                               placeholder="' . esc_attr_x( I18n::$reset_password_request_input_text, 'Reset password request input text', FLWGB_PLUGIN_NAME ) . '"
                               required>
                        <div class="invalid-feedback">
							' . esc_html_x( I18n::$reset_password_request_input_text, 'Reset password request input text', FLWGB_PLUGIN_NAME ) . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="rest-submit" id="rest-submit"
                        class="btn btn-dark btn-block">' . esc_html_x( I18n::$submit, 'Submit button text', FLWGB_PLUGIN_NAME ) . '</button>
            </div>
        </form>
        <div class="flwgb-loading flwgb-hide">' . esc_html_x( I18n::$loading_text, 'Loading text', FLWGB_PLUGIN_NAME ) . '</div>
    </div>';
