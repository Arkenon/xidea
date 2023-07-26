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

				<p><?php echo I18n::text('you_can_use_this_tags_text')->text; ?> {{username}} </p>

				<?php

				$template  = I18n::text('register_mail_to_user_template')->text;
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

				<p><?php echo I18n::text('you_can_use_this_tags_text')->text; ?> {{username}} </p>

				<?php

				$template  = I18n::text('register_mail_to_admin_template')->text;
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
					<?php echo esc_html_x( I18n::text('reset_password_request_mail_to_user')->text, I18n::text('reset_password_request_mail_to_user')->context, FLWGB_TEXT_DOMAIN ); ?>
				</label>

			</th>
			<td>

				<p><?php echo I18n::text('you_can_use_this_tags_text')->text; ?> {{username}}, {{reset_link}} </p>

				<?php

				$template  = I18n::text('reset_password_request_mail_to_user_template')->text;
				$content   = stripslashes( get_option( 'flwgb_reset_request_mail_to_user' ) ) ?: $template;
				$editor_id = 'flwgb_reset_request_mail_to_user';
				$settings  = array( 'media_buttons' => false );

				wp_editor( $content, $editor_id, $settings );

				?>

			</td>
		</tr>

		<tr>
			<th scope="row">

				<label for="flwgb_reset_password_mail_to_user">
					<?php echo esc_html_x( I18n::text('reset_password_mail_to_user')->text, I18n::text('reset_password_mail_to_user')->context, FLWGB_TEXT_DOMAIN ); ?>
				</label>

			</th>
			<td>

				<p><?php echo I18n::text('you_can_use_this_tags_text')->text; ?> {{username}} </p>

				<?php

				$template  = I18n::text('reset_password_mail_to_user_template')->text;
				$content   = stripslashes( get_option( 'flwgb_reset_password_mail_to_user' ) ) ?: $template;
				$editor_id = 'flwgb_reset_password_mail_to_user';
				$settings  = array( 'media_buttons' => false );

				wp_editor( $content, $editor_id, $settings );

				?>

			</td>
		</tr>



	</table>

	<?php submit_button(); ?>

</form>
