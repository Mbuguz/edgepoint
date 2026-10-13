<?php
/**
 * Portable content models.
 *
 * @package EndpointCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register public content and private enquiries.
 */
final class Endpoint_Core_Content {

	/**
	 * Attach hooks.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'register' ) );
		add_action( 'pre_get_posts', array( __CLASS__, 'archive_size' ) );
	}

	/**
	 * Build common labels.
	 *
	 * @param string $singular Singular label.
	 * @param string $plural   Plural label.
	 * @return array<string, string>
	 */
	private static function labels( $singular, $plural ) {
		return array(
			'name'               => $plural,
			'singular_name'      => $singular,
			'add_new_item'       => sprintf(
				/* translators: %s: content type singular label. */
				__( 'Add new %s', 'endpoint-core' ),
				$singular
			),
			'edit_item'          => sprintf(
				/* translators: %s: content type singular label. */
				__( 'Edit %s', 'endpoint-core' ),
				$singular
			),
			'new_item'           => sprintf(
				/* translators: %s: content type singular label. */
				__( 'New %s', 'endpoint-core' ),
				$singular
			),
			'view_item'          => sprintf(
				/* translators: %s: content type singular label. */
				__( 'View %s', 'endpoint-core' ),
				$singular
			),
			'search_items'       => sprintf(
				/* translators: %s: content type plural label. */
				__( 'Search %s', 'endpoint-core' ),
				$plural
			),
			'not_found'          => sprintf(
				/* translators: %s: content type plural label. */
				__( 'No %s found', 'endpoint-core' ),
				strtolower( $plural )
			),
			'all_items'          => sprintf(
				/* translators: %s: content type plural label. */
				__( 'All %s', 'endpoint-core' ),
				$plural
			),
			'menu_name'          => $plural,
			'item_published'     => sprintf(
				/* translators: %s: content type singular label. */
				__( '%s published.', 'endpoint-core' ),
				$singular
			),
			'item_updated'       => sprintf(
				/* translators: %s: content type singular label. */
				__( '%s updated.', 'endpoint-core' ),
				$singular
			),
		);
	}

	/**
	 * Register post types, taxonomy, and typed metadata.
	 *
	 * @return void
	 */
	public static function register() {
		register_post_type(
			'endpoint_service',
			array(
				'labels'       => self::labels( __( 'Service', 'endpoint-core' ), __( 'Services', 'endpoint-core' ) ),
				'public'       => true,
				'hierarchical' => true,
				'has_archive'  => 'services',
				'rewrite'      => array(
					'slug'       => 'services',
					'with_front' => false,
				),
				'menu_icon'    => 'dashicons-admin-tools',
				'show_in_rest' => true,
				'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes' ),
			)
		);

		register_post_type(
			'endpoint_product',
			array(
				'labels'       => self::labels( __( 'Product', 'endpoint-core' ), __( 'Products', 'endpoint-core' ) ),
				'public'       => true,
				'has_archive'  => 'products',
				'rewrite'      => array(
					'slug'       => 'products',
					'with_front' => false,
				),
				'menu_icon'    => 'dashicons-products',
				'show_in_rest' => true,
				'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
			)
		);

		register_post_type(
			'endpoint_project',
			array(
				'labels'       => self::labels( __( 'Project', 'endpoint-core' ), __( 'Projects', 'endpoint-core' ) ),
				'public'       => true,
				'has_archive'  => 'projects',
				'rewrite'      => array(
					'slug'       => 'projects',
					'with_front' => false,
				),
				'menu_icon'    => 'dashicons-portfolio',
				'show_in_rest' => true,
				'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
			)
		);

		register_post_type(
			'endpoint_industry',
			array(
				'labels'       => self::labels( __( 'Industry', 'endpoint-core' ), __( 'Industries', 'endpoint-core' ) ),
				'public'       => true,
				'has_archive'  => 'industries',
				'rewrite'      => array(
					'slug'       => 'industries',
					'with_front' => false,
				),
				'menu_icon'    => 'dashicons-building',
				'show_in_rest' => true,
				'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
			)
		);

