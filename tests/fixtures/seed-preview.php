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
		'title'   => 'About Edgepoint',
		'content' => '<p>Edgepoint Internets Solutions Ltd brings connectivity, infrastructure, digital systems, security and support together for homes, businesses and institutions.</p><h2>One connected view of technology</h2><p>A network decision can affect security. A cloud decision can affect cost, identity and recovery. A new business system can only succeed when people, data and support are considered alongside the software. Edgepoint exists to connect those decisions rather than treating each requirement as an isolated purchase.</p><h2>How we approach the work</h2><ol><li><strong>Discover:</strong> understand the environment, users, pressure points and desired outcome.</li><li><strong>Design:</strong> define a practical scope, assumptions and responsibilities.</li><li><strong>Deliver:</strong> install or build, configure, test and document.</li><li><strong>Support:</strong> agree the handover, maintenance path and next priorities.</li></ol><h2>Local service, wider capability</h2><p>Our office is at Counter Business Center, Shop B08, Kasarani, Nairobi. We plan services across Kasarani, Nairobi, Ruiru, Gwakairu and surrounding metropolitan areas, subject to project requirements.</p><p>Company history, team profiles, certifications and customer evidence will be added only after verification.</p>',
	),
	'support'       => array(
		'title'   => 'Support',
		'content' => '<p>Need help with an existing installation, network, system or service? Share the equipment or service involved, what changed, and the impact on your users.</p><h2>Before requesting support</h2><ul><li>Record any error message without sharing passwords.</li><li>Note when the issue began and who is affected.</li><li>Keep equipment powered safely unless there is an electrical or physical hazard.</li></ul><p>Call <a href="tel:+254754931100">0754 931 100</a> or email <a href="mailto:edgepointinternet@gmail.com">edgepointinternet@gmail.com</a>.</p>',
	),
	'careers'       => array(
		'title'   => 'Careers',
		'content' => '<p>There are no published vacancies in this preview. Future opportunities will appear here with role requirements, location, application instructions and a closing date.</p>',
	),
	'contact'       => array(
		'title'   => 'Contact',
		'content' => '<h2>Visit our office</h2><p><strong>Counter Business Center, Shop B08<br>Kasarani, Nairobi</strong></p><p>Service planning covers Kasarani, Nairobi, Ruiru, Gwakairu and surrounding Nairobi metropolitan areas.</p><h2>Call or email</h2><p>Phone: <a href="tel:+254754931100">0754 931 100</a><br>Email: <a href="mailto:edgepointinternet@gmail.com">edgepointinternet@gmail.com</a></p><p>Facebook, TikTok and X links are published from the verified business profile.</p>',
	),
	'get-a-quote'   => array(
		'title'   => 'Get a Quote',
		'content' => '<p>Tell us what you need, where the project is located and the outcome you want. We will reply using the phone number or email you provide.</p>[edgepoint_quote_form]',
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
		'content' => '<p>Edgepoint aims to provide an inclusive website aligned with WCAG 2.2 Level AA. Verified contact details for reporting an accessibility problem will be added before production release.</p>',
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
		array( 'Firewall and edgepoint protection', 'Email and website security', 'Security audits and authorized penetration testing', 'VPN and encryption', 'Backup and disaster recovery' ),
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
	if ( get_page_by_path( $slug, OBJECT, 'edgepoint_service' ) ) {
		continue;
	}

	$list = '<ul>';
	foreach ( $service[2] as $capability ) {
		$list .= '<li>' . esc_html( $capability ) . '</li>';
	}
	$list .= '</ul>';

	wp_insert_post(
		array(
			'post_type'    => 'edgepoint_service',
			'post_status'  => 'publish',
			'post_title'   => $service[0],
			'post_name'    => $slug,
			'post_excerpt' => $service[1],
			'post_content' => '<p>' . esc_html( $service[1] ) . '</p><h2>Capabilities</h2>' . $list . '<h2>Plan the right next step</h2><p>Final scope, availability, equipment, timing and support terms are confirmed after requirements review or a site assessment.</p>',
		)
	);
}

