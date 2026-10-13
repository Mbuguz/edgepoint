<?php
/**
 * Seed a disposable WordPress Playground preview.
 *
 * This file is never included in production packages.
 */

defined( 'ABSPATH' ) || exit;

$pages = array(
	'home'          => array(
		'title'   => 'Home',
		'content' => '',
	),
	'about'         => array(
		'title'   => 'About Endpoint',
		'content' => '<p>Endpoint Internet Solution brings connectivity, infrastructure, digital systems, security and support together for homes, businesses and institutions.</p><h2>Technology planned around real needs</h2><p>Our approach begins with the environment, users, risks and desired outcome. We then define a practical scope, deliver the agreed work and provide a clear handover.</p><h2>Local service, connected capability</h2><p>Our office is at Counter Business Center, Shop B08, Kasarani, Nairobi. We plan services across Kasarani, Nairobi, Ruiru, Gwakairu and surrounding metropolitan areas, subject to project requirements.</p>',
	),
	'support'       => array(
		'title'   => 'Support',
		'content' => '<p>Need help with an existing installation, network, system or service? Share the equipment or service involved, what changed, and the impact on your users.</p><h2>Before requesting support</h2><ul><li>Record any error message without sharing passwords.</li><li>Note when the issue began and who is affected.</li><li>Keep equipment powered safely unless there is an electrical or physical hazard.</li></ul><p>This preview does not yet publish a verified support number or service-level commitment.</p>',
	),
	'careers'       => array(
		'title'   => 'Careers',
		'content' => '<p>There are no published vacancies in this preview. Future opportunities will appear here with role requirements, location, application instructions and a closing date.</p>',
	),
	'contact'       => array(
		'title'   => 'Contact',
		'content' => '<h2>Visit our office</h2><p><strong>Counter Business Center, Shop B08<br>Kasarani, Nairobi</strong></p><p>Service planning covers Kasarani, Nairobi, Ruiru, Gwakairu and surrounding Nairobi metropolitan areas.</p><h2>Preview contact details</h2><p>Phone: +254 700 000 000 (demo)<br>Email: hello@example.com (demo)</p><p>Verified contact and social details will replace these placeholders before production release.</p>',
	),
	'get-a-quote'   => array(
		'title'   => 'Get a Quote',
		'content' => '<p>Tell us what you need, where the project is located and the outcome you want. This preview validates the form but does not store or deliver personal information.</p>[endpoint_quote_form]',
	),
	'privacy-policy' => array(
		'title'   => 'Privacy Policy',
		'content' => '<p><strong>Draft required before production.</strong> This page must be replaced with an approved privacy notice covering the data controller, purposes, lawful basis, processors, retention, rights and contact method.</p>',
	),
	'terms'         => array(
		'title'   => 'Terms',
		'content' => '<p><strong>Draft required before production.</strong> Commercial, service, warranty, payment, support and acceptable-use terms require review and approval.</p>',
	),
	'accessibility' => array(
		'title'   => 'Accessibility',
		'content' => '<p>Endpoint aims to provide an inclusive website aligned with WCAG 2.2 Level AA. Verified contact details for reporting an accessibility problem will be added before production release.</p>',
	),
	'insights'      => array(
		'title'   => 'Insights',
		'content' => '',
	),
);

$page_ids = array();
foreach ( $pages as $slug => $page ) {
	$existing = get_page_by_path( $slug, OBJECT, 'page' );
	if ( $existing ) {
		$page_ids[ $slug ] = $existing->ID;
		continue;
	}

	$page_ids[ $slug ] = wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_title'   => $page['title'],
			'post_name'    => $slug,
			'post_content' => $page['content'],
		)
	);
}

if ( ! is_wp_error( $page_ids['home'] ) ) {
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $page_ids['home'] );
}
if ( ! is_wp_error( $page_ids['insights'] ) ) {
	update_option( 'page_for_posts', $page_ids['insights'] );
}

