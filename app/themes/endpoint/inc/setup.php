<?php
/**
 * Theme setup and assets.
 *
 * @package Endpoint
 */

defined( 'ABSPATH' ) || exit;

/**
 * Configure theme supports and navigation.
 *
 * @return void
 */
function endpoint_theme_setup() {
	load_theme_textdomain( 'endpoint', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'search-form',
		)
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 64,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Midnight', 'endpoint' ),
				'slug'  => 'midnight',
				'color' => '#071b2b',
			),
			array(
				'name'  => __( 'Signal blue', 'endpoint' ),
				'slug'  => 'signal-blue',
				'color' => '#075ea8',
			),
			array(
				'name'  => __( 'Cyan', 'endpoint' ),
				'slug'  => 'cyan',
				'color' => '#63d8e6',
			),
			array(
				'name'  => __( 'Cloud', 'endpoint' ),
				'slug'  => 'cloud',
				'color' => '#eef5f8',
			),
			array(
				'name'  => __( 'White', 'endpoint' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary navigation', 'endpoint' ),
			'footer'  => __( 'Footer navigation', 'endpoint' ),
		)
	);

	add_image_size( 'endpoint-card', 720, 480, true );
}
add_action( 'after_setup_theme', 'endpoint_theme_setup' );

/**
 * Set a readable content width.
 *
 * @return void
 */
function endpoint_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'endpoint_content_width', 760 );
}
add_action( 'after_setup_theme', 'endpoint_content_width', 0 );

/**
 * Load the small, dependency-free frontend assets.
 *
 * @return void
 */
function endpoint_enqueue_assets() {
	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'endpoint-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
		$version
	);

	wp_enqueue_script(
		'endpoint-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		$version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'endpoint_enqueue_assets' );

/**
 * Add defer to the theme navigation script.
 *
 * @param string $tag    Script tag.
 * @param string $handle Script handle.
 * @return string
 */
function endpoint_defer_navigation_script( $tag, $handle ) {
	if ( 'endpoint-navigation' !== $handle ) {
		return $tag;
	}

	return str_replace( ' src=', ' defer src=', $tag );
}
add_filter( 'script_loader_tag', 'endpoint_defer_navigation_script', 10, 2 );
