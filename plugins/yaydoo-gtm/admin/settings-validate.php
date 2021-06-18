<?php
/*
 * Yaydoo GTM - Validate Settings
 */

defined( 'ABSPATH' ) || exit;

function yaydoo_gtm_callback_validate_options( $input ) {
	// Header snippet
	if ( isset( $input['header_code_snippet'] ) ) {
		$input['header_code_snippet'] = esc_html( wp_unslash( $input['header_code_snippet'] ) );
	}

	// Body snippet
	if ( isset( $input['no_script_code_snippet'] ) ) {
		$input['no_script_code_snippet'] = esc_html( wp_unslash( $input['no_script_code_snippet'] ) );
	}

	return $input;
}
