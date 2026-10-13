<?php
/**
 * Minimal technical SEO layer.
 *
 * @package EndpointCore
 */

defined( 'ABSPATH' ) || exit;

/**
 * Provide safe defaults without competing with a full SEO plugin.
 */
final class Endpoint_Core_Seo {

	/**
	 * Attach hooks.
	 *
	 * @return void
	 */
	public static function init() {
		add_filter( 'wp_robots', array( __CLASS__, 'robots' ) );

		if ( self::third_party_active() ) {
			return;
		}

		add_action( 'wp_head', array( __CLASS__, 'head' ), 5 );
	}

	/**
	 * Detect common plugins that must remain the sole metadata owner.
	 *
	 * @return bool
	 */
	private static function third_party_active() {
		return defined( 'WPSEO_VERSION' )
			|| defined( 'RANK_MATH_VERSION' )
			|| defined( 'AIOSEO_VERSION' )
			|| defined( 'SEOPRESS_VERSION' );
	}

	/**
	 * Protect previews and private result pages from indexing.
	 *
	 * @param array<string, bool> $robots Robots directives.
	 * @return array<string, bool>
	 */
	public static function robots( $robots ) {
		$settings = Endpoint_Core_Settings::get();
		if ( ! empty( $settings['demo_mode'] ) || is_search() || is_404() ) {
			$robots['noindex'] = true;
			unset( $robots['index'] );
		}

		return $robots;
	}

	/**
	 * Build the current page description.
	 *
	 * @return string
	 */
	private static function description() {
		if ( is_front_page() ) {
			return __( 'Integrated internet, networking, software, cloud, security and ICT solutions for homes, businesses and institutions across Kasarani, Nairobi and surrounding areas.', 'endpoint-core' );
		}

		if ( is_singular() ) {
			$custom = get_post_meta( get_queried_object_id(), '_endpoint_seo_description', true );
			if ( $custom ) {
				return wp_strip_all_tags( $custom );
			}

			$excerpt = get_the_excerpt( get_queried_object_id() );
			if ( $excerpt ) {
				return wp_trim_words( wp_strip_all_tags( $excerpt ), 28, '' );
			}
		}

		if ( is_post_type_archive() ) {
			return wp_strip_all_tags( get_the_archive_description() );
		}

		return '';
	}

	/**
	 * Print descriptions, social metadata, and conservative JSON-LD.
	 *
	 * @return void
	 */
	public static function head() {
		$description = self::description();
		$settings    = Endpoint_Core_Settings::get();
		$title       = wp_get_document_title();
		$url         = is_singular() ? get_permalink() : home_url( wp_unslash( $_SERVER['REQUEST_URI'] ?? '/' ) );
		$image       = is_singular() && has_post_thumbnail() ? get_the_post_thumbnail_url( get_queried_object_id(), 'large' ) : '';

		if ( $description ) {
			echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
		}
		echo '<meta property="og:type" content="' . esc_attr( is_singular( 'post' ) ? 'article' : 'website' ) . '">' . "\n";
		echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
		echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
		echo '<meta property="og:site_name" content="' . esc_attr( $settings['name'] ) . '">' . "\n";
		if ( $description ) {
			echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
		}
		if ( $image ) {
			echo '<meta property="og:image" content="' . esc_url( $image ) . '">' . "\n";
		}

		$organization = array(
			'@type'       => 'Organization',
			'@id'         => home_url( '/#organization' ),
			'name'        => $settings['name'],
			'url'         => home_url( '/' ),
			'areaServed'  => $settings['service_area'],
			'address'     => array(
				'@type'           => 'PostalAddress',
				'streetAddress'   => $settings['address'],
				'addressLocality' => 'Nairobi',
				'addressCountry'  => 'KE',
			),
		);

		if ( empty( $settings['demo_mode'] ) ) {
			if ( $settings['phone'] ) {
				$organization['telephone'] = $settings['phone'];
			}
			if ( $settings['email'] ) {
				$organization['email'] = $settings['email'];
			}

			$same_as = array_filter(
				array(
					$settings['facebook'],
					$settings['instagram'],
					$settings['linkedin'],
					$settings['x'],
				)
			);
			if ( $same_as ) {
				$organization['sameAs'] = array_values( $same_as );
			}
		}

		$graph = array(
			'@context' => 'https://schema.org',
			'@graph'   => array(
				$organization,
				array(
					'@type'       => 'WebSite',
					'@id'         => home_url( '/#website' ),
					'url'         => home_url( '/' ),
					'name'        => $settings['name'],
					'publisher'   => array( '@id' => home_url( '/#organization' ) ),
					'inLanguage'  => get_bloginfo( 'language' ),
				),
			),
		);

		echo '<script type="application/ld+json">' . wp_json_encode( $graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
	}
}
