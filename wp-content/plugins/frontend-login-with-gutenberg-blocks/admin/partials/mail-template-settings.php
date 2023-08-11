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

	$data = [
			[
					"id"       => "flwgb_register_mail_to_user",
					"title"    => "register_mail_to_user",
					"tags"     => "{{username}}",
					"template" => "register_mail_to_user_template",
					"content"  => "flwgb_register_mail_to_user"
			],
			[
					"id"       => "flwgb_register_mail_to_user_with_activation",
					"title"    => "register_mail_to_user_with_activation",
					"tags"     => "{{username}}, {{activation_link}}",
					"template" => "register_mail_to_user_template_with_activation",
					"content"  => "flwgb_register_mail_to_user_with_activation"
			],
			[
					"id"       => "flwgb_register_mail_to_admin",
					"title"    => "register_mail_to_admin",
					"tags"     => "{{username}}, {{email}}",
					"template" => "register_mail_to_admin_template",
					"content"  => "flwgb_register_mail_to_admin"
			],
			[
					"id"       => "flwgb_reset_request_mail_to_user",
					"title"    => "reset_password_request_mail_to_user",
					"tags"     => "{{username}}, {{reset_link}}",
					"template" => "reset_password_request_mail_to_user_template",
					"content"  => "flwgb_reset_request_mail_to_user"
			],
			[
					"id"       => "flwgb_reset_password_mail_to_user",
					"title"    => "reset_password_mail_to_user",
					"tags"     => "{{username}}",
					"template" => "reset_password_mail_to_user_template",
					"content"  => "flwgb_reset_password_mail_to_user"
			]
	]

	?>

	<table class="form-table">

		<?php foreach ( $data as $item ): ?>

			<tr>
				<th scope="row">

					<label for="<?php echo $item['id'] ?>">
						<?php echo esc_html_x( I18n::text( $item['title'] )->text, I18n::text( $item['title'] )->context, FLWGB_TEXT_DOMAIN ); ?>
					</label>

				</th>
				<td>

					<p><?php echo esc_html_x( I18n::text( 'you_can_use_this_tags_text' )->text, I18n::text( 'you_can_use_this_tags_text' )->context, FLWGB_TEXT_DOMAIN ); ?>
						<?php echo $item['tags'] ?> </p>

					<?php

					$template  = esc_html_x( I18n::text( $item['template'] )->text, I18n::text( $item['template'] )->context, FLWGB_TEXT_DOMAIN );
					$content   = get_option( $item['content'] ) ?: $template;
					$editor_id = $item['id'];
					$settings  = array( 'media_buttons' => false, 'wpautop' => false );

					wp_editor( $content, $editor_id, $settings );

					?>

				</td>
			</tr>

		<?php endforeach; ?>


	</table>

	<?php submit_button(); ?>

</form>
