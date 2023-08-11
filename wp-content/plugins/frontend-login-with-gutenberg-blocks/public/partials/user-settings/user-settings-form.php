<?php

use FLWGB\I18n\I18n;

$current_user             = wp_get_current_user();
$ID                       = $current_user->ID;
$user_email               = $current_user->user_email;
$first_name               = $current_user->first_name;
$last_name                = $current_user->last_name;
$website                  = $current_user->user_url;
$bio                      = $current_user->user_description;

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

$view = '<form name="flwgb-user-settings-form" id="flwgb-user-settings-form" method="post">
            <div class="flwgb-form-row">
               <div class="flwgb-input-group">';

					if ( $form_attributes['showLabels'] ) {

						$view .= '<label class="flwgb-input-label" style="'.$text_style.'" for="flwgb-user-first-name">
									' . esc_html_x( I18n::text('user_first_name_text')->text, I18n::text('user_first_name_text')->context, FLWGB_TEXT_DOMAIN ) . '
								  </label>';

					}

					$view .= '<input class="flwgb-input-control" id="flwgb-user-first-name" name="flwgb-user-first-name" type="text" style='.$input_style.' placeholder="';

					if ( $form_attributes['showPlaceholders'] ) {

						$view .= esc_attr_x( I18n::text('user_first_name_placeholder_text')->text, I18n::text('user_first_name_placeholder_text')->context, FLWGB_TEXT_DOMAIN ) ;

					}

					$view .= '" value="'.esc_attr($first_name).'" />';
				$view .= '</div>
			</div>';

			$view .= '<div class="flwgb-form-row">
				         <div class="flwgb-input-group">';

							if ( $form_attributes['showLabels'] ) {

								$view .= '<label class="flwgb-input-label" style="'.$text_style.'" for="flwgb-user-last-name">
												' . esc_html_x( I18n::text('user_last_name_text')->text, I18n::text('user_last_name_text')->context, FLWGB_TEXT_DOMAIN ) . '
										</label>';

							}

							$view .= '<input class="flwgb-input-control" id="flwgb-user-last-name" name="flwgb-user-last-name" type="text" style='.$input_style.' placeholder="';

							if ( $form_attributes['showPlaceholders'] ) {

								$view .= esc_attr_x( I18n::text('user_last_name_placeholder_text')->text, I18n::text('user_last_name_placeholder_text')->context, FLWGB_TEXT_DOMAIN ) ;

							}

							$view .= '" value="'.esc_attr($last_name).'" />';
				$view .= '</div>
			</div>';

		   $view .= '<div class="flwgb-form-row">
               <div class="flwgb-input-group">';

					if ( $form_attributes['showLabels'] ) {

						$view .= '<label class="flwgb-input-label" style="'.$text_style.'" for="flwgb-email-update">
									' . esc_html_x( I18n::text('email_input_text')->text, I18n::text('email_input_text')->context, FLWGB_TEXT_DOMAIN ) . '
								 </label>';
					}

					$view .= '<input class="flwgb-input-control" id="flwgb-email-update" name="flwgb-email-update" type="text" required style='.$input_style.' placeholder="';

					if ( $form_attributes['showPlaceholders'] ) {

						$view .= esc_attr_x( I18n::text('email_placeholder_text')->text, I18n::text('email_placeholder_text')->context, FLWGB_TEXT_DOMAIN ) ;

					}

					$view .= '" value="'.esc_attr($user_email).'" />';
				$view .= '</div>
           </div>';

			$view .= '<div class="flwgb-form-row">
				         <div class="flwgb-input-group">';

						if ( $form_attributes['showLabels'] ) {

							$view .= '<label class="flwgb-input-label" style="'.$text_style.'" for="flwgb-user-website">
										' . esc_html_x( I18n::text('user_website_text')->text, I18n::text('user_website_text')->context, FLWGB_TEXT_DOMAIN ) . '
									 </label>';

						}

						$view .= '<input class="flwgb-input-control" id="flwgb-user-website" name="flwgb-user-website" type="text" style='.$input_style.' placeholder="';

						if ( $form_attributes['showPlaceholders'] ) {

							$view .= esc_attr_x( I18n::text('user_website_placeholder_text')->text, I18n::text('user_website_placeholder_text')->context, FLWGB_TEXT_DOMAIN ) ;

						}

						$view .= '" value="'.esc_attr($website).'" />';
				$view .= '</div>
			</div>';

			$view .= '<div class="flwgb-form-row">
						<div class="flwgb-input-group">';

							if ( $form_attributes['showLabels'] ) {

								$view .= '<label class="flwgb-input-label" style="'.$text_style.'" for="flwgb-user-bio">
											' . esc_html_x( I18n::text('user_bio_text')->text, I18n::text('user_bio_text')->context, FLWGB_TEXT_DOMAIN ) . '
										 </label>';

							}

							$view .= '<textarea class="flwgb-textarea-control" name="flwgb-user-bio" id="flwgb-user-bio" cols="30" rows="10" >';

							if ( $form_attributes['showPlaceholders'] ) {

								//TODO returns false
								if($bio){

									$view .= esc_textarea( $bio );

								} else {

									$view .= esc_textarea( I18n::text('user_bio_placeholder_text')->text, I18n::text('user_bio_placeholder_text')->context, FLWGB_TEXT_DOMAIN );

								}

							}

							$view .= '</textarea>';
				$view .= '</div>
			</div>';

			$view .= '<div class="flwgb-form-row">
					      <div class="flwgb-input-group">';

							if ( $form_attributes['showLabels'] ) {

								$view .= '<label class="flwgb-input-label" style="'.$text_style.'" for="flwgb-current-password">
											' . esc_html_x( I18n::text('current_password_input_text')->text, I18n::text('current_password_input_text')->context, FLWGB_TEXT_DOMAIN ) . '
										  </label>';
							}

							$view .= '<input class="flwgb-input-control" id="flwgb-current-password" name="flwgb-current-password" type="password" style='.$input_style.' placeholder="';

							if ( $form_attributes['showPlaceholders'] ) {

								$view .= esc_attr_x( I18n::text('current_password_placeholder_text')->text, I18n::text('current_password_placeholder_text')->context, FLWGB_TEXT_DOMAIN ) ;

							}

						$view .= '" />';
				$view .= '</div>
			</div>';

			$view .= '<div class="flwgb-form-row">
					      <div class="flwgb-input-group">';

							if ( $form_attributes['showLabels'] ) {

								$view .= '<label class="flwgb-input-label" style="'.$text_style.'" for="flwgb-password-update">
											' . esc_html_x( I18n::text('new_password_input_text')->text, I18n::text('new_password_input_text')->context, FLWGB_TEXT_DOMAIN ) . '
										 </label>';
							}

							$view .= '<input class="flwgb-input-control" id="flwgb-password-update" name="flwgb-password-update" type="password" style='.$input_style.' placeholder="';

							if ( $form_attributes['showPlaceholders'] ) {

								$view .= esc_attr_x( I18n::text('new_password_placeholder_text')->text, I18n::text('new_password_placeholder_text')->context, FLWGB_TEXT_DOMAIN ) ;

							}

							$view .= '" />';
				$view .= '</div>
			</div>';

			$view .= '<div class="flwgb-form-row">
					    <div class="flwgb-input-group">';

							if ( $form_attributes['showLabels'] ) {

								$view .= '<label class="flwgb-input-label" style="'.$text_style.'" for="flwgb-password-again-update">
											' . esc_html_x( I18n::text('new_password_again_input_text')->text, I18n::text('new_password_again_input_text')->context, FLWGB_TEXT_DOMAIN ) . '
										  </label>';
							}

							$view .= '<input class="flwgb-input-control" id="flwgb-password-again-update" name="flwgb-password-again-update" type="password" style='.$input_style.' placeholder="';

							if ( $form_attributes['showPlaceholders'] ) {

								$view .= esc_attr_x( I18n::text('new_password_again_placeholder_text')->text, I18n::text('new_password_again_placeholder_text')->context, FLWGB_TEXT_DOMAIN ) ;

							}

							$view .= '" />';

				$view .= '</div>
			</div>';

			$view .= '<input type="hidden" name="action" value="'.esc_attr('flwgbusersettingsupdatehandle').'">';

			$view .= '<input type="hidden" name="security" value="'.esc_attr(wp_create_nonce('flwgbusersettingsupdatehandle')).'">';

			$view .= '<input type="hidden" name="user_id" value="'.esc_attr($ID).'">';

			$view .= '<div class="flwgb-form-row">
							<button style="'.$button_style.'" type="submit" id="flwgb-user-settings-submit" class="flwgb-update-user-btn flwgb-btn">
								'.esc_html_x(I18n::text('user_update_button_text')->text, I18n::text('user_update_button_text')->context,FLWGB_TEXT_DOMAIN).'
							</button>
						</div>
						<div id="flwgb-user-settings-loading" class="flwgb-loading flwgb-hide">' . esc_html_x( I18n::text('loading_text')->text, I18n::text('loading_text')->context, FLWGB_TEXT_DOMAIN ) . '</div>';
		$view .= '</form>
	<div id="flwgb-user-settings-form-result"></div>
</div>';
