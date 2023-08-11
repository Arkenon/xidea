<?php

/**
 * Limit login settings tab content for admin options page
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

	settings_fields( 'flwgb-limit-login-settings-group' );

	?>

	<table id="flwgb-admin-general-settings" class="form-table">

		<tr>
			<th scope="row">

				<label for="flwgb_enable_limit_login">
					<?php echo esc_html_x( I18n::text( 'enable_limit_login' )->text, I18n::text( 'enable_limit_login' )->context, FLWGB_TEXT_DOMAIN ); ?>
				</label>

				<p class="flwgb-admin-settings-description">
					<?php echo esc_html_x( I18n::text( 'enable_limit_login_description' )->text, I18n::text( 'enable_limit_login_description' )->context, FLWGB_TEXT_DOMAIN ); ?>
				</p>

			</th>
			<td>

				<select name="flwgb_enable_limit_login" id="flwgb_enable_limit_login">

					<option value=""><?php echo esc_html_x( I18n::text( 'select_text' )->text, I18n::text( 'select_text' )->context, FLWGB_TEXT_DOMAIN ) ?></option>
					<option value="yes" <?php echo get_option( 'flwgb_enable_limit_login' ) === 'yes' ? "selected" : ""; ?>><?php echo esc_html_x( I18n::text( 'yes_text' )->text, I18n::text( 'yes_text' )->context, FLWGB_TEXT_DOMAIN ); ?></option>
					<option value="no" <?php echo get_option( 'flwgb_enable_limit_login' ) === 'no' ? "selected" : ""; ?>><?php echo esc_html_x( I18n::text( 'no_text' )->text, I18n::text( 'no_text' )->context, FLWGB_TEXT_DOMAIN ); ?></option>

				</select>

			</td>
		</tr>

		<tr>
			<th scope="row">

				<label for="flwgb_limit_login_max_attempts">
					<?php echo esc_html_x( I18n::text( 'limit_login_max_attempt' )->text, I18n::text( 'limit_login_max_attempt' )->context, FLWGB_TEXT_DOMAIN ); ?>
				</label>

			</th>
			<td>

				<input type="number" name="flwgb_limit_login_max_attempts" id="flwgb_limit_login_max_attempts" value="<?php echo esc_attr(get_option( 'flwgb_limit_login_max_attempts' )); ?>">

			</td>
		</tr>

		<tr>
			<th scope="row">

				<label for="flwgb_limit_login_lockout_duration">
					<?php echo esc_html_x( I18n::text( 'limit_login_lockout_duration' )->text, I18n::text( 'limit_login_lockout_duration' )->context, FLWGB_TEXT_DOMAIN ); ?>
				</label>

			</th>
			<td>

				<input type="number" name="flwgb_limit_login_lockout_duration" id="flwgb_limit_login_lockout_duration" value="<?php echo esc_attr(get_option( 'flwgb_limit_login_lockout_duration' )); ?>">

			</td>
		</tr>

	</table>

	<?php submit_button(); ?>

</form>
