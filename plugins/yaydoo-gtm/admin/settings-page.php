<?php
/*
 * Yaydoo GTM - Settings Page
 */

defined( 'ABSPATH' ) || exit;

function yaydoo_gtm_display_settings_page() {
	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// only users with `unfiltered_html` can edit scripts.
	if ( ! current_user_can( 'unfiltered_html' ) ) {
		echo '<p>' . esc_html( __( 'Sorry, only have read-only access to this page. Ask your administrator for assistance editing.', 'yaydoo-gtm' ) ) . '</p>';
	}
	?>

	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
			<?php
			// output security fields
			settings_fields( 'yaydoo_gtm_options' );
			// output setting sections
			do_settings_sections( 'yaydoo_gtm' );
			// submit button
			submit_button();
			?>
		</form>
	</div>

	<?php
}
