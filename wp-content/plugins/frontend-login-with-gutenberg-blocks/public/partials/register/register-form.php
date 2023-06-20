<?php

use FLWGB\I18n\I18n;

$view = '<div class="border p-2 bg-white">
		<div class="flwgb-form-result"></div>
        <form name="flwgb-register-form" id="flwgb-register-form" method="post">
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="username" id="username"
                               placeholder="' . esc_attr_x( I18n::text('user_input_text')->text, I18n::text('user_input_text')->context, FLWGB_TEXT_DOMAIN ) . '" required>
                        <div class="invalid-feedback">
							' . esc_html_x( I18n::text('user_input_text')->text, I18n::text('user_input_text')->context, FLWGB_TEXT_DOMAIN ) . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="user_email" id="user_email"
                               placeholder="' . esc_attr_x( I18n::text('email_input_text')->text, I18n::text('email_input_text')->context, FLWGB_TEXT_DOMAIN ) . '" required>
                        <div class="invalid-feedback">
							' . esc_html_x( I18n::text('email_input_text')->text, I18n::text('email_input_text')->context, FLWGB_TEXT_DOMAIN ) . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input class="form-control" type="password" name="user_pass" id="user_pass"
                               placeholder="' . esc_attr_x( I18n::text('password_input_text')->text, I18n::text('password_input_text')->context, FLWGB_TEXT_DOMAIN ) . '"
                               required>
                        <div class="invalid-feedback">
							' . esc_html_x( I18n::text('password_input_text')->text, I18n::text('password_input_text')->context, FLWGB_TEXT_DOMAIN ) . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input class="form-control" type="password" name="user_pass_repeat" id="user_pass_repeat"
                               placeholder="' . esc_attr_x( I18n::text('password_again_input_text')->text, I18n::text('password_again_input_text')->context, FLWGB_TEXT_DOMAIN ) . '"
                               required>
                        <div class="invalid-feedback">
							' . esc_html_x( I18n::text('password_again_input_text')->text, I18n::text('password_again_input_text')->context, FLWGB_TEXT_DOMAIN ) . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
						' . sprintf( __( I18n::text('terms_and_conditions_text')->text, FLWGB_TEXT_DOMAIN ), get_option( 'flwgb_terms_and_conditions_page' ), get_option( 'flwgb_privacy_policy_page' ) ) . '
                    </label>
                    <div class="invalid-feedback">
						' . esc_html_x( I18n::text('terms_and_conditions_validation')->text, I18n::text('terms_and_conditions_validation')->context, FLWGB_TEXT_DOMAIN ) . '
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-dark btn-block"
                        type="submit">' . esc_html_x( I18n::text('register_button_text')->text, I18n::text('register_button_text')->context, FLWGB_TEXT_DOMAIN ) . '</button>
            </div>
            <div class="flwgb-loading flwgb-hide">' . esc_html_x( I18n::text('loading_text')->text, I18n::text('loading_text')->context, FLWGB_TEXT_DOMAIN ) . '</div>
        </form>
    </div>';

