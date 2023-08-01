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
use FLWGB\I18n\I18n;

$pages = get_pages();

?>

<form method="post" action="options.php">

	<?php

	settings_fields( 'flwgb-general-settings-group' );
	do_settings_sections( 'flwgb-general-settings-group' );

	settings_fields( 'flwgb-limit-login-settings-group' );
	do_settings_sections( 'flwgb-limit-login-settings-group' );

	?>

	<table id="flwgb-admin-general-settings" class="form-table">

		<tr>
			<th scope="row">

				<label for="flwgb_has_activation">
					<?php echo esc_html_x( I18n::text( 'has_activation' )->text, I18n::text( 'has_activation' )->context, FLWGB_TEXT_DOMAIN ); ?>
				</label>

				<p class="flwgb-admin-settings-description">
					<?php echo esc_html_x( I18n::text( 'has_activation_description' )->text, I18n::text( 'has_activation_description' )->context, FLWGB_TEXT_DOMAIN ); ?>
				</p>

			</th>
			<td>

				<select name="flwgb_has_activation" id="flwgb_has_activation">

					<option value=""><?php echo esc_html_x( I18n::text( 'select_text' )->text, I18n::text( 'select_text' )->context, FLWGB_TEXT_DOMAIN ) ?></option>
					<option value="yes" <?php echo get_option( 'flwgb_has_activation' ) === 'yes' ? "selected" : ""; ?>><?php echo esc_html_x( I18n::text( 'yes_text' )->text, I18n::text( 'yes_text' )->context, FLWGB_TEXT_DOMAIN ); ?></option>
					<option value="no" <?php echo get_option( 'flwgb_has_activation' ) === 'no' ? "selected" : ""; ?>><?php echo esc_html_x( I18n::text( 'no_text' )->text, I18n::text( 'no_text' )->context, FLWGB_TEXT_DOMAIN ); ?></option>

				</select>

			</td>
		</tr>

		<tr>
			<th scope="row">

				<label for="flwgb_has_user_dashboard">
					<?php echo esc_html_x( I18n::text( 'has_user_settings' )->text, I18n::text( 'has_user_settings' )->context, FLWGB_TEXT_DOMAIN ); ?>
				</label>

				<p class="flwgb-admin-settings-description">
					<?php echo esc_html_x( I18n::text( 'has_user_settings_description' )->text, I18n::text( 'has_user_settings_description' )->context, FLWGB_TEXT_DOMAIN ); ?>
				</p>

			</th>
			<td>

				<select name="flwgb_has_user_dashboard" id="flwgb_has_user_dashboard">

					<option value=""><?php echo esc_html_x( I18n::text( 'select_text' )->text, I18n::text( 'select_text' )->context, FLWGB_TEXT_DOMAIN ) ?></option>
					<option value="yes" <?php echo get_option( 'flwgb_has_user_dashboard' ) === 'yes' ? "selected" : ""; ?>><?php echo esc_html_x( I18n::text( 'yes_text' )->text, I18n::text( 'yes_text' )->context, FLWGB_TEXT_DOMAIN ); ?></option>
					<option value="no" <?php echo get_option( 'flwgb_has_user_dashboard' ) === 'no' ? "selected" : ""; ?>><?php echo esc_html_x( I18n::text( 'no_text' )->text, I18n::text( 'no_text' )->context, FLWGB_TEXT_DOMAIN ); ?></option>

				</select>

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
				[
						'option'  => 'flwgb_login_page',
						'text'    => I18n::text( 'login_page' ),
						'description' => I18n::text( 'login_page_description' ),
				],
				[
						'option'      => 'flwgb_redirect_after_login',
						'text'        => I18n::text( 'redirect_page_after_login' ),
						'description' => I18n::text( 'redirect_page_after_login_description' ),
				],
				[
						'option'  => 'flwgb_lost_password_page',
						'text'    => I18n::text( 'lost_password_page'),
				],
				[
						'option'  => 'flwgb_register_page',
						'text'    => I18n::text( 'registration_page' ),
				],
				[
						'option'  => 'flwgb_activation_page',
						'text'    => I18n::text( 'activation_page' ),
						'description' => I18n::text( 'activation_page_description' ),
				],
				[
						'option'  => 'flwgb_user_settings_page',
						'text'    => I18n::text( 'user_settings_page' ),
						'description' => I18n::text( 'user_settings_page_description' ),
				],
				[
						'option'  => 'flwgb_terms_and_conditions_page',
						'text'    => I18n::text( 'terms_and_conditions_page' ),
				],
				[
						'option'  => 'flwgb_privacy_policy_page',
						'text'    => I18n::text( 'privacy_policy_page' ),
				]
		];

		foreach ( $selections as $select ):

			?>

			<tr>
				<th scope="row">

					<label for="<?php echo $select['option']; ?>">
						<?php echo esc_html_x( $select['text']->text, $select['text']->context, FLWGB_TEXT_DOMAIN ); ?>
					</label>

					<p class="flwgb-admin-settings-description">
						<?php echo esc_html_x( $select['description']->text, $select['description']->context, FLWGB_TEXT_DOMAIN ); ?>
					</p>

				</th>
				<td>

					<select name="<?php echo $select['option']; ?>" id="<?php echo $select['option']; ?>">

						<option value=""><?php echo esc_html_x( I18n::text( 'select_text' )->text, I18n::text( 'select_text' )->context, FLWGB_TEXT_DOMAIN ) ?></option>

						<?php

						foreach ( $pages as $page ) {

							Helper::get_select_options_from_query( $page, $select['option'] );

						}

						?>

					</select>

				</td>
			</tr>

		<?php endforeach; ?>

		<tr>
			<th>
				<hr>
			</th>
			<td>
				<hr>
			</td>
		</tr>

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

				<label for="flwgb_limit_login_max_attempt">
					<?php echo esc_html_x( I18n::text( 'limit_login_max_attempt' )->text, I18n::text( 'limit_login_max_attempt' )->context, FLWGB_TEXT_DOMAIN ); ?>
				</label>

			</th>
			<td>

				<input type="number" name="flwgb_limit_login_max_attempt" id="flwgb_limit_login_max_attempt" value="<?php echo get_option( 'flwgb_limit_login_max_attempt' ); ?>">

			</td>
		</tr>

		<tr>
			<th scope="row">

				<label for="flwgb_limit_login_lockout_duration">
					<?php echo esc_html_x( I18n::text( 'limit_login_lockout_duration' )->text, I18n::text( 'limit_login_lockout_duration' )->context, FLWGB_TEXT_DOMAIN ); ?>
				</label>

			</th>
			<td>

				<input type="number" name="flwgb_limit_login_lockout_duration" id="flwgb_limit_login_lockout_duration" value="<?php echo get_option( 'flwgb_limit_login_lockout_duration' ); ?>">

			</td>
		</tr>

	</table>

	<?php submit_button(); ?>

</form>
