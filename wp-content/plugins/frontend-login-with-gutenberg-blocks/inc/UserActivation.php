<?php

namespace FLWGB;

class UserActivation {
	public function logout_if_membership_not_activated( $log_out_url_slug, $lang = 'tr' ) {
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
}
