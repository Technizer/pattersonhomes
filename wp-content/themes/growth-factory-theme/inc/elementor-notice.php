<?php
/** Native WordPress installation/activation links; never auto-installs plugins. @package Growth_Factory_Theme */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function growth_factory_theme_elementor_notice() {
	if ( did_action( 'elementor/loaded' ) || ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}
	// Respect per-user dismissal; show it again after a future theme activation.
	if ( get_user_meta( get_current_user_id(), 'growth_factory_elementor_notice_dismissed', true ) ) {
		return;
	}
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
	$plugin = 'elementor/elementor.php';
	$installed = array_key_exists( $plugin, get_plugins() );
	$url = '';
	$label = '';
	if ( $installed && ! is_plugin_active( $plugin ) && current_user_can( 'activate_plugin', $plugin ) ) {
		$url = wp_nonce_url( add_query_arg( array( 'action' => 'activate', 'plugin' => $plugin ), admin_url( 'plugins.php' ) ), 'activate-plugin_' . $plugin );
		$label = __( 'Activate Elementor', 'growth-factory-theme' );
	} elseif ( ! $installed && current_user_can( 'install_plugins' ) ) {
		$url = wp_nonce_url( add_query_arg( array( 'action' => 'install-plugin', 'plugin' => 'elementor' ), self_admin_url( 'update.php' ) ), 'install-plugin_elementor' );
		$label = __( 'Install Elementor', 'growth-factory-theme' );
	}
	$dismiss = wp_nonce_url( admin_url( 'admin-post.php?action=growth_factory_dismiss_elementor' ), 'growth_factory_dismiss_elementor' );
	?>
	<div class="notice notice-info">
		<p><strong><?php esc_html_e( 'Welcome to Growth Factory Theme', 'growth-factory-theme' ); ?></strong></p>
		<p><?php esc_html_e( 'This theme is built for Elementor. Install and activate the free Elementor Website Builder plugin to start designing your website.', 'growth-factory-theme' ); ?></p>
		<p>
			<?php if ( $url ) : ?><a class="button button-primary" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a><?php endif; ?>
			<a class="button" href="<?php echo esc_url( $dismiss ); ?>"><?php esc_html_e( 'Dismiss this notice', 'growth-factory-theme' ); ?></a>
		</p>
	</div>
	<?php
}
add_action( 'admin_notices', 'growth_factory_theme_elementor_notice' );

function growth_factory_theme_dismiss_elementor_notice() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'You are not allowed to perform this action.', 'growth-factory-theme' ) );
	}
	check_admin_referer( 'growth_factory_dismiss_elementor' );
	update_user_meta( get_current_user_id(), 'growth_factory_elementor_notice_dismissed', 1 );
	wp_safe_redirect( admin_url( 'themes.php' ) );
	exit;
}
add_action( 'admin_post_growth_factory_dismiss_elementor', 'growth_factory_theme_dismiss_elementor_notice' );

function growth_factory_theme_reset_elementor_notice() {
	delete_user_meta( get_current_user_id(), 'growth_factory_elementor_notice_dismissed' );
}
add_action( 'after_switch_theme', 'growth_factory_theme_reset_elementor_notice' );
