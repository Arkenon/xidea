<?php

use FLWGB\I18n;

global $user_login;

$view = '<div style="text-align:center;">
				' . esc_html_x( I18n::$hello_text, I18n::$hello_text, FLWGB_PLUGIN_NAME ) . ' ' . $user_login . ',
				<br>
				<p>' . esc_html_x( I18n::$already_logged_in_message, I18n::$already_logged_in_message, FLWGB_PLUGIN_NAME ) . '</p>
				<br>';

				if(get_option('flwgb_has_user_dashboard') === 'yes') :

					$view .= '<a href="' . site_url( get_option( 'flwgb_user_settings_page' ) ) . '">
										' . esc_html_x( I18n::$go_to_user_dashboard, I18n::$go_to_user_dashboard, FLWGB_PLUGIN_NAME ) . '
									</a> |';

				endif;

				$view .='<a href="' . wp_logout_url( site_url( get_option( 'flwgb_redirect_page_after_logout' ) ) ?: home_url() ) . '">
						'. esc_html_x( I18n::$log_out, I18n::$log_out, FLWGB_PLUGIN_NAME ) . '
					</a>
		</div>';
