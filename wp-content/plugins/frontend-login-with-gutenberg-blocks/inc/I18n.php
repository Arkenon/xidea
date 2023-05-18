<?php

namespace FLWGB;
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/inc
 */
class I18n {

	/*General translatable texts*/
	public static $hello = 'Hello';
	public static $general_error_message = 'Something went wrong. Please try again later.';
	public static $log_out = 'Logout';
	public static $go_to_user_dashboard = 'Go to User Dashboard';
	public static $email_input_text = 'E-mail or username';
	public static $password_input_text = 'Password';
	public static $user_input_text = 'Username';
	public static $password_again_input_text = 'Password Again';
	public static $remember_me_checkbox_text = 'Remember Me';

	/*Translatable texts for login operations*/
	public static $login_fail_message = 'Your username or password is wrong. Please try again...';

	public static $login_button_text = 'Login';
	public static $already_logged_in_message = 'You have already logged in.';

	/*Translatable texts for register operations*/
	public static $register_button_text = 'Register';
	public static $terms_and_conditions_text  = 'I have read and accept <a href="%s" target="_blank">terms and conditions</a> and <a href="%s" target="_blank">privacy policy</a>';
	public static $terms_and_conditions_validation  = 'Please check terms and conditions chechkbox';

	/*Translatable texts for reset password operations*/
	public static $reset_password_button_text = 'Lost Password';

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_flwgb_textdomain() {

		load_plugin_textdomain(
			FLWGB_PLUGIN_NAME,
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}


}
