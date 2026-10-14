<?php
/**
 * Portable content models.
 *
 * @package EdgepointCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register public content and private enquiries.
 */
final class Edgepoint_Core_Content {

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
				__( 'Add new %s', 'edgepoint-core' ),
				$singular
			),
			'edit_item'          => sprintf(
				/* translators: %s: content type singular label. */
				__( 'Edit %s', 'edgepoint-core' ),
				$singular
			),
			'new_item'           => sprintf(
				/* translators: %s: content type singular label. */
				__( 'New %s', 'edgepoint-core' ),
				$singular
			),
			'view_item'          => sprintf(
				/* translators: %s: content type singular label. */
				__( 'View %s', 'edgepoint-core' ),
				$singular
			),
			'search_items'       => sprintf(
				/* translators: %s: content type plural label. */
				__( 'Search %s', 'edgepoint-core' ),
				$plural
			),
			'not_found'          => sprintf(
				/* translators: %s: content type plural label. */
				__( 'No %s found', 'edgepoint-core' ),
				strtolower( $plural )
			),
			'all_items'          => sprintf(
				/* translators: %s: content type plural label. */
				__( 'All %s', 'edgepoint-core' ),
				$plural
			),
			'menu_name'          => $plural,
			'item_published'     => sprintf(
				/* translators: %s: content type singular label. */
				__( '%s published.', 'edgepoint-core' ),
				$singular
			),
			'item_updated'       => sprintf(
				/* translators: %s: content type singular label. */
				__( '%s updated.', 'edgepoint-core' ),
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
			'edgepoint_service',
			array(
				'labels'       => self::labels( __( 'Service', 'edgepoint-core' ), __( 'Services', 'edgepoint-core' ) ),
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
			'edgepoint_product',
			array(
				'labels'       => self::labels( __( 'Product', 'edgepoint-core' ), __( 'Products', 'edgepoint-core' ) ),
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
			'edgepoint_project',
			array(
				'labels'       => self::labels( __( 'Project', 'edgepoint-core' ), __( 'Projects', 'edgepoint-core' ) ),
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
			'edgepoint_industry',
			array(
				'labels'       => self::labels( __( 'Industry', 'edgepoint-core' ), __( 'Industries', 'edgepoint-core' ) ),
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
			'edgepoint_enquiry',
			array(
				'labels'              => self::labels( __( 'Enquiry', 'edgepoint-core' ), __( 'Enquiries', 'edgepoint-core' ) ),
				'public'              => false,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'menu_icon'           => 'dashicons-email-alt',
				'exclude_from_search' => true,
				'show_in_rest'        => false,
				'capability_type'     => array( 'edgepoint_enquiry', 'edgepoint_enquiries' ),
				'map_meta_cap'        => true,
				'supports'            => array( 'title' ),
			)
		);

		register_taxonomy(
			'edgepoint_solution',
			array( 'edgepoint_service', 'edgepoint_product', 'edgepoint_project', 'edgepoint_industry' ),
			array(
				'labels'            => array(
					'name'          => __( 'Solution areas', 'edgepoint-core' ),
					'singular_name' => __( 'Solution area', 'edgepoint-core' ),
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

		$public_types = array( 'edgepoint_service', 'edgepoint_product', 'edgepoint_project', 'edgepoint_industry' );
		foreach ( $public_types as $post_type ) {
			register_post_meta(
				$post_type,
				'_edgepoint_seo_description',
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
			'edgepoint_service',
			'_edgepoint_delivery_status',
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
			'edit_edgepoint_enquiry',
			'read_edgepoint_enquiry',
			'delete_edgepoint_enquiry',
			'edit_edgepoint_enquiries',
			'edit_others_edgepoint_enquiries',
			'publish_edgepoint_enquiries',
			'read_private_edgepoint_enquiries',
			'delete_edgepoint_enquiries',
			'delete_private_edgepoint_enquiries',
			'delete_published_edgepoint_enquiries',
			'delete_others_edgepoint_enquiries',
			'edit_private_edgepoint_enquiries',
			'edit_published_edgepoint_enquiries',
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
		if (
			is_admin()
			|| ! $query->is_main_query()
			|| ! $query->is_post_type_archive( array( 'edgepoint_service', 'edgepoint_industry' ) )
		) {
			return;
		}

		$query->set( 'posts_per_page', 24 );
		$query->set( 'orderby', 'menu_order title' );
		$query->set( 'order', 'ASC' );
	}
}
