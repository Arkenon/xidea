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

use FLWGB\I18n;

$default_tab = null;
$tab         = get( 'tab' ) ?? $default_tab;

?>

<!-- Our admin page content should all be inside .wrap -->
<div class="wrap">

	<!-- Print the page title -->
	<h1>
		<?php echo esc_html_x( get_admin_page_title(), 'Admin page title', FLWGB_PLUGIN_NAME ); ?>
	</h1>

	<!-- Here are our tabs -->
	<nav class="nav-tab-wrapper">

		<a href="?page=frontend-login-with-gutenberg-blocks-settings"
		   class="nav-tab <?php if ( $tab === null ): ?>nav-tab-active<?php endif; ?>">
			<?php echo esc_html_x( I18n::$admin_general_settings, 'Admin page general settings', FLWGB_PLUGIN_NAME ); ?>
		</a>

		<a href="?page=frontend-login-with-gutenberg-blocks-settings&tab=mail-templates"
		   class="nav-tab <?php if ( $tab === 'mail-templates' ): ?>nav-tab-active<?php endif; ?>">
			<?php echo esc_html_x( I18n::$admin_mail_settings, 'Admin page mail settings', FLWGB_PLUGIN_NAME ); ?>
		</a>

	</nav>

	<div class="tab-content">

		<?php
			switch ( $tab ) :

				case 'mail-templates':
					print_view( "admin/partials/mail-template-settings.php" );
					break;

				default:
					print_view( "admin/partials/general-settings.php" );
					break;

			endswitch;
		?>

	</div>

</div>
