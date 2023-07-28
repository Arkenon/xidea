<?php

use FLWGB\I18n\I18n;

	$input_style = 'border-radius:' . $form_attributes[''] . 'px';
	$text_style  = 'color:' . $form_attributes['textColor'] . '; font-weight:' . $form_attributes['textFontWeight'];

	$button_border_color  = array_key_exists('color',$form_attributes['buttonBorder']) ? 'border-color: '. $form_attributes['buttonBorder']['color'].';' : "";
	$button_border_style  = array_key_exists('style',$form_attributes['buttonBorder']) ? 'border-style: '.$form_attributes['buttonBorder']['style'].';' : "";
	$button_border_width  = array_key_exists('width',$form_attributes['buttonBorder']) ? 'border-width: '.$form_attributes['buttonBorder']['width'].';' : "";

	$button_style = 'color:' . $form_attributes['buttonTextColor'] . '; ' .
	                'background-color: ' . $form_attributes['buttonBgColor'] . '; ' .
	                $button_border_color .
	                $button_border_style .
	                $button_border_width .
	                'border-radius: ' . $form_attributes['buttonBorderRadius'] . 'px;' .
	                'font-weight: ' . $form_attributes['buttonTextFontWeight'];

	$desc = $form_attributes['description'] ?: I18n::text('send_reset_request_description')->text;

	$view = '<div>
				<form name="flwgb-reset-pass-request-form" id="flwgb-reset-pass-request-form" method="post">';

				if($form_attributes['showDescription']){
					$view .= '<div style="text-align:center;">
							<p>' . esc_html_x( $desc, I18n::text('send_reset_request_description')->context, FLWGB_TEXT_DOMAIN ) . '</p>
						  </div>';
				}

				$view .= '<div class="flwgb-form-row">
						    <div class="flwgb-input-group">';

								if ( $form_attributes['showLabels'] ) {

									$view .= '<label class="flwgb-input-label" style="' . $text_style . '" for="flwgb-email">' . esc_html_x( I18n::text('email_input_text')->text, I18n::text('email_input_text')->context, FLWGB_TEXT_DOMAIN ) . '</label>';
								}

									$view .= '<input class="flwgb-input-control" id="flwgb-email" name="flwgb-email" required type="text" style=' . $input_style . ' placeholder="';

									if ( $form_attributes['showPlaceholders'] ) {

										$view .= esc_attr_x( I18n::text('email_placeholder_text')->text, I18n::text('email_placeholder_text')->context, FLWGB_TEXT_DOMAIN );

									}

									$view .= '" />';
							$view .= '</div>

						</div>';

				$view .= '<input type="hidden" name="action" value="flwgbresetrequesthandle">';

				$view .= '<input type="hidden" name="security" value="'.wp_create_nonce('flwgbresetrequesthandle').'">';

				$view .= '<div class="flwgb-form-row">
							<button style="'.$button_style.'" type="submit" id="flwgb-reset-request-submit" class="flwgb-reset-request-btn flwgb-btn">
								' . esc_html_x( I18n::text('send_reset_request')->text, I18n::text('send_reset_request')->context, FLWGB_TEXT_DOMAIN ) . '
							</button>
						</div>
				<div id="flwgb-reset-request-loading" class="flwgb-loading flwgb-hide">' . esc_html_x( I18n::text('loading_text')->text, I18n::text('loading_text')->context, FLWGB_TEXT_DOMAIN ) . '</div>';
	$view .= '</form>
			<div id="flwgb-reset-request-form-result"></div>
	    </div>';


