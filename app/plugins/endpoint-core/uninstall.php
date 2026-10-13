<?php
/**
 * Endpoint Core uninstall routine.
 *
 * Content is preserved by default. Define ENDPOINT_CORE_REMOVE_DATA as true in
 * wp-config.php before uninstalling to explicitly remove plugin-owned data.
 *
 * @package EndpointCore
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

if ( ! defined( 'ENDPOINT_CORE_REMOVE_DATA' ) || true !== ENDPOINT_CORE_REMOVE_DATA ) {
	return;
}

delete_option( 'endpoint_business_details' );

$enquiries = get_posts(
	array(
		'post_type'      => 'endpoint_enquiry',
		'post_status'    => 'any',
		'posts_per_page' => -1,
		'fields'         => 'ids',
		'no_found_rows'  => true,
	)
);

foreach ( $enquiries as $enquiry_id ) {
	wp_delete_post( $enquiry_id, true );
}
