<?php

use FLWGB\Helper;
use FLWGB\I18n\I18n;

//Login Form
if ( is_user_logged_in() ) {

	$view = Helper::return_view( 'public/partials/login/already-logged-in.php' );

} else {
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

	$view = '<div>
				<form name="flwgb-login-form" id="flwgb-login-form" method="post">';

				$view .= '<div class="flwgb-form-row">
							<div class="flwgb-input-group">';

							if ( $form_attributes['showLabels'] ) {

								$view .= '<label class="flwgb-input-label" style="'.$text_style.'"
														   for="flwgb-username-or-email">' . esc_html_x( I18n::text('email_or_username_input_text')->text, I18n::text('email_or_username_input_text')->context, FLWGB_TEXT_DOMAIN ) . '</label>';
							}

							$view .= '<input class="flwgb-input-control" id="flwgb-username-or-email" name="flwgb-username-or-email" type="text" style='.$input_style.' placeholder="';

							if ( $form_attributes['showPlaceholders'] ) {

								$view .= esc_attr_x( I18n::text('email_or_username_placeholder_text')->text, I18n::text('email_or_username_placeholder_text')->context, FLWGB_TEXT_DOMAIN ) ;

							}

							$view .= '" />';
					$view .= '</div>
						</div>';

				$view .= '<div class="flwgb-form-row">
										<div class="flwgb-input-group">';

				if ( $form_attributes['showLabels'] ) {

					$view .= '<label class="flwgb-input-label" style="'.$text_style.'"
																	   for="flwgb-password">' . esc_html_x( I18n::text('password_input_text')->text, I18n::text('password_input_text')->context, FLWGB_TEXT_DOMAIN ) . '</label>';
				}

				$view .= '<input class="flwgb-input-control" id="flwgb-password" name="flwgb-password" type="password" style='.$input_style.' placeholder="';

				if ( $form_attributes['showPlaceholders'] ) {

					$view .= esc_attr_x( I18n::text('password_placeholder_text')->text, I18n::text('password_placeholder_text')->context, FLWGB_TEXT_DOMAIN ) ;

				}

						$view .= '" />';
					$view .= '</div>
						</div>';


				$view .= '<div class="flwgb-form-row">
						<div class="flwgb-input-group">
							<input id="flwgb-rememberme" checked="checked" type="checkbox" name="flwgb-rememberme" class="flwgb-form-check-input"/>
							<label class="flwgb-form-check-label" for="flwgb-rememberme">'.esc_html_x(I18n::text('remember_me_text')->text, I18n::text('remember_me_text')->context,FLWGB_TEXT_DOMAIN).'</label>
						</div>
					</div>';

				$view .= '<input type="hidden" name="action" value="flwgbloginhandle">';

				$view .= '<input type="hidden" name="security" value="'.wp_create_nonce('flwgbloginhandle').'">';

				$view .= '<div class="flwgb-form-row">
						<button style="'.$button_style.'" type="submit" id="flwgb-login-submit" class="flwgb-login-btn flwgb-btn">
							'.esc_html_x(I18n::text('login_text')->text, I18n::text('login_text')->context,FLWGB_TEXT_DOMAIN).'
						</button>
						' . do_action( 'wp_login' ) . '
					</div>
					<div id="flwgb-login-loading" class="flwgb-loading flwgb-hide">' . esc_html_x( I18n::text('loading_text')->text, I18n::text('loading_text')->context, FLWGB_TEXT_DOMAIN ) . '</div>';
	$view .= '</form>
			<div id="flwgb-login-form-result"></div>
    </div>';

	/*$hook_name = 'login_form';
	global $wp_filter;
	var_dump( $wp_filter[$hook_name] );*/


}
