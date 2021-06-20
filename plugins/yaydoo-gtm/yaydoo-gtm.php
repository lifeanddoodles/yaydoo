<?php
/*
 * Plugin Name: Yaydoo GTM
 * Plugin URI:	https://yaydoo.com/
 * Description: Add Google Tag Manager.
 * Version:		 1.0
 * Author:			Sandra Vargas
 * Author URI:	https://yaydoo.com/
 * License:		 GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: yaydoo-gtm
 * Domain Path: /languages
 */

defined( 'ABSPATH' ) || exit;

define( 'YAYDOO_GTM_PLUGIN_FILE', __FILE__ );

if ( is_admin() ) {
	require_once plugin_dir_path( YAYDOO_GTM_PLUGIN_FILE ) . 'admin/admin-menu.php';
	require_once plugin_dir_path( YAYDOO_GTM_PLUGIN_FILE ) . 'admin/settings-page.php';
	require_once plugin_dir_path( YAYDOO_GTM_PLUGIN_FILE ) . 'admin/settings-register.php';
	require_once plugin_dir_path( YAYDOO_GTM_PLUGIN_FILE ) . 'admin/settings-callbacks.php';
	require_once plugin_dir_path( YAYDOO_GTM_PLUGIN_FILE ) . 'admin/settings-validate.php';
}

/**
 * Insert Google Tag Manager's code snippet in the header.
 */
add_action( 'wp_head', 'yaydoo_gtm_insert_code_header' );

function yaydoo_gtm_insert_code_header() {
	// Insert functionality to add Google Tag Manager
	output_snippet( 'header_code_snippet' );
}

/**
 * Insert Google Tag Manager's code snippet when no script is true.
 */
add_action( 'wp_body_open', 'yaydoo_gtm_insert_code_no_script' );
add_action( 'wp_footer', 'yaydoo_gtm_insert_code_no_script' );

function yaydoo_gtm_insert_code_no_script() {
	// If wp_body_open hook is available, remove wp_footer (initially added for backward compatibility)
	if ( doing_action( 'wp_body_open' ) ) {
		remove_action( 'wp_footer', 'yaydoo_gtm_insert_code_no_script' );
	}
	output_snippet( 'no_script_code_snippet' );
}

// Whitelist safe CSS attributes
function yaydoo_safe_css_attributes( $array ) {
	$array[] = 'display';
	$array[] = 'visibility';
	return $array;
}

// Remove CSS attributes from the whitelist
function yaydoo_remove_safe_css_attributes( $array ) {
	unset( $array['display'] );
	unset( $array['visibility'] );
	return $array;
}

function output_snippet( $setting_option ) {
	$options = get_option( 'yaydoo_gtm_options' );
	// Get textarea info
	$meta = $options[ $setting_option ];
	if ( empty( $meta ) ) {
		return;
	}
	if ( trim( $meta ) === '' ) {
		return;
	}

	$allowed_html = array(
		'script'   => array(),
		'noscript' => array(),
		'iframe'   => array(
			'src'    => array(),
			'height' => array(),
			'width'  => array(),
			'style'  => array(),
		),
	);

	// Telling WordPress about safe CSS attributes
	add_filter( 'safe_style_css', 'yaydoo_safe_css_attributes' );
	// Output
	echo wp_kses( html_entity_decode( $meta, ENT_QUOTES ), $allowed_html );
	// Remove custom safe CSS attributes
	add_filter( 'safe_style_css', 'yaydoo_remove_safe_css_attributes' );
}

/**
 * Activate the plugin.
 */
function yaydoo_gtm_activate() {
	// Insert functionality for when you activate the plugin
}
register_activation_hook( YAYDOO_GTM_PLUGIN_FILE, 'yaydoo_gtm_activate' );

/**
 * Deactivation hook.
 */
function yaydoo_gtm_deactivate() {
	// Cleanup after plugin has been removed
}
register_deactivation_hook( __FILE__, 'yaydoo_gtm_deactivate' );
