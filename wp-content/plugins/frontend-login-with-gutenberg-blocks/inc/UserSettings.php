<?php

namespace FLWGB;

class UserSettings {
	/*User settings*/
	public function sl_user_settings_form( $user_setting_page_url, $lang = 'tr' ) {
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
	public function sl_update_user_settings( $user_setting_page_url, $lang = 'tr' ) {
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

}
