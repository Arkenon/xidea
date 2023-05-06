<?php
/*
Helper Name: Simple Login
Author: Kadim Gültekin
Author URI: https://www.kadimgultekin.com
Description: Login and Registration Operations for Wordpress
Version: 1.0.0
*/

/*Definitions*/
define( "ERROR_MESSAGE_TR", "Bir hata oluştu. Daha sonra tekrar deneyin..." );
define( "ERROR_MESSAGE_EN", "An error occured. Please try again later..." );
/**/

/*Filter String for $_POST $_GET and $_REQUEST*/
function filter_request_string( $str ) {
	return is_array( $str ) ? array_map( 'filter_request_string', $str ) : htmlspecialchars( trim( $str ) );
}

/*Secure $_POST*/
function post( $name ) {
	$_POST = array_map( 'filter_request_string', $_POST );
	if ( isset( $_POST[ $name ] ) ) {
		return $_POST[ $name ];
	}else  {
		return null;
	}
}

/*Secure $_GET*/
function get( $name ) {
	$_GET = array_map( 'filter_request_string', $_GET );
	if ( isset( $_GET[ $name ] ) ) {
		return $_GET[ $name ];
	} else  {
		return null;
	}
}

/*Secure $_REQUEST*/
function request( $name ) {
	$_REQUEST = array_map( 'filter_request_string', $_REQUEST );
	if ( isset( $_REQUEST[ $name ] ) ) {
		return $_REQUEST[ $name ];
	} else {
		return null;
	}
}


/*Redirect after login*/
function sl_redirect_after_login() {
	return site_url( 'hesabim' );
}

add_filter( 'login_redirect', 'sl_redirect_after_login' );

/*Redirect after login failed*/
function sl_front_end_login_fail( $lang = 'tr' ) {
	$param = $lang == 'tr' ? '/?giris=hata' : '/?login=error';

	$referrer = $_SERVER['HTTP_REFERER'];
	if ( ! empty( $referrer ) && ! strstr( $referrer, 'wp-login' ) && ! strstr( $referrer, 'wp-admin' ) ) {
		if ( ! strstr( $referrer, $param ) ) {
			wp_redirect( $referrer . $param );
		} else {
			wp_redirect( $referrer );
		}
		exit;
	}
}

add_action( 'wp_login_failed', 'sl_front_end_login_fail' );

/*Logout*/
function sl_log_out() {
	if(!empty(get('sayfa') == 'cikis')){
		if ( ! is_user_logged_in() ) {
			wp_redirect( get_bloginfo( "url" ) );
			exit;
		}
		wp_logout();
		wp_redirect( get_bloginfo( "url" ) );
		exit;
	}
}

function logout_if_membership_not_activated( $log_out_url_slug, $lang = 'tr' ) {
	$message = $lang == 'tr' ? 'Üyeliğinizi aktifleştirmek için size gönderilen e-postadaki bağlantıya tıklayınız...' : 'Your account is not activated. Please activate your account via click the activation link sent your e-mail';
	if ( is_user_logged_in() ) {
		$current_user = wp_get_current_user();
		$ID           = $current_user->ID;
		global $wpdb;
		$userstatuscontrol = $wpdb->get_var( "SELECT user_status FROM $wpdb->users WHERE ID=$ID" );
		if ( $userstatuscontrol == 0 ) {
			echo '<div class="text-center"><p class="alert-danger mb-0 p-1">' . $message . '</p></div>';
			echo "<meta http-equiv='refresh' content='3;url=" . site_url() . "/" . $log_out_url_slug . "'>";
		}
	}
}

/*If already logged in show an alert*/
function sl_already_logged_in_alert( $log_out_url, $lang = 'tr' ) {
	if ( is_user_logged_in() ):
		$hello   = $lang == 'tr' ? 'Merhaba' : 'Hello';
		$message = $lang == 'tr' ? 'Zaten giriş yapmış görünüyorsun.' : 'You have already logged in.';
		$log_out = $lang == 'tr' ? 'Çıkış Yap' : 'Logout';
		global $user_login;

		$alert = '<div class="alert alert-warning">
			' . $hello . ' ' . $user_login . ',
            <br>
             <p>'.$message.'</p>
             <br>
            <a class="sl-btn btn btn-dark fw-bold" href="' . site_url( 'hesabim' ) . '">
              <i class="bi bi-person-circle"></i>  Kullanıcı Paneline Git</a>
            <br>
			<a class="sl-btn btn btn-primary mt-2" href="' . $log_out_url . '">
				<i class="bi bi-box-arrow-right"></i> ' . $log_out . '
            </a>
        </div>';

		return $alert;
	endif;


}

