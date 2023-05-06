<?php

namespace FLWGB;

class Options {
// Add the options page to the admin menu

	public function __construct() {
		add_action( 'admin_menu', [ $this, 'flwgb_options_page' ] );


// Register the options with their default values
		add_action( 'admin_init', [ $this, 'flwgb_register_settings' ] );

	}

	public function flwgb_options_page() {
		add_menu_page(
				'Frontend Login with Gutenberg Blocks',
				'Frontend Login',
				'manage_options',
				'frontend-login-with-gutenber-blocks-settings',
				[ $this, 'flwgb_settings_page_html' ],
				'dashicons-admin-generic'
		);
	}

	public function flwgb_register_settings() {
		register_setting( 'flwgb-settings-group', 'flwgb_redirect_after_logout', 'sanitize_text_field' );
		register_setting( 'flwgb-settings-group', 'flwgb_redirect_after_login', 'sanitize_text_field' );
	}

// Define the options page markup
	public function flwgb_settings_page_html() {
		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form method="post" action="options.php">
				<?php settings_fields( 'flwgb-settings-group' ); ?>
				<?php do_settings_sections( 'flwgb-settings-group' ); ?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php esc_html_x( 'Redirect After Logout', 'flwgb', 'frontend-login-with-gutenberg-blocks' ); ?></th>
						<td><input type="text" name="flwgb_redirect_after_logout"
								   value="<?php echo esc_attr( get_option( 'flwgb_redirect_after_logout' ) ); ?>"/></td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php esc_html_x( 'Redirect After Login', 'flwgb', 'frontend-login-with-gutenberg-blocks' ); ?></th>
						<td><input type="text" name="flwgb_redirect_after_login"
								   value="<?php echo esc_attr( get_option( 'flwgb_redirect_after_login' ) ); ?>"/></td>
					</tr>
				</table>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}

}

