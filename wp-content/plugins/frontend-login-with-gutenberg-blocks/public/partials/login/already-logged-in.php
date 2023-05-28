<?php

use FLWGB\I18n;

global $user_login;

$view = '<div class="text-center">
							<div class="alert alert-warning">
								' . esc_html_x( I18n::$hello_text, 'Hello text', FLWGB_PLUGIN_NAME ) . ' ' . $user_login . ',
					            <br>
					            <p>' . esc_html_x( I18n::$already_logged_in_message, 'Hello text', FLWGB_PLUGIN_NAME ) . '</p>
					            <br>
					            <a class="sl-btn btn btn-dark fw-bold" href="' . site_url( get_option( 'flwgb_user_settings_page' ) ) . '">
					              <i class="bi bi-person-circle"></i>' . esc_html_x( I18n::$go_to_user_dashboard, 'Go to user dashboard text', FLWGB_PLUGIN_NAME ) . '</a>
					            <br>
								<a class="sl-btn btn btn-primary mt-2" href="' . wp_logout_url( site_url( get_option( 'flwgb_redirect_page_after_logout' ) ) ?: home_url() ) . '">
									<i class="bi bi-box-arrow-right"></i> ' . esc_html_x( I18n::$log_out, 'Log out button text', FLWGB_PLUGIN_NAME ) . '
					            </a>
					        </div>
					     </div>';
