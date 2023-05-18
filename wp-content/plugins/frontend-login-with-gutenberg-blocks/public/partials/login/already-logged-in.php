<?php

use FLWGB\I18n;

if ( is_user_logged_in() ):

	global $user_login;

	$logged_in_alert = '<div class="text-center">
							<div class="alert alert-warning">
								' . I18n::$hello . ' ' . $user_login . ',
					            <br>
					            <p>' . I18n::$already_logged_in_message . '</p>
					            <br>
					            <a class="sl-btn btn btn-dark fw-bold" href="' . site_url( get_option( 'flwgb_user_dashboard_page' ) ) . '">
					              <i class="bi bi-person-circle"></i>' . I18n::$go_to_user_dashboard . '</a>
					            <br>
								<a class="sl-btn btn btn-primary mt-2" href="' . wp_logout_url() . '">
									<i class="bi bi-box-arrow-right"></i> ' . I18n::$log_out . '
					            </a>
					        </div>
					     </div>';

	return $logged_in_alert;

endif;
