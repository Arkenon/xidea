<?php


use FLWGB\Helper;
use FLWGB\I18n\I18n;

$input_style = 'border-radius:' . $form_attributes['inputBorderRadius'] . 'px';
$text_style  = 'color:' . $form_attributes['textColor'] . '; font-weight:' . $form_attributes['textFontWeight'];

$button_border_color  = $form_attributes['buttonBorder']['color'];
$button_border_style  = $form_attributes['buttonBorder']['style'];
$button_border_width  = $form_attributes['buttonBorder']['width'];

$button_style = 'color:' . $form_attributes['buttonTextColor'] . '; ' .
                'background-color: ' . $form_attributes['buttonBgColor'] . '; ' .
                'border-color: ' . $button_border_color . '; ' .
                'border-style: ' . $button_border_style . '; ' .
                'border-width: ' . $button_border_width . '; ' .
                'border-radius: ' . $form_attributes['buttonBorderRadius'] . 'px;' .
                'font-weight: ' . $form_attributes['buttonTextFontWeight'];

$input_style = 'border-radius:'.$form_attributes['inputBorderRadius'].'px';
$text_style = 'color:'. $form_attributes['textColor'].'; font-weight:'. $form_attributes['textFontWeight'];
$button_style = 'color:'. $form_attributes['buttonTextColor'].'; '.
                'background-color: '. $form_attributes['buttonBgColor'].'; '.
                'border-color: '. $form_attributes['buttonTextColor'].'; '.
                'border-style: '. $form_attributes['buttonBorder']['style'].'; '.
                'border-width: '. $form_attributes['buttonBorder']['width'].'; '.
                'border-radius: '. $form_attributes['buttonBorderRadius'].'px;'.
                'font-weight: '. $form_attributes['buttonTextFontWeight'];


$view = '<div class="border p-2">
		<div class="flwgb-form-result"></div>
        <form name="flwgb-reset-pass-form" id="flwgb-reset-pass-form" method="post">
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input type="password" class="form-control" name="resetpass_pwd" id="resetpass_pwd"
                               placeholder="' . esc_attr_x( I18n::text('password_input_text')->text, I18n::text('password_input_text')->context, FLWGB_TEXT_DOMAIN ) . '" required>
                        <div class="invalid-feedback">
							' . esc_attr_x( I18n::text('password_input_text')->text, I18n::text('password_input_text')->context, FLWGB_TEXT_DOMAIN )  . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input type="password" class="form-control" name="resetpass_pwd_again" id="resetpass_pwd_again"
                               placeholder="' . esc_attr_x( I18n::text('password_again_input_text')->text, I18n::text('password_again_input_text')->context, FLWGB_TEXT_DOMAIN ) . '" required>
                        <div class="invalid-feedback">
							' . esc_attr_x( I18n::text('password_again_input_text')->text, I18n::text('password_again_input_text')->context, FLWGB_TEXT_DOMAIN )  . '
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="userid" value="' . Helper::get( 'user' ) . '">
            <button type="submit" name="rest-submit" id="rest-submit"
                    class="btn btn-dark btn-block">' . esc_attr_x( I18n::text('submit_reset_password_button_text')->text, I18n::text('submit_reset_password_button_text')->context, FLWGB_TEXT_DOMAIN )  . '</button>
        </form>
        <div class="flwgb-loading flwgb-hide">' . esc_attr_x( I18n::text('loading_text')->text, I18n::text('loading_text')->context, FLWGB_TEXT_DOMAIN )  . '</div>
    </div>';