$services = array(
	'internet-connectivity-installation' => array(
		'Internet Services',
		'Connectivity planning and installation for homes, businesses and institutions.',
		array( 'Home internet installation', 'Business internet solutions', 'Dedicated internet links', 'Fiber internet installation', 'Wi-Fi hotspot solutions' ),
	),
	'enterprise-residential-networking' => array(
		'Networking Solutions',
		'Network design, cabling, configuration and maintenance for dependable operations.',
		array( 'LAN and WAN installation', 'Structured cabling', 'Fiber installation and splicing', 'Router, switch, firewall, VPN and VLAN configuration', 'Monitoring and maintenance', 'PtP and PtMP wireless links' ),
	),
	'wifi-installation-optimization' => array(
		'Wi-Fi Installation & Optimization',
		'Coverage and capacity planned around your premises, users and applications.',
		array( 'Site and coverage assessment', 'Access point and mesh design', 'Secure configuration', 'Interference and roaming optimization', 'Performance validation' ),
	),
	'starlink-installation-support' => array(
		'Starlink Services',
		'Site assessment, installation, relocation and network integration for suitable locations.',
		array( 'Installation and relocation', 'Business network integration', 'Maintenance and troubleshooting', 'Equipment sales subject to verified availability' ),
	),
	'cctv-security-solutions' => array(
		'CCTV & Security Solutions',
		'Security systems planned around the site, monitoring needs, privacy and safe access.',
		array( 'CCTV and IP cameras', 'Remote monitoring setup', 'Biometric access control', 'Electric fence systems', 'Alarm systems' ),
	),
	'software-website-development' => array(
		'Software & Website Development',
		'Maintainable digital systems shaped around real workflows and customer journeys.',
		array( 'Business websites', 'School, hospital and SACCO systems', 'HR, payroll, inventory and ERP solutions', 'API development and integration', 'Software maintenance and support' ),
	),
	'cloud-solutions-services' => array(
		'Cloud & Business Solutions',
		'Cloud productivity, hosting and infrastructure configured with ownership and continuity in mind.',
		array( 'Google Workspace and Microsoft 365', 'Business email and cloud storage', 'Cloud backup, servers and VPS', 'Domains, hosting, SSL and DNS management' ),
	),
	'cybersecurity' => array(
		'Cybersecurity',
		'Layered security services based on business risk, authorized scope and practical recovery.',
		array( 'Firewall and endpoint protection', 'Email and website security', 'Security audits and authorized penetration testing', 'VPN and encryption', 'Backup and disaster recovery' ),
	),
	'ict-equipment-supplies' => array(
		'ICT Equipment & Supplies',
		'Technology equipment sourced around compatibility, warranty and installation needs.',
		array( 'Computers, laptops and printers', 'Networking and CCTV equipment', 'Storage devices and software licences', 'Displays, projectors and office electronics', 'Peripherals and accessories' ),
	),
	'telecommunications' => array(
		'Telecommunications',
		'Business communication systems planned around providers, quality and support needs.',
		array( 'VoIP phone systems', 'IP PBX installation', 'Video conferencing', 'Office communication systems', 'SIP trunk configuration' ),
	),
	'ict-consulting-technical-support' => array(
		'IT Consultancy & Support',
		'Technology planning and support that connects investment decisions to operational goals.',
		array( 'Digital transformation and advisory', 'Infrastructure and ICT policy planning', 'Project management and integration', 'Automation, procurement and IT audits', 'Technical support' ),
	),
	'digital-marketing-ict-services' => array(
		'Digital Marketing & Creative Services',
		'Digital growth services built around clear ownership, measurement and realistic outcomes.',
		array( 'Search engine optimization', 'Social media and content management', 'Google and Meta advertising', 'Graphic and logo design', 'Branding and email marketing' ),
	),
);

foreach ( $services as $slug => $service ) {
	if ( get_page_by_path( $slug, OBJECT, 'endpoint_service' ) ) {
		continue;
	}

	$list = '<ul>';
	foreach ( $service[2] as $capability ) {
		$list .= '<li>' . esc_html( $capability ) . '</li>';
	}
	$list .= '</ul>';

	wp_insert_post(
		array(
			'post_type'    => 'endpoint_service',
			'post_status'  => 'publish',
			'post_title'   => $service[0],
			'post_name'    => $slug,
			'post_excerpt' => $service[1],
			'post_content' => '<p>' . esc_html( $service[1] ) . '</p><h2>Capabilities</h2>' . $list . '<h2>Plan the right next step</h2><p>Final scope, availability, equipment, timing and support terms are confirmed after requirements review or a site assessment.</p>',
		)
	);
}

update_option( 'blogname', 'Endpoint Internet Solution' );
update_option( 'blogdescription', 'Connect. Secure. Grow.' );
update_option( 'permalink_structure', '/%postname%/' );
flush_rewrite_rules();
