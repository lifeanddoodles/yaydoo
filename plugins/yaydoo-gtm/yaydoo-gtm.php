<?php
/*
 * Plugin Name: Yaydoo GTM
 * Plugin URI:  https://yaydoo.com/
 * Description: Add Google Tag Manager.
 * Version:     1.0
 * Author:      Sandra Vargas
 * Author URI:  https://yaydoo.com/
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: yaydoo-gtm
 * Domain Path: /languages
 */

defined( 'ABSPATH' ) || exit;

define( 'YAYDOO_GTM_PLUGIN_FILE', __FILE__ );

/**
 * Activate the plugin.
 */
function yaydoo_gtm_activate() {
	// Insert functionality to add GTM
}
register_activation_hook( YAYDOO_GTM_PLUGIN_FILE, 'yaydoo_gtm_activate' );

/**
 * Deactivation hook.
 */
function yaydoo_gtm_deactivate() {
	// Cleanup after plugin has been removed
}
register_deactivation_hook( __FILE__, 'yaydoo_gtm_deactivate' );
