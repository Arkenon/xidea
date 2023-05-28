<?php

/**
 * General settings tab content for admin options page
 *
 *
 * @since      1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/admin/partials
 */

use FLWGB\Helper;
use FLWGB\I18n;

$pages = get_pages();

?>

<form method="post" action="options.php">

	<?php

	settings_fields( 'flwgb-general-settings-group' );
	do_settings_sections( 'flwgb-general-settings-group' );

	?>

	<table class="form-table">

		<tr>
			<th scope="row">

				<label for="flwgb_has_activation">
					<?php echo esc_html_x( I18n::$has_activation, 'Has user activation', FLWGB_PLUGIN_NAME ); ?>
				</label>

			</th>
			<td>

				<select name="flwgb_has_activation" id="flwgb_has_activation">

					<option value=""><?php echo esc_html_x( I18n::$select_text, "Select text", FLWGB_PLUGIN_NAME ) ?></option>
					<option value="yes" <?php echo get_option( 'flwgb_has_activation' ) === 'yes' ? "selected" : ""; ?>><?php echo esc_html_x( I18n::$yes_text, 'Yes text', FLWGB_PLUGIN_NAME ); ?></option>
					<option value="no" <?php echo get_option( 'flwgb_has_activation' ) === 'no' ? "selected" : ""; ?>><?php echo esc_html_x( I18n::$no_text, 'No text', FLWGB_PLUGIN_NAME ); ?></option>

				</select>

			</td>
		</tr>

		<tr>
			<th scope="row">

				<label for="flwgb_login_fail_message">
					<?php echo esc_html_x( I18n::$login_fail_message_label, 'Login fail label text', FLWGB_PLUGIN_NAME ); ?>
				</label>

			</th>
			<td>

				<?php
				$fail_message = get_option( 'flwgb_login_fail_message' ) ?:
						esc_html_x( I18n::$login_fail_message, 'Login fail message', FLWGB_PLUGIN_NAME ) ?>

				<textarea name="flwgb_login_fail_message" id="flwgb_login_fail_message" cols="80"
						  rows="10"><?php echo $fail_message ?></textarea>

			</td>
		</tr>

		<tr>
			<th>
				<hr>
			</th>
			<td>
				<hr>
			</td>
		</tr>
		<?php

		$selections = [
				[ 'option' => 'flwgb_redirect_after_login', 'translate_text' => I18n::$redirect_after_login ],
				[ 'option' => 'flwgb_redirect_after_registration', 'translate_text' => I18n::$redirect_after_register ],
				[ 'option' => 'flwgb_lost_password_page', 'translate_text' => I18n::$lost_password_page ],
				[ 'option' => 'flwgb_register_page', 'translate_text' => I18n::$registration_page ],
				[ 'option' => 'flwgb_activation_page', 'translate_text' => I18n::$activation_page ],
				[ 'option' => 'flwgb_user_settings_page', 'translate_text' => I18n::$user_settings_page ],
				[ 'option' => 'flwgb_terms_and_conditions_page', 'translate_text' => I18n::$terms_and_conditions_page ],
				[ 'option' => 'flwgb_privacy_policy_page', 'translate_text' => I18n::$privacy_policy_page ]
		];

		foreach ( $selections as $select ):

			?>

			<tr>
				<th scope="row">

					<label for="<?php echo $select['option']; ?>">
						<?php echo esc_html_x( $select['translate_text'], $select['translate_text'], FLWGB_PLUGIN_NAME ); ?>
					</label>

				</th>
				<td>

					<select name="<?php echo $select['option']; ?>" id="<?php echo $select['option']; ?>">

						<option value=""><?php echo esc_html_x( I18n::$select_text, "Select text", FLWGB_PLUGIN_NAME ) ?></option>

						<?php

						foreach ( $pages as $page ) {

							Helper::get_select_options_from_query( $page, $select['option'] );

						}

						?>

					</select>

				</td>
			</tr>

		<?php endforeach; ?>

	</table>

	<?php submit_button(); ?>

</form>
