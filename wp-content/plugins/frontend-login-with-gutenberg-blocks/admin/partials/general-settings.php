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

				<label for="flwgb_redirect_after_logout">
					<?php echo esc_html_x( I18n::$redirect_after_logout, 'Redirect Url text for logout', FLWGB_PLUGIN_NAME ); ?>
				</label>

			</th>
			<td>

				<select name="flwgb_redirect_after_logout" id="flwgb_redirect_after_logout">

					<?php

						foreach ( $pages as $page ) {

							Helper::get_select_options_from_query( $page, 'flwgb_redirect_after_logout' );

						}

					?>

				</select>

			</td>
		</tr>

		<tr>
			<th scope="row">

				<label for="flwgb_redirect_after_login">
					<?php echo esc_html_x( I18n::$redirect_after_login, 'Redirect Url text for login', FLWGB_PLUGIN_NAME ); ?>
				</label>

			</th>
			<td>

				<select name="flwgb_redirect_after_login" id="flwgb_redirect_after_login">

					<?php

						foreach ( $pages as $page ) {

							Helper::get_select_options_from_query( $page, 'flwgb_redirect_after_login' );

						}

					?>

				</select>

			</td>
		</tr>

	</table>

	<?php submit_button(); ?>

</form>
