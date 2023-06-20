<?php

use FLWGB\I18n\I18n;

global $user_login;

$view = '<div style="text-align:center;">
				' . esc_html_x( I18n::text('hello_text')->text, I18n::text('hello_text')->context, FLWGB_TEXT_DOMAIN ) . ' ' . $user_login . ',
				<br>
				<p>' . esc_html_x( I18n::text('already_logged_in_message')->text,I18n::text('already_logged_in_message')->context, FLWGB_TEXT_DOMAIN ) . '</p>
				<br>';

				if(get_option('flwgb_has_user_dashboard') === 'yes') :

					$view .= '<a href="' . site_url( get_option( 'flwgb_user_settings_page' ) ) . '">
										' . esc_html_x( I18n::text('go_to_user_dashboard_text')->text,  I18n::text('go_to_user_dashboard_text')->context, FLWGB_TEXT_DOMAIN ) . '
									</a> |';

				endif;

				$view .='<a href="' . wp_logout_url( site_url( get_option( 'flwgb_redirect_page_after_logout' ) ) ?: home_url() ) . '">
						'. esc_html_x( I18n::text('logout_text')->text, I18n::text('logout_text')->context, FLWGB_TEXT_DOMAIN ) . '
					</a>
		</div>';
