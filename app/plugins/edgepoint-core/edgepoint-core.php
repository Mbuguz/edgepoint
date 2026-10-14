<?php
/**
 * Plugin Name: Edgepoint Core
 * Plugin URI: https://edgepoint-internet.com/
 * Description: Portable content, enquiry, business settings, and SEO foundations for Edgepoint Internet Solutions Ltd.
 * Version: 0.1.1
 * Requires at least: 6.6
 * Requires PHP: 8.1
 * Author: Edgepoint Internet Solutions Ltd
 * License: GPL-2.0-or-later
 * Text Domain: edgepoint-core
 *
 * @package EdgepointCore
 */

defined( 'ABSPATH' ) || exit;

define( 'EDGEPOINT_CORE_VERSION', '0.1.1' );
define( 'EDGEPOINT_CORE_FILE', __FILE__ );
define( 'EDGEPOINT_CORE_DIR', plugin_dir_path( __FILE__ ) );
define( 'EDGEPOINT_CORE_URL', plugin_dir_url( __FILE__ ) );

require_once EDGEPOINT_CORE_DIR . 'includes/class-content.php';
require_once EDGEPOINT_CORE_DIR . 'includes/class-settings.php';
require_once EDGEPOINT_CORE_DIR . 'includes/class-seo.php';
require_once EDGEPOINT_CORE_DIR . 'includes/class-enquiry.php';

/**
 * Start plugin services.
 *
 * @return void
 */
function edgepoint_core_boot() {
	Edgepoint_Core_Content::init();
	Edgepoint_Core_Settings::init();
	Edgepoint_Core_Seo::init();
	Edgepoint_Core_Enquiry::init();
}
add_action( 'plugins_loaded', 'edgepoint_core_boot' );

/**
 * Prepare rewrites and capabilities on activation.
 *
 * @return void
 */
function edgepoint_core_activate() {
	Edgepoint_Core_Content::register();
	Edgepoint_Core_Content::add_capabilities();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'edgepoint_core_activate' );

/**
 * Flush plugin rewrite rules on deactivation.
 *
 * @return void
 */
function edgepoint_core_deactivate() {
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'edgepoint_core_deactivate' );
