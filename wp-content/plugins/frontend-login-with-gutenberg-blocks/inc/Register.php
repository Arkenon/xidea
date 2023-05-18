<?php
/**
 * Register operation methods, hooks and more.
 *
 * @since      1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/inc
 */
namespace FLWGB;

class Register {

	/**
	 * Registeration form html output
	 *
	 * @return string html result of register form
	 * @since 1.0.0
	 */
	public function register_form() {

		$frontend = new \FLWGB\Frontend();

		//Get register form html output from Frontend class
		return $frontend->get_register_form();
	}


	/**
	 * POST operation for registeration.
	 *
	 * @return string Result of registering operation
	 * @since 1.0.0
	 */
	public function sl_registeration_control( $activate = false, $activation_url = '', $logo_url = '', $lang = 'tr' ) {
		$error_password = $lang == 'tr' ? 'Şifreleriniz eşleşmiyor.' : 'Your passwords do not match.';
		if ( $activate ) {
			$success_message = $lang == 'tr' ? 'Üyeliğiniz başarıyla oluşturulmuştur. E-postanıza gönderilen onay linkine tıklayınız' : 'You have been sign up successfuly. Please clikck the membership activation link sent your e-mail.';
		} else {
			$success_message = $lang == 'tr' ? 'Üyeliğiniz başarıyla oluşturulmuştur. Üyelik bilgilerinizle giriş yapabilirsiniz.' : 'You have been sign up successfuly. You can sig in with your username and password.';
			echo "<meta http-equiv='refresh' content='0;url=" . site_url('hesabim') . "'>";
		}
		$error_message  = $lang == 'tr' ? ERROR_MESSAGE_TR : ERROR_MESSAGE_EN;
		$username_exist = $lang == 'tr' ? 'Bu kullanıcı adı kullanımda. Başka bir kullanıcı adı seçiniz...' : 'This username already exist.';
		$user_exist     = $lang == 'tr' ? 'Bu kullanıcı zaten sisteme kayıtlı!' : 'This user already exist.';
		if ( ( ! empty( $_POST['user_pass'] ) && ! empty( $_POST['user_pass_repeat'] ) ) && ( $_POST['user_pass'] != $_POST['user_pass_repeat'] ) ) {
			echo '<div class="alert alert-danger p-2">' . $error_password . '</div>';
		} else {
			$username = $_POST['username'];
			$email    = $_POST['user_email'];
			$password = $_POST['user_pass'];
			if ( ! username_exists( $username ) && ! email_exists( $email ) ) {
				$userdata = array(
					'user_login' => $username,
					'user_email' => $email,
					'user_pass'  => $password
				);
				$newuser  = wp_insert_user( $userdata );
				if ( ! is_wp_error( $newuser ) ) {
					$code = sha1( $newuser . time() );
					global $wpdb;
					$update = $wpdb->update( $wpdb->prefix . '_users', array(
						'ID'                  => $newuser,
						'user_activation_key' => $code
					), array( 'ID' => $newuser ) );
					if ( ! is_wp_error( $update ) ) {
						if ( $activate ) {
							$activation_link = $activation_url . '/activation?key=' . $code . '&user=' . $newuser;
							sl_activation_mail_template( $username, $email, $activation_link, $logo_url, $lang );
						} else {
							sl_new_member_mail_user_template( $username, $email, $logo_url, $lang );
						}
						sl_new_member_mail_admin_template( 'Admin', get_option( 'admin_email' ), $username, admin_url( 'users.php' ), $logo_url, $lang );
						echo '<div class="alert alert-success p-2">' . $success_message . '</div>';
					} else {
						echo '<div class="alert alert-danger p-2">' . $error_message . '</div>';
					}
				}
			} else {
				if ( username_exists( $username ) ) {
					echo '<div class="alert alert-danger p-2">' . $username_exist . '</div>';
				}
				if ( email_exists( $email ) ) {
					echo '<div class="alert alert-danger p-2">' . $user_exist . '</div>';
				}
			}
		}
	}
}
