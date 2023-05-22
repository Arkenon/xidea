<?php

namespace FLWGB;

class MailTemplates {
	/*Member activation mail*/
	public function flwgb_activation_mail_template( $to, $mail, $url = "", $logo_url = "", $lang = "tr" ) {
		$hello      = $lang == 'tr' ? 'Merhaba' : 'Hello';
		$mail_title = $lang == 'tr' ? 'Üyelik işleminiz başarıyla tamamlandı. Üyeliğinizi aktifleştirmek için aşağıdaki bağlantıya tıklamanız gerekiyor.' : 'Your account has been created. To activate your account, please clikc the activation link below.';
		$subject    = $lang == 'tr' ? 'Üyelik Aktivasyonu' : 'Membership Activation';
		$button     = $lang == 'tr' ? 'Üyeliğini Aktifleştir' : 'Activate Your Account';
		$body       = '
	<div style="width: 25rem; border: 1px solid #ccc; padding: 10px;margin:0 auto; text-align: center;">
	<img src="' . $logo_url . '"  style="margin:0 auto; width:25rem;">
	<div>
	<p>' . $hello . ', ' . $to . '. ' . $mail_title . '</p>
	</div>
	<a href="' . $url . '" type="button" style="color:#fff;background-color:#007bff;border-color:#007bff; padding: 5px; border-radius: 3px; text-decoration:none; cursor:pointer;">' . $button . '</a>
	<p>' . get_option( 'admin_email' ) . ' | <a href="' . site_url() . '">' . get_option( 'blogname' ) . '</a></p>
	</div>
	';
		wp_mail( $mail, $subject, $body );
	}

	public function flwgb_new_member_mail_admin_template( $to, $mail, $username, $url = "", $logo_url = "", $lang = "tr" ) {
		$hello      = $lang == 'tr' ? 'Merhaba' : 'Hello';
		$mail_title = $lang == 'tr' ? 'Yeni bir üye kaydoldu. Üye adı: ' . $username : 'New member. Member name: ' . $username;
		$subject    = $lang == 'tr' ? 'Yeni Üye' : 'New Member';
		$button     = $lang == 'tr' ? 'Üyeleri Gör' : 'Show Users';
		$body       = '
	<div style="width: 25rem; border: 1px solid #ccc; padding: 10px;margin:0 auto; text-align: center;">
	<img src="' . $logo_url . '" style="margin:0 auto; width:25rem;">
	<div>
	<p>' . $hello . ', ' . $to . '. ' . $mail_title . '</p>
	</div>
	<a href="' . $url . '" type="button" style="color:#fff;background-color:#007bff;border-color:#007bff; padding: 5px; border-radius: 3px; text-decoration:none; cursor:pointer;">' . $button . '</a>
	<p>' . get_option( 'admin_email' ) . ' | <a href="' . site_url() . '">' . get_option( 'blogname' ) . '</a></p>
	</div>
	';
		wp_mail( $mail, $subject, $body );
	}

	public function flwgb_new_member_mail_user_template( $username, $mail, $logo_url = "", $lang = "tr" ) {
		$hello      = $lang == 'tr' ? 'Merhaba' : 'Hello';
		$mail_title = $lang == 'tr' ? 'Hoşgeldin, ' . $username . ' Üyelik işlemin başarıyla gerçekleşti. Siteye kullanıcı adın ve şifrenle giriş yapabilirsin.' : 'Welcome, ' . $username . 'Your account has been created successfuly. You can sign in with your username and password.';
		$subject    = $lang == 'tr' ? 'Hoşgeldiniz' : 'Welcome';
		$button     = $lang == 'tr' ? 'Siteye Git' : 'Go to Homepage';
		$body       = '
	<div style="width: 25rem; border: 1px solid #ccc; padding: 10px;margin:0 auto; text-align: center;">
	<img src="' . $logo_url . '" style="margin:0 auto; width:25rem;">
	<div>
	<p>' . $hello . ', ' . $username . '. ' . $mail_title . '</p>
	</div>
	<a href="' . site_url() . '" type="button" style="color:#fff;background-color:#007bff;border-color:#007bff; padding: 5px; border-radius: 3px; text-decoration:none; cursor:pointer;">' . $button . '</a>
	<p>' . get_option( 'admin_email' ) . ' | <a href="' . site_url() . '">' . get_option( 'blogname' ) . '</a></p>
	</div>
	';
		wp_mail( $mail, $subject, $body );
	}

	/*Send lost password mail*/
	public function flwgb_lost_password_mail( $lost_password_url, $lang = 'tr' ) {
		if ( get('reset') == 'request' ) {
			$mail          = $_POST['resetmail'];
			$user          = get_user_by( 'email', $mail );
			$user_id       = $user->ID;
			$username      = $user->user_login;
			$code          = sha1( $user_id . time() );
			$reset_link    = $lost_password_url . '/?reset=ok&key=' . $code . '&user=' . $user_id;
			$mailsend      = flwgb_reset_password_mail_template( $username, $mail, $reset_link, $lang );
			$error_message = $lang == 'tr' ? ERROR_MESSAGE_TR : ERROR_MESSAGE_EN;
			$reset_message = $lang == 'tr' ? 'Şifreni yenilemen için sana bir e-posta gönderdik. Lütfen e-posta kutunu kontrol et...' : 'We have sent you an e-mail. Please check your inbox...';
			if ( ! is_wp_error( $mailsend ) ) {
				update_user_meta( $user_id, 'sifremi-unuttum', $code );
				echo '<p class="alert alert-info">' . $reset_message . '</p>';
			} else {
				echo '<p class="alert alert-danger"><strong class="font-s-14">' . $error_message . '</strong></p>';
			}
		}
	}

	/*Lost password mail template*/
	public function flwgb_reset_password_mail_template( $to, $mail, $url = '', $lang = 'tr' ) {
		$mail_head  = $lang == 'tr' ? 'Şifrenizi değiştirmek için aşağıdaki bağlantıya tıklayınız...' : 'To change your password, please click link below...';
		$mail_title = $lang == 'tr' ? 'Şifre Değişikliği' : 'Reset Password';
		$hello      = $lang == 'tr' ? 'Merhaba' : 'Hello';
		$button     = $lang == 'tr' ? 'Şifre Değiştir' : 'Change Password';
		$body       = '
	<p>' . $hello . ', ' . $to . '. ' . $mail_head . '</p>
	</div>
	<a href="' . $url . '" type="button" style="color:#fff;background-color:#007bff;border-color:#007bff; padding: 5px; border-radius: 3px; text-decoration:none; cursor:pointer;">' . $button . '</a>
	<p>' . get_option( 'admin_email' ) . ' | <a href="' . site_url() . '">' . get_option( 'blogname' ) . '</a></p>
	</div>
	';
		wp_mail( $mail, $mail_title, $body );
	}

}
