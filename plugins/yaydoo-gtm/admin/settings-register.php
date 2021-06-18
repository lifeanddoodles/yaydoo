<?php
/*
 * Yaydoo GTM - Register Settings
 */

defined( 'ABSPATH' ) || exit;

add_action( 'admin_init', 'yaydoo_gtm_register_settings' );

function yaydoo_gtm_register_settings() {
	register_setting(
		'yaydoo_gtm_options',
		'yaydoo_gtm_options',
		'yaydoo_gtm_callback_validate_options'
	);

	add_settings_section(
		'yaydoo_gtm_section_admin',
		esc_html__( 'Google Tag Manager Snippets', 'yaydoo-gtm' ),
		'yaydoo_gtm_callback_section_admin',
		'yaydoo_gtm'
	);

	add_settings_field(
		'header_code_snippet',
		esc_html__( 'Header', 'yaydoo-gtm' ),
		'yaydoo_gtm_callback_field_textarea',
		'yaydoo_gtm',
		'yaydoo_gtm_section_admin',
		array(
			'id'    => 'header_code_snippet',
			'label' => esc_html__( 'Paste the code snippet indicated to be placed as high in the <head> of the page as possible.', 'yaydoo-gtm' ),
		)
	);

	add_settings_field(
		'no_script_code_snippet',
		esc_html__( 'Body', 'yaydoo-gtm' ),
		'yaydoo_gtm_callback_field_textarea',
		'yaydoo_gtm',
		'yaydoo_gtm_section_admin',
		array(
			'id'    => 'no_script_code_snippet',
			'label' => esc_html__( 'Paste the code snippet indicated to be placed immediately after the opening <body> tag.', 'yaydoo-gtm' ),
		)
	);
}
