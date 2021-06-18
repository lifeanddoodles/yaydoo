<?php
/*
 * Yaydoo GTM - Settings Callbacks
 */

defined( 'ABSPATH' ) || exit;

function yaydoo_gtm_callback_section_admin() {
	echo '<p>' . esc_html__( 'Setup the Google Tag Manager and install it by pasting the generated code snippets below.', 'yaydoo-gtm' ) . '</p>';
}

function yaydoo_gtm_callback_field_textarea( $args ) {
	$options      = get_option( 'yaydoo_gtm_options' );
	$id           = isset( $args['id'] ) ? $args['id'] : '';
	$label        = isset( $args['label'] ) ? $args['label'] : '';
	$allowed_tags = array(
		'script'   => array(),
		'noscript' => array(),
		'iframe'   => array(
			'src'    => array(),
			'height' => array(),
			'width'  => array(),
			'style'  => array(
				'display'  => array(),
				'visibility'  => array(),
			),
		),
	);
	$value = isset( $options[ $id ] ) ? $options[ $id ] : '';

	echo '<label for="yaydoo_gtm_options_' . esc_attr( $id ) . '">' . esc_html( $label ) . '</label><br />';
	echo '<textarea id="yaydoo_gtm_options_' . esc_attr( $id ) . '" name="yaydoo_gtm_options[' . esc_attr( $id ) . ']" rows="5" cols="50">' . wp_kses( $value, $allowed_tags ) . '</textarea>';
}