$industries = array(
	'education'             => array( 'Schools & Universities', 'Connected learning environments, secure administration systems, campus networks and practical ICT support.' ),
	'healthcare'            => array( 'Hospitals & Clinics', 'Reliable connectivity, secure systems and carefully governed technology for sensitive healthcare environments.' ),
	'government'            => array( 'Government Institutions', 'Structured ICT planning, infrastructure and support aligned with approved procurement and governance requirements.' ),
	'ngos'                  => array( 'NGOs', 'Resilient, supportable technology for distributed teams, programmes and field operations.' ),
	'hospitality'           => array( 'Hotels & Restaurants', 'Guest Wi-Fi, communications, security and business systems designed around service continuity.' ),
	'retail'                => array( 'Retail Businesses', 'Connectivity, surveillance, devices and systems that support customer service and daily operations.' ),
	'manufacturing'         => array( 'Manufacturing Companies', 'Dependable networks, monitoring, security and support for operational environments.' ),
	'financial-services'    => array( 'Financial Institutions', 'Security-conscious infrastructure and systems subject to detailed compliance and risk review.' ),
	'religious-organizations' => array( 'Religious Organizations', 'Connectivity, audio-visual, communications and support for administration and community engagement.' ),
	'construction'          => array( 'Construction Companies', 'Site connectivity, surveillance, communications and mobile-team technology.' ),
	'real-estate'           => array( 'Real Estate Developers', 'Property connectivity, access systems, surveillance and smart infrastructure planning.' ),
	'smes'                  => array( 'SMEs', 'Practical technology foundations that can grow with the team without unnecessary complexity.' ),
	'residential'           => array( 'Homes & Residential Estates', 'Internet, Wi-Fi, security and connected-home infrastructure shaped around the property.' ),
);

foreach ( $industries as $slug => $industry ) {
	if ( get_page_by_path( $slug, OBJECT, 'edgepoint_industry' ) ) {
		continue;
	}

	wp_insert_post(
		array(
			'post_type'    => 'edgepoint_industry',
			'post_status'  => 'publish',
			'post_title'   => $industry[0],
			'post_name'    => $slug,
			'post_excerpt' => $industry[1],
			'post_content' => '<p>' . esc_html( $industry[1] ) . '</p><h2>Start with the environment</h2><p>Industry needs, compliance, users, sites and continuity expectations are reviewed before any service combination is recommended. Published customer evidence will be added only with approval.</p>',
		)
	);
}

$insights = array(
	'planning-business-wifi-nairobi' => array(
		'Planning Business Wi-Fi: Coverage Is Only the Beginning',
		'Reliable Wi-Fi depends on capacity, interference, roaming, security and the applications people actually use.',
		'<p>A strong signal icon does not guarantee a dependable Wi-Fi experience. Business Wi-Fi must be planned around how many devices connect, where people move, which applications matter and what the building does to radio signals.</p><h2>Start with users and applications</h2><p>Video calls, cloud systems, guest access and handheld devices create different demands. Document peak usage and critical areas before choosing equipment.</p><h2>Separate coverage from capacity</h2><p>One powerful access point may cover a large space but still become congested. Multiple correctly positioned access points can distribute demand and improve roaming.</p><h2>Validate after installation</h2><p>Test real devices in working conditions, document configuration and plan how firmware, passwords and guest access will be maintained.</p>',
	),
	'cybersecurity-baseline-for-smes' => array(
		'A Practical Cybersecurity Baseline for SMEs',
		'Good security begins with identity, updates, recovery and clear responsibility—not an oversized stack of tools.',
		'<p>Smaller organizations can reduce significant risk by getting a few foundations consistently right.</p><h2>Protect identities</h2><p>Use multifactor authentication, unique administrator accounts and a documented process for staff joining, changing roles or leaving.</p><h2>Maintain systems</h2><p>Keep supported software current, remove unused accounts and applications, and review internet-facing services.</p><h2>Prepare for recovery</h2><p>Back up important data, separate at least one recovery copy, and test that it can be restored. Record who makes decisions during an incident.</p><p>No organization can be promised complete security. The goal is to reduce likelihood, limit impact and improve recovery.</p>',
	),
	'ict-procurement-checklist' => array(
		'An ICT Procurement Checklist Beyond the Purchase Price',
		'Compatibility, ownership, warranty and support determine whether technology remains useful after delivery.',
		'<p>The lowest purchase price can become expensive when equipment is incompatible, unsupported or difficult to replace.</p><h2>Confirm the requirement</h2><p>Document users, environment, performance, interfaces, power and security needs before selecting a model.</p><h2>Check the full lifecycle</h2><p>Review genuine sourcing, licensing, warranty, updates, consumables, installation, training and end-of-life handling.</p><h2>Protect ownership</h2><p>Ensure the organization controls domains, cloud tenants, administrator access, subscriptions and documentation. Agree what happens when a supplier relationship ends.</p>',
	),
);

$default_post = get_page_by_path( 'hello-world', OBJECT, 'post' );
if ( $default_post ) {
	wp_delete_post( $default_post->ID, true );
}

foreach ( $insights as $slug => $insight ) {
	if ( get_page_by_path( $slug, OBJECT, 'post' ) ) {
		continue;
	}

	wp_insert_post(
		array(
			'post_type'    => 'post',
			'post_status'  => 'publish',
			'post_title'   => $insight[0],
			'post_name'    => $slug,
			'post_excerpt' => $insight[1],
			'post_content' => $insight[2],
		)
	);
}

update_option( 'blogname', 'Edgepoint Internets Solutions Ltd' );
update_option( 'blogdescription', 'Connect. Secure. Grow.' );
update_option( 'permalink_structure', '/%postname%/' );
flush_rewrite_rules();
