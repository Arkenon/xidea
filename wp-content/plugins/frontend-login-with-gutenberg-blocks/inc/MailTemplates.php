<?php

namespace FLWGB;

class MailTemplates {

	/**
	 * Mail template for lost password request
	 *
	 * @param string $username User to sent e-mail
	 * @param string $email User e-mail address
	 * @param string $reset_link Reset password link
	 *
	 * @return bool a TRUE on success or FALSE on failure.
	 *
	 * @since    1.0.0
	 */
	public function flwgb_reset_password_request_mail_template( $option_name, $params ): bool {

		$body = Helper::replace_mail_parameters( $option_name, $params );

		$send_mail = wp_mail( $params['email'], esc_html_x( I18n::$reset_request_mail_title, I18n::$reset_request_mail_title, FLWGB_PLUGIN_NAME ), $body );

		if ( ! is_wp_error( $send_mail ) ) {
			return true;
		} else {
			return false;
		}

	}
}
