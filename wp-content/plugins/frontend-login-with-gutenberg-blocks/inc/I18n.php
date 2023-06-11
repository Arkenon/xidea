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
	public static $hello_text = 'Hello';
	public static $select_text = 'Please select...';
	public static $yes_text = 'Yes';
	public static $no_text = 'No';
	public static $loading_text = 'Please wait...';
	public static $general_error_message = 'Something went wrong. Please try again later.';
	public static $general_success_message = 'Operation has completed successfully.';
	public static $log_out = 'Logout';
	public static $submit = 'Submit';
	public static $go_to_user_dashboard = 'Go to User Dashboard';
	public static $email_input_text = 'Your e-mail';
	public static $email_placeholder_text = 'Enter your e-mail';
	public static $user_input_text = 'Username';
	public static $password_again_input_text = 'Password Again';

	/*Admin options page texts*/
	public static $admin_general_settings = 'General Settings';
	public static $admin_mail_settings = 'E-Mail Templates';
	public static $redirect_after_login = 'Redirect Page After Login';
	public static $redirect_after_register = 'Redirect Page After Registration';
	public static $register_mail_to_user = 'Register Mail Template to User';
	public static $register_mail_to_admin = 'Register Mail Template to Admin';
	public static $lost_password_page = 'Lost (Reset) Password Page';
	public static $registration_page = 'Registration Page';
	public static $activation_page = 'User Activation Page';
	public static $user_settings_page = 'User Settings Page';
	public static $terms_and_conditions_page = 'Terms and Conditions Page';
	public static $privacy_policy_page = 'Privacy Policy Page';
	public static $has_activation = 'Enable user activation';
	public static $has_user_dashboard = 'Enable user dashboard';


	/*Translatable texts for login operations*/
	public static $login_button_text = 'Login';
	public static $already_logged_in_message = 'You have already logged in.';
	public static $email_or_username_input_text = 'Username or E-mail';
	public static $email_or_username_placeholder_text = 'Enter your username or e-mail';
	public static $password_input_text = 'Password';
	public static $password_placeholder_text = 'Enter your password';
	public static $remember_me_text = 'Remember me';
	public static $invalid_username_or_pass = 'Invalid username or password.';
	public static $login_successful = 'You have successfully logged in...';
	public static $user_not_activated = 'Please activate your account. We sent you an email. Click the activation link in the email.';

	/*Translatable texts for register operations*/
	public static $register_button_text = 'Register';
	public static $terms_and_conditions_text = 'I have read and accept <a href="%s" target="_blank">terms and conditions</a> and <a href="%s" target="_blank">privacy policy</a>';
	public static $terms_and_conditions_validation = 'Please check terms and conditions chechkbox';
	public static $password_match_error = 'Your passwords do not match';
	public static $register_succession_with_activation = 'You have been sign up successfuly. Please clikck the membership activation link sent your e-mail.';
	public static $register_succession = 'You have been sign up successfuly. You can sign in with your username and password.';
	public static $username_exist_error = 'This username already exist.';
	public static $user_exist_error = 'This user already exist.';

	/*Translatable texts for reset password operations*/
	public static $reset_password_button_text = 'Lost Password';
	public static $submit_reset_password_button_text = 'Change Password';
	public static $wrong_reset_password_link = 'Wrong reset password link. Please check your reset link sent to your e-mail address or send a new request.';
	public static $reset_password_request_confirmation = 'We have successfully get your request. We have sent you an e-mail. Please check your inbox...';
	public static $password_changed = 'Your password has been changed. Please sign in...';
	public static $reset_password_request_input_text = 'Please sumbit your e-mail to get reset password link.';
	public static $send_reset_request = 'Send Request';
	public static $send_reset_request_description = 'Please enter your e-mail address. We will send you an e-mail to reset your password.';


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
