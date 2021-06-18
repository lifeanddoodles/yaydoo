<?php
/*
 * Yaydoo GTM - Admin Menu
 */

defined( 'ABSPATH' ) || exit;

add_action( 'admin_menu', 'yaydoo_gtm_add_sublevel_menu' );

function yaydoo_gtm_add_sublevel_menu() {
	add_submenu_page(
		'options-general.php',
		esc_html__( 'Yaydoo GTM Settings', 'yaydoo-gtm' ),
		esc_html__( 'Yaydoo GTM', 'yaydoo-gtm' ),
		'manage_options',
		'yaydoo_gtm',
		'yaydoo_gtm_display_settings_page'
	);
}