/*Login fail message*/
function sl_login_fail_message( $lang = 'tr' ) {
	$message = $lang == 'tr' ? 'Kullanıcı adı ya da şifre hatalı. Yeniden deneyin...' : 'Your username or password is wrong. Please try again...';
	if ( get('giris') == 'hata' || get('login') == 'error' ) {
		$message = '  <p class="alert alert-danger mb-4">
			' . $message . ';
        </p>';

		return $message;
	}
}

/*login form*/
function sl_login_form( $register_url, $lost_password_url, $log_out_url, $lang = 'tr' ) {
	$email_input    = $lang == 'tr' ? 'E-posta ya da kullanıcı adı' : 'E-mail or username';
	$password_input = $lang == 'tr' ? 'Şifre' : 'Password';
	$remember_me    = $lang == 'tr' ? 'Beni Hatırla' : 'Remember Me';
	$login_button   = $lang == 'tr' ? 'Giriş Yap' : 'Login';

	$form = '<div class="text-center">' .
			sl_already_logged_in_alert( $log_out_url ) .
			sl_login_fail_message( $lang )
			. '
    </div>';
	if ( ! is_user_logged_in() ) {
		$form = '<div class="border p-2 bg-white">
        <form name="loginform" id="loginform" action="' . wp_login_url( home_url() ) . '" method="post">
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="log" id="user_login"
                               placeholder="' . $email_input . '" required>
                        <div class="invalid-feedback">
							' . $email_input . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input class="form-control" type="password" name="pwd" id="user_pass"
                               placeholder="' . $password_input . '"
                               required>
                        <div class="invalid-feedback">
							' . $password_input . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="form-check">
                        <input id="keepme" name="rememberme" checked="checked" type="checkbox" class="form-check-input">
                        <label class="form-check-label" for="keepme">' . $remember_me . '</label>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="wp-submit" id="wp-submit"
                        class="btn btn-dark btn-block">' . $login_button . '</button>
				' . do_action( 'wp_login' ) . '
            </div>
            <div class="mt-2 text-center">
            <a href="' . $register_url . '">Kayıt Ol | </a>
            <a href="' . $lost_password_url . '">Şifremi Unuttum</a>
            </div>
        </form>
    </div>';
	}

	return $form;

}


/*Lost Password Form*/
function sl_lost_password_form( $lost_password_url, $lang = 'tr' ) {
	if ( get('reset') == 'ok' ) {
		$form = sl_reset_password_form( $lost_password_url, $lang );
	} else if ( get('reset') == 'complete' ) {
		$form = sl_reset_password_operation( $lang );
	} else {
		$mail_input = $lang == 'tr' ? 'E-posta adresinizi yazın' : 'Your e-mail address';
		sl_lost_password_mail( $lost_password_url, $lang );
		$form = sl_lost_password_form_template( $lost_password_url, $mail_input, $lang );
	}

	return $form;
}

/*Lost Password Form template*/
function sl_lost_password_form_template( $lost_password_url, $mail_input, $lang = 'tr' ) {
	return '    <div class="border p-2 bg-white">
        <form name="resetpassform" id="resetpassform" action="' . $lost_password_url . '?reset=request"
              method="post">
            <div class="form-row">
                <div class="col-12 mb-3">
                    <p></p>
                    <div class="input-group">
                        <input type="email" class="form-control" name="resetmail" id="resetmail"
                               placeholder="' . $mail_input . '"
                               required>
                        <div class="invalid-feedback">
							' . $mail_input . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="rest-submit" id="rest-submit"
                        class="btn btn-dark btn-block">Gönder</button>
            </div>
        </form>
    </div>';

}

