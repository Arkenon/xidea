<?php

use FLWGB\I18n;

if ( isset($_POST) ) {

	sl_registeration_control( $activate, $activation_url, $logo_url );

}

$form = '<div class="border p-2 bg-white">
        <form name="registerform" id="registerform" action="" method="post">
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="username" id="username"
                               placeholder="' . I18n::$user_input_text . '" required>
                        <div class="invalid-feedback">
							' . I18n::$user_input_text . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="user_email" id="user_email"
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
                        <input class="form-control" type="password" name="user_pass" id="user_pass"
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
                    <div class="input-group">
                        <input class="form-control" type="password" name="user_pass_repeat" id="user_pass_repeat"
                               placeholder="' . I18n::$password_again_input_text . '"
                               required>
                        <div class="invalid-feedback">
							' . I18n::$password_again_input_text . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
						' . sprintf(
							__(I18n::$terms_and_conditions_text,FLWGB_PLUGIN_NAME),
							get_option('flwgb_terms_and_conditions_page'),
							get_option('flwgb_privacy_policy_page' )
							) . '
                    </label>
                    <div class="invalid-feedback">
						' . I18n::$terms_and_conditions_validation . '
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <button id="kayit-buton" class="btn btn-dark btn-block"
                        type="submit">' . I18n::$register_button_text . '</button>
            </div>
        </form>
    </div>';

return $form;
