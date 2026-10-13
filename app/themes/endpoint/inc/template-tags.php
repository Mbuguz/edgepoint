<?php
/**
 * Reusable display helpers.
 *
 * @package Endpoint
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return one validated business detail with a safe fallback.
 *
 * @param string $key Business detail key.
 * @return string
 */
function endpoint_business_detail( $key ) {
	$defaults = array(
		'name'         => 'Endpoint Internet Solution',
		'phone'        => '+254 700 000 000',
		'email'        => 'hello@example.com',
		'address'      => 'Counter Business Center, Shop B08, Kasarani, Nairobi',
		'service_area' => 'Kasarani, Nairobi, Ruiru, Gwakairu and the surrounding Nairobi metropolitan area',
		'hours'        => '24/7',
	);
	$details  = get_option( 'endpoint_business_details', array() );
	$value    = isset( $details[ $key ] ) ? $details[ $key ] : ( $defaults[ $key ] ?? '' );

	return is_scalar( $value ) ? (string) $value : '';
}

/**
 * Print the fallback brand when no custom logo is configured.
 *
 * @return void
 */
function endpoint_brand() {
	if ( has_custom_logo() ) {
		the_custom_logo();
		return;
	}
	?>
	<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img
			class="brand__mark"
			src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-mark.svg' ); ?>"
			width="44"
			height="44"
			alt=""
		/>
		<span class="brand__text">
			<strong><?php echo esc_html( endpoint_business_detail( 'name' ) ); ?></strong>
			<small><?php esc_html_e( 'Connect. Secure. Grow.', 'endpoint' ); ?></small>
		</span>
	</a>
	<?php
}

/**
 * Print breadcrumb navigation on interior pages.
 *
 * @return void
 */
function endpoint_breadcrumbs() {
	if ( is_front_page() ) {
		return;
	}

	$label = '';
	if ( is_singular() ) {
		$label = get_the_title();
	} elseif ( is_archive() ) {
		$label = get_the_archive_title();
	} elseif ( is_search() ) {
		$label = __( 'Search results', 'endpoint' );
	} elseif ( is_404() ) {
		$label = __( 'Page not found', 'endpoint' );
	}

	if ( ! $label ) {
		return;
	}
	?>
	<nav class="breadcrumbs wrap" aria-label="<?php esc_attr_e( 'Breadcrumb', 'endpoint' ); ?>">
		<ol>
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'endpoint' ); ?></a></li>
			<li aria-current="page"><?php echo esc_html( wp_strip_all_tags( $label ) ); ?></li>
		</ol>
	</nav>
	<?php
}

/**
 * Return a simple inline icon from the allowlist.
 *
 * @param string $name Icon name.
 * @return string
 */
function endpoint_icon( $name ) {
	$paths = array(
		'connectivity' => '<path d="M4 13a11 11 0 0 1 16 0M7.5 16.5a6 6 0 0 1 9 0M11.8 20h.4"/>',
		'network'      => '<rect x="3" y="4" width="7" height="6" rx="1"/><rect x="14" y="14" width="7" height="6" rx="1"/><path d="M10 7h4a3 3 0 0 1 3 3v4M7 10v7h7"/>',
		'security'     => '<path d="M12 3 5 6v5c0 4.6 2.9 8.1 7 10 4.1-1.9 7-5.4 7-10V6l-7-3Z"/><path d="m9 12 2 2 4-4"/>',
		'software'     => '<path d="m8 9-4 3 4 3M16 9l4 3-4 3M14 5l-4 14"/>',
		'cloud'        => '<path d="M7 18h11a4 4 0 0 0 .5-8A7 7 0 0 0 5.2 8.5 4.8 4.8 0 0 0 7 18Z"/>',
		'support'      => '<path d="M4 13v-2a8 8 0 0 1 16 0v2M5 13h3v6H6a2 2 0 0 1-2-2v-4ZM19 13h-3v6h1a3 3 0 0 1-3 3h-2"/>',
	);
	$path = $paths[ $name ] ?? $paths['network'];

	return '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">' . $path . '</svg>';
}
