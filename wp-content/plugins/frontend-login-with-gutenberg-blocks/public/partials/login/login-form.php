<?php

use FLWGB\Helper;
use FLWGB\I18n;

//Login Form
if ( is_user_logged_in() ) {

	$view = Helper::view( 'public/partials/login/already-logged-in.php' );

} else {

	$view = Helper::view( 'public/partials/login/login-fail.php' );

	$input_style = 'border-radius:'.$form_attributes['inputBorderRadius'].'px';
	$text_style = 'color:'. $form_attributes['textColor'].'; font-weight:'. $form_attributes['textFontWeight'];
	$button_style = 'color:'. $form_attributes['buttonTextColor'].'; '.
	                'background-color: '. $form_attributes['buttonBgColor'].'; '.
	                'border-color: '. $form_attributes['buttonTextColor'].'; '.
	                'border-style: '. $form_attributes['buttonBorder']['style'].'; '.
	                'border-width: '. $form_attributes['buttonBorder']['width'].'; '.
					'border-radius: '. $form_attributes['buttonBorder']['radius'];


	$view .= '<div>
				<form name="loginform" id="loginform" action="' . wp_login_url( home_url() ) . '" method="post">';

				$view .= '<div class="flwgb-form-row">
							<div class="flwgb-input-group">';

							if ( $form_attributes['showLabels'] ) {

								$view .= '<label class="flwgb-input-label" style="'.$text_style.'"
														   for="flwgb-username-or-email">' . esc_html_x( I18n::$email_or_username_input_text, I18n::$email_or_username_input_text, FLWGB_PLUGIN_NAME ) . '</label>';
							}

							$view .= '<input class="flwgb-input-control" id="flwgb-username-or-email" name="log" type="text" style='.$input_style.' placeholder="';

							if ( $form_attributes['showLabels'] ) {

								$view .= esc_attr_x( I18n::$email_or_username_input_text, I18n::$email_or_username_input_text, FLWGB_PLUGIN_NAME ) ;

							}

							$view .= '" />';
					$view .= '</div>
						</div>';

				$view .= '<div class="flwgb-form-row">
										<div class="flwgb-input-group">';

				if ( $form_attributes['showLabels'] ) {

					$view .= '<label class="flwgb-input-label" style="'.$text_style.'"
																	   for="flwgb-password">' . esc_html_x( I18n::$password_input_text, I18n::$password_input_text, FLWGB_PLUGIN_NAME ) . '</label>';
				}

				$view .= '<input class="flwgb-input-control" id="flwgb-password" name="pwd" type="password" style='.$input_style.' placeholder="';

				if ( $form_attributes['showLabels'] ) {

					$view .= esc_attr_x( I18n::$password_placeholder_text, I18n::$password_placeholder_text, FLWGB_PLUGIN_NAME ) ;

				}

						$view .= '" />';
					$view .= '</div>
						</div>';


				$view .= '<div class="flwgb-form-row">
						<div class="flwgb-input-group">
							<input id="flwgb-rememberme" checked="checked" type="checkbox" class="flwgb-form-check-input"/>
							<label class="flwgb-form-check-label" style="'.$text_style.'" for="flwgb-rememberme" name="rememberme">'.esc_html_x(I18n::$remember_me_text,I18n::$remember_me_text,FLWGB_PLUGIN_NAME).'</label>
						</div>
					</div>';

				$view .= '<div class="flwgb-form-row">
						<button style="'.$button_style.'" type="submit" name="wp-submit" id="wp-submit" class="flwgb-login-btn">
							'.esc_html_x(I18n::$login_button_text,I18n::$login_button_text,FLWGB_PLUGIN_NAME).'
						</button>
						' . do_action( 'wp_login' ) . '
					</div>';

	$view .= '</form>
    </div>';



}
