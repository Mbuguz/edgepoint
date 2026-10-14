<?php
/**
 * Reusable display helpers.
 *
 * @package Edgepoint
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return one validated business detail with a safe fallback.
 *
 * @param string $key Business detail key.
 * @return string
 */
function edgepoint_business_detail( $key ) {
	$defaults = array(
		'name'         => 'Edgepoint Internets Solutions Ltd',
		'phone'        => '0754 931 100',
		'email'        => 'edgepointinternet@gmail.com',
		'address'      => 'Counter Business Center, Shop B08, Kasarani, Nairobi',
		'service_area' => 'Kasarani, Nairobi, Ruiru, Gwakairu and the surrounding Nairobi metropolitan area',
		'hours'        => '24/7',
	);
	$details  = get_option( 'edgepoint_business_details', array() );
	$value    = isset( $details[ $key ] ) ? $details[ $key ] : ( $defaults[ $key ] ?? '' );

	return is_scalar( $value ) ? (string) $value : '';
}

/**
 * Format a stored phone number for display.
 *
 * @param string $phone Raw phone number.
 * @return string
 */
function edgepoint_phone_label( $phone ) {
	$digits = preg_replace( '/\D+/', '', (string) $phone );
	if ( 10 === strlen( $digits ) && str_starts_with( $digits, '0' ) ) {
		return substr( $digits, 0, 4 ) . ' ' . substr( $digits, 4, 3 ) . ' ' . substr( $digits, 7 );
	}

	return trim( (string) $phone );
}

/**
 * Build a tel link for a Kenyan or international number.
 *
 * @param string $phone Raw phone number.
 * @return string
 */
function edgepoint_phone_href( $phone ) {
	$digits = preg_replace( '/\D+/', '', (string) $phone );
	if ( str_starts_with( $digits, '0' ) ) {
		$digits = '254' . substr( $digits, 1 );
	}

	return 'tel:+' . $digits;
}

/**
 * Build a WhatsApp chat link from the public phone number.
 *
 * @param string $phone Raw phone number.
 * @return string
 */
function edgepoint_whatsapp_href( $phone ) {
	$digits = preg_replace( '/\D+/', '', (string) $phone );
	if ( str_starts_with( $digits, '0' ) ) {
		$digits = '254' . substr( $digits, 1 );
	}

	return 'https://wa.me/' . $digits . '?text=' . rawurlencode( 'Hello Edgepoint, I would like to ask about your services.' );
}

/**
 * Build a map search link for the published office address.
 *
 * @param string $address Office address.
 * @return string
 */
function edgepoint_maps_href( $address ) {
	return 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( (string) $address );
}

/**
 * Return verified social profiles saved in business settings.
 *
 * @return array<int, array{label: string, url: string}>
 */
function edgepoint_social_links() {
	$details = get_option( 'edgepoint_business_details', array() );
	$labels  = array(
		'facebook'  => __( 'Facebook', 'edgepoint' ),
		'instagram' => __( 'Instagram', 'edgepoint' ),
		'linkedin'  => __( 'LinkedIn', 'edgepoint' ),
		'tiktok'    => __( 'TikTok', 'edgepoint' ),
		'x'         => __( 'X', 'edgepoint' ),
	);
	$links   = array();

	foreach ( $labels as $key => $label ) {
		$url = isset( $details[ $key ] ) ? esc_url( (string) $details[ $key ] ) : '';
		if ( $url ) {
			$links[] = array(
				'label' => $label,
				'url'   => $url,
			);
		}
	}

	return $links;
}

/**
 * Print the fallback brand when no custom logo is configured.
 *
 * @return void
 */
function edgepoint_brand() {
	if ( has_custom_logo() ) {
		the_custom_logo();
		return;
	}
	?>
	<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img
			class="brand__logo"
			src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-full.png' ); ?>"
			width="720"
			height="492"
			alt="<?php echo esc_attr( edgepoint_business_detail( 'name' ) ); ?>"
		/>
	</a>
	<?php
}

/**
 * Print breadcrumb navigation on interior pages.
 *
 * @return void
 */
function edgepoint_breadcrumbs() {
	if ( is_front_page() ) {
		return;
	}

	$label = '';
	if ( is_singular() ) {
		$label = get_the_title();
	} elseif ( is_post_type_archive() ) {
		$label = post_type_archive_title( '', false );
	} elseif ( is_archive() ) {
		$label = get_the_archive_title();
	} elseif ( is_search() ) {
		$label = __( 'Search results', 'edgepoint' );
	} elseif ( is_404() ) {
		$label = __( 'Page not found', 'edgepoint' );
	}

	if ( ! $label ) {
		return;
	}
	?>
	<nav class="breadcrumbs wrap" aria-label="<?php esc_attr_e( 'Breadcrumb', 'edgepoint' ); ?>">
		<ol>
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'edgepoint' ); ?></a></li>
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
function edgepoint_icon( $name ) {
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
