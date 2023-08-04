<?php

use FLWGB\I18n\I18n;

global $user_login;

$view = '<div style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);transition: 0.3s;width:100%;">
			<div style="padding: 16px;text-align:center;">
				<div style="display: flex; align-items: center;justify-content: center;">
					<span class="dashicons dashicons-admin-users"></span>
					' . esc_html_x( I18n::text('hello_text')->text, I18n::text('hello_text')->context, FLWGB_TEXT_DOMAIN ) . ' ' . $user_login . ',
					<br>
				</div>';

				if(get_option('flwgb_has_user_dashboard') === 'yes') :

					$view .= '<a style="text-decoration:none;font-size:14px;" href="' . site_url( get_option( 'flwgb_user_settings_page' ) ) . '">
												' . esc_html_x( I18n::text('go_to_user_dashboard_text')->text,  I18n::text('go_to_user_dashboard_text')->context, FLWGB_TEXT_DOMAIN ) . '
											 </a> |';

				endif;

				$view .='<a style="text-decoration:none;font-size:14px;" href="' . wp_logout_url(  home_url() ) . '">
							'. esc_html_x( I18n::text('logout_text')->text, I18n::text('logout_text')->context, FLWGB_TEXT_DOMAIN ) . '
						</a>
			</div>
		</div>';