/*Send lost password mail*/
function sl_lost_password_mail( $lost_password_url, $lang = 'tr' ) {
	if ( get('reset') == 'request' ) {
		$mail          = $_POST['resetmail'];
		$user          = get_user_by( 'email', $mail );
		$user_id       = $user->ID;
		$username      = $user->user_login;
		$code          = sha1( $user_id . time() );
		$reset_link    = $lost_password_url . '/?reset=ok&key=' . $code . '&user=' . $user_id;
		$mailsend      = sl_reset_password_mail_template( $username, $mail, $reset_link, $lang );
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
function sl_reset_password_mail_template( $to, $mail, $url = '', $lang = 'tr' ) {
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

/*Reset password if mail sent*/
function sl_reset_password_form_template( $reset_password_url, $lang = 'tr' ) {
	$password_input  = $lang == 'tr' ? 'Yeni şifrenizi yazınız' : 'Type your new password';
	$password_button = $lang == 'tr' ? 'Şifre Değiştir' : 'Reset Password';
	$form            = '<div class="border p-2">
        <form name="resetpassform2" id="resetpassform2"
              action="' . $reset_password_url . '?reset=complete" method="post">
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input type="password" class="form-control" name="resetpss" id="resetpss"
                               placeholder="' . $password_input . '" required>
                        <div class="invalid-feedback">
							' . $password_input . '
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="userid" value="' . get('user'). '">
            <button type="submit" name="rest-submit" id="rest-submit"
                    class="btn btn-dark btn-block">' . $password_button . '</button>
        </form>
    </div>';

	return $form;
}

function sl_reset_password_form( $reset_password_url, $lang = 'tr' ) {
	$code  = get('key');
	$user  = get('user');
	$code2 = get_user_meta( $user, 'sifremi-unuttum', true );
	if ( $code == $code2 ) {
		$form = sl_reset_password_form_template( $reset_password_url, $lang );
	} else {
		$form = '<p class="alert alert-danger"><strong class="font-s-14">Hatalı şifre yenileme linki...</strong></p>';
	}

	return $form;
}

function sl_reset_password_operation( $lang = 'tr' ) {
	if ( get('reset') == 'complete' ) {
		$success_message = $lang == 'tr' ? 'Şifreniz başarıyla değiştirildi. Yeniden giriş yapınız...' : 'Your password has been changed. Please sign in...';
		$error_message   = $lang == 'tr' ? ERROR_MESSAGE_TR : ERROR_MESSAGE_EN;
		$resetpass       = wp_update_user( array(
				'ID'        => $_POST['userid'],
				'user_pass' => wp_slash( $_POST['resetpss'] )
		) );
		delete_user_meta( intval( $_POST['userid'] ), 'sifremi-unuttum' );
		if ( ! is_wp_error( $resetpass ) ) {
			echo '<p class="alert alert-success">' . $success_message . '</p>';
		} else {
			echo '<p class="alert alert-danger"><strong class="font-s-14">' . $error_message . '</strong></p>';
		}
	}
}

/*User settings*/
function sl_user_settings_form( $user_setting_page_url, $lang = 'tr' ) {
	$current_user             = wp_get_current_user();
	$ID                       = $current_user->ID;
	$user_email               = $current_user->user_email;
	$first_name               = $current_user->first_name;
	$last_name                = $current_user->last_name;
	$mail_input               = $lang == 'tr' ? 'E-posta adresiniz' : 'Your e-mail';
	$password_input           = $lang == 'tr' ? 'Mevcut şifreniz' : 'Your current password';
	$new_password_input       = $lang == 'tr' ? 'Yeni şifreniz' : 'New password';
	$new_password_input_again = $lang == 'tr' ? 'Yeni şifreniz tekrar' : 'New password again';
	$button                   = $lang == 'tr' ? 'Güncelle' : 'Update';
	$name_input               = $lang == 'tr' ? 'Ad' : 'Name';
	$surname_input            = $lang == 'tr' ? 'Soyad' : 'Surname';

	return '
	'.sl_update_user_settings( $user_setting_page_url, $lang ).'
    <form method="POST" action="'.$user_setting_page_url.'">
        <input type="hidden" name="user_id" value="'.$ID.'">
        <div class="col-12 form-group">
            <input type="text" name="first_name" id="first_name" class="form-control" value="'.$first_name.'"
                   placeholder="'.$name_input.'"> <br>
        </div>
        <div class="col-12 form-group">
            <input type="text" name="last_name" id="last_name" class="form-control" value="'.$last_name.'"
                   placeholder="'.$surname_input.'"> <br>
        </div>
        <div class="col-12 form-group">
            <input type="text" name="user_email" id="user_email" class="form-control" value="'.$user_email.'"
                   placeholder="'.$mail_input.'"> <br>
        </div>
        <div class="col-12 form-group">
            <input type="password" name="old_pass" id="old_pass" class="form-control" value=""
                   placeholder="'.$password_input.'"> <br>
        </div>
        <div class="col-12 form-group">
            <input type="password" name="new_pass" id="new_pass" class="form-control" value=""
                   placeholder="'.$new_password_input.'"> <br>
        </div>
        <div class="col-12 form-group">
            <input type="password" name="new_pass_again" id="new_pass_again" class="form-control" value=""
                   placeholder="'.$new_password_input_again.'"> <br>
        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-secondary w-100">'.$button.'</button>
        </div>
    </form>';
}

/*User settings operations*/
function sl_update_user_settings( $user_setting_page_url, $lang = 'tr' ) {
	$error_old_password = $lang == 'tr' ? 'Mevcut şifreniz hatalı.' : 'Your current password is wrong.';
	$error_password     = $lang == 'tr' ? 'Şifreleriniz eşleşmiyor.' : 'Your passwords do not match.';
	$success_message    = $lang == 'tr' ? 'Bilgileriniz başarıyla güncellendi.' : 'Your profile is successfuly updated.';
	$error_message      = $lang == 'tr' ? ERROR_MESSAGE_TR : ERROR_MESSAGE_EN;
	if ( $_POST ) {
		$user_data = [
				'ID'         => $_POST['user_id'],
				'first_name' => $_POST['first_name'],
				'last_name'  => $_POST['last_name'],
				'user_email' => $_POST['user_email']
		];
		$update    = wp_update_user( $user_data );

		if ( ! is_wp_error( $update ) ) {
			if ( ! empty( $_POST['new_pass'] ) && ! empty( $_POST['new_pass_again'] ) ) {
				$user = get_user_by( 'ID', $_POST['user_id'] );
				if ( $user && wp_check_password( $_POST['old_pass'], $user->data->user_pass, $user->ID ) ) {
					if ( ( ! empty( $_POST['new_pass'] ) && ! empty( $_POST['new_pass_again'] ) ) && ( $_POST['new_pass'] != $_POST['new_pass_again'] ) ) {
						echo '<div class="alert alert-danger p-2">' . $error_password . '</div>';
					} else {
						wp_set_password( $_POST['new_pass'], $_POST['user_id'] );
						echo '<div class="alert alert-success p-2">' . $success_message . '</div>';
						echo "<meta http-equiv='refresh' content='1;url=" . $user_setting_page_url . "'>";
					}
				} else {
					echo '<div class="alert alert-danger p-2">' . $error_old_password . '</div>';
				}
			} else {
				echo '<div class="alert alert-success p-2">' . $success_message . '</div>';
				echo "<meta http-equiv='refresh' content='1;url=" . $user_setting_page_url . "'>";
			}
		} else {
			echo '<div class="alert alert-danger p-2">' . $error_message . '</div>';
		}
	}
}

/*Kayıt Kontrol ve Kaydet*/
function sl_registeration_control( $activate = false, $activation_url = '', $logo_url = '', $lang = 'tr' ) {
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

/*Member activation mail*/
function sl_activation_mail_template( $to, $mail, $url = "", $logo_url = "", $lang = "tr" ) {
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

function sl_new_member_mail_admin_template( $to, $mail, $username, $url = "", $logo_url = "", $lang = "tr" ) {
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

function sl_new_member_mail_user_template( $username, $mail, $logo_url = "", $lang = "tr" ) {
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

/*Registiration form*/
function sl_registeration_form( $terms_and_conditions_url, $privacy_policy_url, $activate = false, $logo_url = '', $activation_url = '', $lang = 'tr' ) {
	$user_input           = $lang == 'tr' ? 'Kullanıcı adınızı yazınız' : 'Your user name';
	$email_input          = $lang == 'tr' ? 'E-posta adresinizi yazınız' : 'Your e-mail';
	$password_input       = $lang == 'tr' ? 'Şifrenizi yazınız' : 'Your password';
	$password_input_again = $lang == 'tr' ? 'Şifrenizi yeniden yazınız' : 'Password again';
	$policy_text_tr       = '<a href="' . $terms_and_conditions_url . '" target="_blank">kulllanım koşullarını</a> ve <a href="' . $privacy_policy_url . '" target="_blank">gizlilik politikasını</a> okudum, kabul ediyorum.';
	$policy_text_en       = 'I have read and accept <a href="' . $terms_and_conditions_url . '" target="_blank">terms and conditions</a> and <a href="' . $privacy_policy_url . '" target="_blank">privacy policy</a>';
	$policy_message       = $lang == 'tr' ? 'Şartlar ve koşulları onaylamalısınız.' : 'Please check terms and conditions chechkbox';
	if ( $_POST ) {
		sl_registeration_control( $activate, $activation_url, $logo_url );
	}

	$form = '<div class="border p-2 bg-white">
        <form name="registerform" id="registerform" action="" method="post">
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="username" id="username"
                               placeholder="' . $user_input . '" required>
                        <div class="invalid-feedback">
							' . $user_input . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="user_email" id="user_email"
                               placeholder="' . $email_input . '" required>
                        <div class="invalid-feedback">
							' . $email_input . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input class="form-control" type="password" name="user_pass" id="user_pass"
                               placeholder="' . $password_input . '"
                               required>
                        <div class="invalid-feedback">
							' . $password_input . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <input class="form-control" type="password" name="user_pass_repeat" id="user_pass_repeat"
                               placeholder="' . $password_input_again . '"
                               required>
                        <div class="invalid-feedback">
							' . $password_input_again . '
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
						' . $policy_text_tr . '
                    </label>
                    <div class="invalid-feedback">
						' . $policy_message . '
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <button id="kayit-buton" class="btn btn-dark btn-block"
                        type="submit">Kayıt Ol</button>
            </div>
        </form>
    </div>';

	return $form;
}