		register_post_type(
			'endpoint_enquiry',
			array(
				'labels'              => self::labels( __( 'Enquiry', 'endpoint-core' ), __( 'Enquiries', 'endpoint-core' ) ),
				'public'              => false,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'menu_icon'           => 'dashicons-email-alt',
				'exclude_from_search' => true,
				'show_in_rest'        => false,
				'capability_type'     => array( 'endpoint_enquiry', 'endpoint_enquiries' ),
				'map_meta_cap'        => true,
				'supports'            => array( 'title' ),
			)
		);

		register_taxonomy(
			'endpoint_solution',
			array( 'endpoint_service', 'endpoint_product', 'endpoint_project', 'endpoint_industry' ),
			array(
				'labels'            => array(
					'name'          => __( 'Solution areas', 'endpoint-core' ),
					'singular_name' => __( 'Solution area', 'endpoint-core' ),
				),
				'public'            => true,
				'hierarchical'      => true,
				'show_admin_column' => true,
				'show_in_rest'     => true,
				'rewrite'           => array(
					'slug'       => 'solutions',
					'with_front' => false,
				),
			)
		);

		$public_types = array( 'endpoint_service', 'endpoint_product', 'endpoint_project', 'endpoint_industry' );
		foreach ( $public_types as $post_type ) {
			register_post_meta(
				$post_type,
				'_endpoint_seo_description',
				array(
					'type'              => 'string',
					'single'            => true,
					'show_in_rest'      => true,
					'sanitize_callback' => 'sanitize_text_field',
					'auth_callback'     => static function () {
						return current_user_can( 'edit_posts' );
					},
				)
			);
		}

		register_post_meta(
			'endpoint_service',
			'_endpoint_delivery_status',
			array(
				'type'              => 'string',
				'single'            => true,
				'default'           => 'consultation',
				'show_in_rest'      => true,
				'sanitize_callback' => array( __CLASS__, 'sanitize_delivery_status' ),
				'auth_callback'     => static function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);
	}

	/**
	 * Validate the service delivery status.
	 *
	 * @param mixed $value Submitted value.
	 * @return string
	 */
	public static function sanitize_delivery_status( $value ) {
		$allowed = array( 'available', 'consultation', 'partner', 'unavailable' );
		$value   = sanitize_key( (string) $value );

		return in_array( $value, $allowed, true ) ? $value : 'consultation';
	}

	/**
	 * Add private enquiry capabilities to administrators.
	 *
	 * @return void
	 */
	public static function add_capabilities() {
		$role = get_role( 'administrator' );
		if ( ! $role ) {
			return;
		}

		$capabilities = array(
			'edit_endpoint_enquiry',
			'read_endpoint_enquiry',
			'delete_endpoint_enquiry',
			'edit_endpoint_enquiries',
			'edit_others_endpoint_enquiries',
			'publish_endpoint_enquiries',
			'read_private_endpoint_enquiries',
			'delete_endpoint_enquiries',
			'delete_private_endpoint_enquiries',
			'delete_published_endpoint_enquiries',
			'delete_others_endpoint_enquiries',
			'edit_private_endpoint_enquiries',
			'edit_published_endpoint_enquiries',
		);

		foreach ( $capabilities as $capability ) {
			$role->add_cap( $capability );
		}
	}

	/**
	 * Keep the complete, intentionally small service family set on one index page.
	 *
	 * @param WP_Query $query Current query.
	 * @return void
	 */
	public static function archive_size( $query ) {
		if ( is_admin() || ! $query->is_main_query() || ! $query->is_post_type_archive( 'endpoint_service' ) ) {
			return;
		}

		$query->set( 'posts_per_page', 24 );
		$query->set( 'orderby', 'menu_order title' );
		$query->set( 'order', 'ASC' );
	}
}
