<?php

namespace FLWGB;

use FLWGB\I18n\I18n;

class Mail {

	/**
	 * Print an error message if wp_mail() failed.
	 *
	 * Created for wp_mail_failed hook.
	 *
	 * @since    1.0.0
	 */
	public function mail_fail_error() {

		echo json_encode( array(
			'status'  => false,
			'message' => esc_html_x( I18n::text( 'mail_error_message' )->text, I18n::text( 'mail_error_message' )->context, FLWGB_TEXT_DOMAIN )
		) );

		wp_die();

	}

	/**
	 * Html formatted mail body
	 *
	 * Created for wp_mail_content_type filter.
	 *
	 * @since    1.0.0
	 */
	public function mail_html_format(){
		return "text/html";
	}

	/**
	 *
	 * Mail template for lost password request
	 *
	 * @param string $option_name Email template option name
	 * @param string $template_name Email template name for translation
	 * @param array $params Parameters for email template
	 * @param string $mail_title E-mail subject
	 *
	 * @return bool
	 *
	 * @since 1.0.0
	 */
	public function send_mail( string $option_name, string $template_name, array $params, string $mail_title ): bool {

		$body = Helper::replace_mail_parameters( $option_name, $template_name, $params );

		$send_mail = wp_mail( $params['email'], esc_html_x( I18n::text( $mail_title )->text, I18n::text( $mail_title )->context, FLWGB_TEXT_DOMAIN ), $body );

		if ( is_wp_error( $send_mail ) ) {
			return false;
		}

		return true;

	}
}
