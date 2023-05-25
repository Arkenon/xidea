<?php
/**
 * Mail template settings tab content for admin options page
 *
 *
 * @since      1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/admin/partials
 */

use FLWGB\I18n;

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
					<?php echo esc_html_x( I18n::$register_mail_to_user, 'Register mail to user option text', FLWGB_PLUGIN_NAME ); ?>
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
					<?php echo esc_html_x( I18n::$register_mail_to_admin, 'Register mail to admin option text', FLWGB_PLUGIN_NAME ); ?>
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

	</table>

	<?php submit_button(); ?>

</form>
