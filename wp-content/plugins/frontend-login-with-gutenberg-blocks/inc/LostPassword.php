<?php

namespace FLWGB;

class LostPassword {
	/*Lost Password Form*/
	public function sl_lost_password_form( $lost_password_url, $lang = 'tr' ) {
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
	public function sl_lost_password_form_template( $lost_password_url, $mail_input, $lang = 'tr' ) {
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


	/*Reset password if mail sent*/
	public function sl_reset_password_form_template( $reset_password_url, $lang = 'tr' ) {
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

	public function sl_reset_password_form( $reset_password_url, $lang = 'tr' ) {
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

	public function sl_reset_password_operation( $lang = 'tr' ) {
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
}
