<?php
/**
 * Insights and picture-led trends.
 *
 * @package Edgepoint
 */

defined( 'ABSPATH' ) || exit;

/**
 * Keep the Trends category available for editors.
 *
 * @return void
 */
function edgepoint_ensure_trends_category() {
	if ( term_exists( 'trends', 'category' ) ) {
		return;
	}

	wp_insert_term(
		__( 'Trends', 'edgepoint' ),
		'category',
		array(
			'slug'        => 'trends',
			'description' => __( 'Picture-led notes on connectivity, security and websites.', 'edgepoint' ),
		)
	);
}
add_action( 'init', 'edgepoint_ensure_trends_category' );

/**
 * Use the category name itself as the archive title.
 *
 * @param string $title Archive title.
 * @return string
 */
function edgepoint_archive_title( $title ) {
	if ( is_category() ) {
		return single_cat_title( '', false );
	}

	return $title;
}
add_filter( 'get_the_archive_title', 'edgepoint_archive_title' );

/**
 * Whether a post is filed under Trends.
 *
 * @param int|null $post_id Post ID.
 * @return bool
 */
function edgepoint_is_trend( $post_id = null ) {
	$post_id = $post_id ? (int) $post_id : (int) get_the_ID();

	return $post_id > 0 && has_category( 'trends', $post_id );
}

/**
 * A trend is public only when it has a featured image.
 *
 * @param int|null $post_id Post ID.
 * @return bool
 */
function edgepoint_trend_is_visible( $post_id = null ) {
	$post_id = $post_id ? (int) $post_id : (int) get_the_ID();

	if ( ! edgepoint_is_trend( $post_id ) ) {
		return true;
	}

	return has_post_thumbnail( $post_id );
}

/**
 * Warn in the editor when a published trend has no picture.
 *
 * @return void
 */
function edgepoint_trend_image_notice() {
	$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;

	if ( ! $screen || 'post' !== $screen->base || 'post' !== $screen->post_type ) {
		return;
	}

	$post_id = isset( $_GET['post'] ) ? (int) $_GET['post'] : 0; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

	if ( $post_id < 1 || ! edgepoint_is_trend( $post_id ) || has_post_thumbnail( $post_id ) ) {
		return;
	}

	echo '<div class="notice notice-warning"><p>';
	esc_html_e( 'This Trend stays off the Insights page until it has a featured image. Set the image, then update the post.', 'edgepoint' );
	echo '</p></div>';
}
add_action( 'admin_notices', 'edgepoint_trend_image_notice' );
