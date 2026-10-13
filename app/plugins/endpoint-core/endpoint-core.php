<?php
/**
 * Plugin Name: Endpoint Core
 * Plugin URI: https://edgepoint-internet.com/
 * Description: Portable content, enquiry, business settings, and SEO foundations for Endpoint Internet Solution.
 * Version: 0.1.0
 * Requires at least: 6.6
 * Requires PHP: 8.1
 * Author: Endpoint Internet Solution
 * License: GPL-2.0-or-later
 * Text Domain: endpoint-core
 *
 * @package EndpointCore
 */

defined( 'ABSPATH' ) || exit;

define( 'ENDPOINT_CORE_VERSION', '0.1.0' );
define( 'ENDPOINT_CORE_FILE', __FILE__ );
define( 'ENDPOINT_CORE_DIR', plugin_dir_path( __FILE__ ) );
define( 'ENDPOINT_CORE_URL', plugin_dir_url( __FILE__ ) );

require_once ENDPOINT_CORE_DIR . 'includes/class-content.php';
require_once ENDPOINT_CORE_DIR . 'includes/class-settings.php';
require_once ENDPOINT_CORE_DIR . 'includes/class-seo.php';
require_once ENDPOINT_CORE_DIR . 'includes/class-enquiry.php';

/**
 * Start plugin services.
 *
 * @return void
 */
function endpoint_core_boot() {
	Endpoint_Core_Content::init();
	Endpoint_Core_Settings::init();
	Endpoint_Core_Seo::init();
	Endpoint_Core_Enquiry::init();
}
add_action( 'plugins_loaded', 'endpoint_core_boot' );

/**
 * Prepare rewrites and capabilities on activation.
 *
 * @return void
 */
function endpoint_core_activate() {
	Endpoint_Core_Content::register();
	Endpoint_Core_Content::add_capabilities();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'endpoint_core_activate' );

/**
 * Flush plugin rewrite rules on deactivation.
 *
 * @return void
 */
function endpoint_core_deactivate() {
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'endpoint_core_deactivate' );
