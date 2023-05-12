<?php
/**
 * Provide an admin options page view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @since      1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/admin/partials
 */
?>

<div class="wrap">
	<h1><?php echo esc_html_x( get_admin_page_title(), 'Admin page title', FLWGB_PLUGIN_NAME ); ?></h1>
	<form method="post" action="options.php">
		<?php settings_fields( 'flwgb-settings-group' ); ?>
		<?php do_settings_sections( 'flwgb-settings-group' ); ?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><?php echo esc_html_x( 'Redirect After Logout', 'Redirect Url text for logout', FLWGB_PLUGIN_NAME ); ?></th>
				<td><input type="text" name="flwgb_redirect_after_logout"
				           value="<?php echo esc_attr( get_option( 'flwgb_redirect_after_logout' ) ); ?>"/></td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php echo esc_html_x( 'Redirect After Login', 'Redirect Url text for login', FLWGB_PLUGIN_NAME ); ?></th>
				<td><input type="text" name="flwgb_redirect_after_login"
				           value="<?php echo esc_attr( get_option( 'flwgb_redirect_after_login' ) ); ?>"/></td>
			</tr>
		</table>
		<?php submit_button(); ?>
	</form>
</div>


