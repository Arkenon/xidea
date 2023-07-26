<?php

use FLWGB\I18n\I18n;

$input_style = 'border-radius:'.$form_attributes['inputBorderRadius'].'px';
$text_style = 'color:'. $form_attributes['textColor'].'; font-weight:'. $form_attributes['textFontWeight'];

$button_border_color  = array_key_exists('color',$form_attributes['buttonBorder']) ? 'border-color: '. $form_attributes['buttonBorder']['color'].';' : "";
$button_border_style  = array_key_exists('style',$form_attributes['buttonBorder']) ? 'border-style: '.$form_attributes['buttonBorder']['style'].';' : "";
$button_border_width  = array_key_exists('width',$form_attributes['buttonBorder']) ? 'border-width: '.$form_attributes['buttonBorder']['width'].';' : "";

$button_style = 'color:'. $form_attributes['buttonTextColor'].'; '.
                'background-color: '. $form_attributes['buttonBgColor'].'; '.
                $button_border_color .
                $button_border_style .
                $button_border_width .
                'border-radius: '. $form_attributes['buttonBorderRadius'].'px;'.
                'font-weight: '. $form_attributes['buttonTextFontWeight'];

$view = '<form name="flwgb-register-form" id="flwgb-register-form" method="post">
            <div class="flwgb-form-row">
               <div class="flwgb-input-group">';
               if ( $form_attributes['showLabels'] ) {

				   $view .= '<label class="flwgb-input-label" style="'.$text_style.'" for="flwgb-username-for-register">
						        ' . esc_html_x( I18n::text('username_input_text')->text, I18n::text('username_input_text')->context, FLWGB_TEXT_DOMAIN ) . '
						     </label>';
				}

				$view .= '<input class="flwgb-input-control" id="flwgb-username-for-register" name="flwgb-username-for-register" type="text" required style='.$input_style.' placeholder="';

					if ( $form_attributes['showPlaceholders'] ) {

						$view .= esc_attr_x( I18n::text('username_placeholder_text')->text, I18n::text('username_placeholder_text')->context, FLWGB_TEXT_DOMAIN ) ;

					}

				$view .= '" />';
				$view .= '</div>
            </div>';

	$view .= '<div class="flwgb-form-row">
               <div class="flwgb-input-group">';
				if ( $form_attributes['showLabels'] ) {

					$view .= '<label class="flwgb-input-label" style="'.$text_style.'" for="flwgb-email-for-register">
								' . esc_html_x( I18n::text('email_input_text')->text, I18n::text('email_input_text')->context, FLWGB_TEXT_DOMAIN ) . '
							 </label>';
				}

				$view .= '<input class="flwgb-input-control" id="flwgb-email-for-register" name="flwgb-email-for-register" type="text" required style='.$input_style.' placeholder="';

				if ( $form_attributes['showPlaceholders'] ) {

					$view .= esc_attr_x( I18n::text('email_placeholder_text')->text, I18n::text('email_placeholder_text')->context, FLWGB_TEXT_DOMAIN ) ;

				}

				$view .= '" />';
				$view .= '</div>
            </div>';
	$view .= '<div class="flwgb-form-row">
	            <div class="flwgb-input-group">';
				if ( $form_attributes['showLabels'] ) {

					$view .= '<label class="flwgb-input-label" style="'.$text_style.'" for="flwgb-password-for-register">
								' . esc_html_x( I18n::text('password_input_text')->text, I18n::text('password_input_text')->context, FLWGB_TEXT_DOMAIN ) . '
							  </label>';
				}

				$view .= '<input class="flwgb-input-control" id="flwgb-password-for-register" name="flwgb-password-for-register" type="password" required style='.$input_style.' placeholder="';

				if ( $form_attributes['showPlaceholders'] ) {

					$view .= esc_attr_x( I18n::text('password_placeholder_text')->text, I18n::text('password_placeholder_text')->context, FLWGB_TEXT_DOMAIN ) ;

				}

				$view .= '" />';
				$view .= '</div>
            </div>';

	$view .= '<div class="flwgb-form-row">
	            <div class="flwgb-input-group">';
				if ( $form_attributes['showLabels'] ) {

					$view .= '<label class="flwgb-input-label" style="'.$text_style.'" for="flwgb-password-again-for-register">
							    ' . esc_html_x( I18n::text('password_again_input_text')->text, I18n::text('password_again_input_text')->context, FLWGB_TEXT_DOMAIN ) . '
							 </label>';
				}

				$view .= '<input class="flwgb-input-control" id="flwgb-password-again-for-register" name="flwgb-password-again-for-register" type="password" required style='.$input_style.' placeholder="';

				if ( $form_attributes['showPlaceholders'] ) {

					$view .= esc_attr_x( I18n::text('password_again_placeholder_text')->text, I18n::text('password_again_placeholder_text')->context, FLWGB_TEXT_DOMAIN ) ;

				}

				$view .= '" />';
				$view .= '</div>
            </div>';

	$view .= '<div class="flwgb-form-row">
				<div class="flwgb-input-group">
					<input id="flwgb-terms-and-privacy" checked="checked" type="checkbox" name="flwgb-terms-and-privacy" required class="flwgb-form-check-input"/>
						<label class="flwgb-form-check-label" for="flwgb-terms-and-privacy">'. sprintf( __( I18n::text( 'terms_and_conditions_text' )->text, FLWGB_TEXT_DOMAIN ), get_option( 'flwgb_terms_and_conditions_page' ), get_option( 'flwgb_privacy_policy_page' ) ) .'</label>
					</div>
				</div>';

	$view .= '<input type="hidden" name="action" value="flwgbregisterhandle">';

	$view .= '<input type="hidden" name="security" value="'.wp_create_nonce('flwgbregisterhandle').'">';

	$view .= '<div class="flwgb-form-row">
						<button style="'.$button_style.'" type="submit" id="flwgb-register-submit" class="flwgb-register-btn flwgb-btn">
							'.esc_html_x(I18n::text('register_button_text')->text, I18n::text('register_button_text')->context,FLWGB_TEXT_DOMAIN).'
						</button>
					</div>
					<div id="flwgb-register-loading" class="flwgb-loading flwgb-hide">' . esc_html_x( I18n::text('loading_text')->text, I18n::text('loading_text')->context, FLWGB_TEXT_DOMAIN ) . '</div>';
$view .= '</form>
			<div id="flwgb-register-form-result"></div>
    </div>';
