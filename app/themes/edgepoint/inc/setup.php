<?php
/**
 * Theme setup and assets.
 *
 * @package Edgepoint
 */

defined( 'ABSPATH' ) || exit;

/**
 * Configure theme supports and navigation.
 *
 * @return void
 */
function edgepoint_theme_setup() {
	load_theme_textdomain( 'edgepoint', get_template_directory() . '/languages' );

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
				'name'  => __( 'Midnight', 'edgepoint' ),
				'slug'  => 'midnight',
				'color' => '#071b2b',
			),
			array(
				'name'  => __( 'Signal blue', 'edgepoint' ),
				'slug'  => 'signal-blue',
				'color' => '#075ea8',
			),
			array(
				'name'  => __( 'Cyan', 'edgepoint' ),
				'slug'  => 'cyan',
				'color' => '#63d8e6',
			),
			array(
				'name'  => __( 'Cloud', 'edgepoint' ),
				'slug'  => 'cloud',
				'color' => '#eef5f8',
			),
			array(
				'name'  => __( 'White', 'edgepoint' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary navigation', 'edgepoint' ),
			'footer'  => __( 'Footer navigation', 'edgepoint' ),
		)
	);

	add_image_size( 'edgepoint-card', 720, 480, true );
}
add_action( 'after_setup_theme', 'edgepoint_theme_setup' );

/**
 * Set a readable content width.
 *
 * @return void
 */
function edgepoint_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'edgepoint_content_width', 760 );
}
add_action( 'after_setup_theme', 'edgepoint_content_width', 0 );

/**
 * Load the small, dependency-free frontend assets.
 *
 * @return void
 */
function edgepoint_enqueue_assets() {
	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'edgepoint-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
		$version
	);

	wp_enqueue_script(
		'edgepoint-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		$version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'edgepoint_enqueue_assets' );

/**
 * Add defer to the theme navigation script.
 *
 * @param string $tag    Script tag.
 * @param string $handle Script handle.
 * @return string
 */
function edgepoint_defer_navigation_script( $tag, $handle ) {
	if ( 'edgepoint-navigation' !== $handle ) {
		return $tag;
	}

	return str_replace( ' src=', ' defer src=', $tag );
}
add_filter( 'script_loader_tag', 'edgepoint_defer_navigation_script', 10, 2 );

/**
 * Preload the small local variable font used above the fold.
 *
 * @return void
 */
function edgepoint_preload_font() {
	?>
	<link
		rel="preload"
		href="<?php echo esc_url( get_template_directory_uri() . '/assets/fonts/manrope-latin.woff2' ); ?>"
		as="font"
		type="font/woff2"
		crossorigin
	>
	<?php
}
add_action( 'wp_head', 'edgepoint_preload_font', 1 );
