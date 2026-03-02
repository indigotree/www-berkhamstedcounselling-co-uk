<?php
declare(strict_types=1);

namespace IndigoTree\Site\Settings;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Register theme settings page.
 *
 * @return void
 */
function add_settings_page(): void {
	add_theme_page(
		__( 'Site settings', 'indigotree-site-core' ),
		__( 'Site settings', 'indigotree-site-core' ),
		'manage_options',
		'theme-settings',
		function () {
			?>
			<div class="wrap">
				<h1><?php _e( 'Site settings', 'indigotree-site-core' ); ?></h1>
				<form method="post" action="options.php">
					<?php
					settings_fields( 'indigotree_theme_settings_group' );
					do_settings_sections( 'site-settings' );
					submit_button();
					?>
				</form>
			</div>
			<?php
		}
	);

	register_setting( 'indigotree_theme_settings_group', 'copyright_notice' );

	add_settings_section(
		'general_section',
		__( 'General settings', 'indigotree-site-core' ),
		function () {
			echo '<p>' . __( 'Settings related to general options.', 'indigotree-site-core' ) . '</p>';
		},
		'site-settings'
	);

	add_settings_field(
		'copyright_notice',
		__( 'Copyright notice', 'indigotree-site-core' ),
		function () {
			$notice = get_option( 'copyright_notice' );
			?>
			<p><?php _e( 'Variables: %1$s - copyright symbol, %2$s - current year, %3$s - site name from settings. Example: Copyright %1$s %2$s %3$s, all rights reserved', 'indigotree-site-core' ); ?></p>
			<input type="text" name="copyright_notice" class="large-text" placeholder="<?php echo esc_attr(
				sprintf(
					'%1$s',
					\IndigoTree\Site\Bindings\site_copyright_source()
				)
			); ?>" value="<?php echo esc_attr( $notice ); ?>">
			<?php
		},
		'site-settings',
		'general_section'
	);
}
