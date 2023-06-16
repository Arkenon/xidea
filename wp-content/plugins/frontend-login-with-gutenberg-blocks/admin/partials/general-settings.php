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

	?>

	<table class="form-table">

		<tr>
			<th scope="row">

				<label for="flwgb_has_activation">
					<?php echo esc_html_x( I18n::text( 'has_activation' )->text, I18n::text( 'has_activation' )->context, FLWGB_TEXT_DOMAIN ); ?>
				</label>

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
					<?php echo esc_html_x( I18n::text( 'has_user_dashboard' )->text, I18n::text( 'has_user_dashboard' )->context, FLWGB_TEXT_DOMAIN ); ?>
				</label>

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
						'option'  => 'flwgb_redirect_after_login',
						'text'    => I18n::text( 'redirect_after_login' )->text,
						'context' => I18n::text( 'redirect_after_login' )->context,
				],
				[
						'option'  => 'flwgb_redirect_after_registration',
						'text'    => I18n::text( 'redirect_after_register' )->text,
						'context' => I18n::text( 'redirect_after_register' )->context,
				],
				[
						'option'  => 'flwgb_lost_password_page',
						'text'    => I18n::text( 'lost_password_page' )->text,
						'context' => I18n::text( 'lost_password_page' )->context,
				],
				[
						'option'  => 'flwgb_register_page',
						'text'    => I18n::text( 'registration_page' )->text,
						'context' => I18n::text( 'registration_page' )->context,
				],
				[
						'option'  => 'flwgb_activation_page',
						'text'    => I18n::text( 'activation_page' )->text,
						'context' => I18n::text( 'activation_page' )->context,
				],
				[
						'option'  => 'flwgb_user_settings_page',
						'text'    => I18n::text( 'user_settings_page' )->text,
						'context' => I18n::text( 'user_settings_page' )->context,
				],
				[
						'option'  => 'flwgb_terms_and_conditions_page',
						'text'    => I18n::text( 'terms_and_conditions_page' )->text,
						'context' => I18n::text( 'terms_and_conditions_page' )->context,
				],
				[
						'option'  => 'flwgb_privacy_policy_page',
						'text'    => I18n::text( 'privacy_policy_page' )->text,
						'context' => I18n::text( 'privacy_policy_page' )->context,
				]
		];

		foreach ( $selections as $select ):

			?>

			<tr>
				<th scope="row">

					<label for="<?php echo $select['option']; ?>">
						<?php echo esc_html_x( $select['text'], $select['context'], FLWGB_TEXT_DOMAIN ); ?>
					</label>

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

	</table>

	<?php submit_button(); ?>

</form>
