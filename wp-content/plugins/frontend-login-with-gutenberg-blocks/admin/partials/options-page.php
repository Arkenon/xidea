<?php
/**
 * Provide an admin options page view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @since      1.0.0
 * @package    Frontend_Login_With_Gutenberg_Blocks
 * @subpackage Frontend_Login_With_Gutenberg_Blocks/admin/partials
 */

use FLWGB\Helper;
use FLWGB\I18n\I18n;

$default_tab = null;
$tab         = Helper::get( 'tab' ) ?? $default_tab;

?>

<!-- Our admin page content should all be inside .wrap -->
<div class="wrap">

	<!-- Print the page title -->
	<h1>
		<?php echo esc_html_x( get_admin_page_title(), 'Admin page title', FLWGB_TEXT_DOMAIN ); ?>
	</h1>

	<!-- Here are our tabs -->
	<nav class="nav-tab-wrapper">

		<a href="?page=frontend-login-with-gutenberg-blocks-settings"
		   class="nav-tab <?php if ( $tab === null ): ?>nav-tab-active<?php endif; ?>">
			<?php echo esc_html_x( I18n::text( 'admin_general_settings' )->text, I18n::text( 'admin_general_settings' )->context, FLWGB_TEXT_DOMAIN ); ?>
		</a>

		<a href="?page=frontend-login-with-gutenberg-blocks-settings&tab=mail-templates"
		   class="nav-tab <?php if ( $tab === 'mail-templates' ): ?>nav-tab-active<?php endif; ?>">
			<?php echo esc_html_x( I18n::text( 'admin_mail_settings' )->text, I18n::text( 'admin_mail_settings' )->context, FLWGB_TEXT_DOMAIN ); ?>
		</a>

		<a href="?page=frontend-login-with-gutenberg-blocks-settings&tab=limit-login"
		   class="nav-tab <?php if ( $tab === 'limit-login' ): ?>nav-tab-active<?php endif; ?>">
			<?php echo esc_html_x( I18n::text( 'limit_login_settings' )->text, I18n::text( 'limit_login_settings' )->context, FLWGB_TEXT_DOMAIN ); ?>
		</a>

	</nav>

	<div class="tab-content">

		<?php
		switch ( $tab ) :

			case 'mail-templates':
				Helper::print_view( "admin/partials/mail-template-settings.php" );
				break;

			case 'limit-login':
				Helper::print_view( "admin/partials/limit-login-settings.php" );
				break;

			default:
				Helper::print_view( "admin/partials/general-settings.php" );
				break;

		endswitch;
		?>

	</div>

</div>
