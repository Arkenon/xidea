<?php

/**
 * General settings tab content for admin options page
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

	settings_fields( 'flwgb-general-settings-group' );
	do_settings_sections( 'flwgb-general-settings-group' );

	?>

	<table class="form-table">

		<tr>
			<th scope="row">

				<label for="flwgb_redirect_after_logout">
					<?php echo esc_html_x( I18n::$redirect_after_logout, 'Redirect Url text for logout', FLWGB_PLUGIN_NAME ); ?>
				</label>

			</th>
			<td>

				<input type="text" name="flwgb_redirect_after_logout" id="flwgb_redirect_after_logout"
					   value="<?php echo esc_attr( get_option( 'flwgb_redirect_after_logout' ) ); ?>"/>

			</td>
		</tr>

		<tr>
			<th scope="row">

				<label for="flwgb_redirect_after_login">
					<?php echo esc_html_x( I18n::$redirect_after_login, 'Redirect Url text for login', FLWGB_PLUGIN_NAME ); ?>
				</label>

			</th>
			<td>

				<input type="text" name="flwgb_redirect_after_login" id="flwgb_redirect_after_login"
					   value="<?php echo esc_attr( get_option( 'flwgb_redirect_after_login' ) ); ?>"/>

			</td>
		</tr>

	</table>

	<?php submit_button(); ?>

</form>
