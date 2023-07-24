<?php
/**
 * Mail template settings tab content for admin options page
 *
 *
 * @since      1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/admin/partials
 */

use FLWGB\I18n\I18n;

?>


<form method="post" action="options.php">

	<?php

	settings_fields( 'flwgb-mail-settings-group' );
	do_settings_sections( 'flwgb-mail-settings-group' );

	?>

	<table class="form-table">

		<tr>
			<th scope="row">

				<label for="flwgb_register_mail_to_user">
					<?php echo esc_html_x( I18n::text('register_mail_to_user')->text, I18n::text('register_mail_to_user')->context, FLWGB_TEXT_DOMAIN ); ?>
				</label>

			</th>
			<td>

				<p>You can use these tags: {{username}} </p>

				<?php

				$template  = 'Hello {{username}}, <br> Welcome to our website. We have sent an e-mail to you.';
				$content   = get_option( 'flwgb_register_mail_to_user' ) ?: $template;
				$editor_id = 'flwgb_register_mail_to_user';
				$settings  = array( 'media_buttons' => false );

				wp_editor( $content, $editor_id, $settings );

				?>

			</td>
		</tr>

		<tr>
			<th scope="row">

				<label for="flwgb_register_mail_to_admin">
					<?php echo esc_html_x( I18n::text('register_mail_to_admin')->text, I18n::text('register_mail_to_admin')->context, FLWGB_TEXT_DOMAIN ); ?>
				</label>

			</th>
			<td>

				<p>You can use these tags: {{username}} </p>

				<?php

				$template  = 'Hello {{username}}, <br> Welcome to our website. We have sent an e-mail to you.';
				$content   = stripslashes( get_option( 'flwgb_register_mail_to_admin' ) ) ?: $template;
				$editor_id = 'flwgb_register_mail_to_admin';
				$settings  = array( 'media_buttons' => false );

				wp_editor( $content, $editor_id, $settings );

				?>

			</td>
		</tr>

		<tr>
			<th scope="row">

				<label for="flwgb_reset_request_mail_to_user">
					<?php echo esc_html_x( I18n::text('reset_password_request_mail_template')->text, I18n::text('reset_password_request_mail_template')->context, FLWGB_TEXT_DOMAIN ); ?>
				</label>

			</th>
			<td>

				<p>You can use these tags: {{username}}, {{reset_link}} </p>

				<?php

				$template  = 'Hello {{username}}, <br> You can change your password from the link below <br> {{reset_link}} <br> Thanks for your attention.';
				$content   = stripslashes( get_option( 'flwgb_reset_request_mail_to_user' ) ) ?: $template;
				$editor_id = 'flwgb_reset_request_mail_to_user';
				$settings  = array( 'media_buttons' => false );

				wp_editor( $content, $editor_id, $settings );

				?>

			</td>
		</tr>

	</table>

	<?php submit_button(); ?>

</form>
