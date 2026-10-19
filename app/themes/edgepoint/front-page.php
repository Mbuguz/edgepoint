<?php
/**
 * Front page.
 *
 * @package Edgepoint
 */

defined( 'ABSPATH' ) || exit;

get_header();

$solutions = array(
	array(
		'id'      => 'connectivity',
		'icon'    => 'connectivity',
		'title'   => __( 'Internet & connectivity', 'edgepoint' ),
		'summary' => __( 'Home and business internet, fiber, Wi-Fi hotspots and Starlink installation designed around your location and use case.', 'edgepoint' ),
	),
	array(
		'id'      => 'networks',
		'icon'    => 'network',
		'title'   => __( 'Networks & infrastructure', 'edgepoint' ),
		'summary' => __( 'LAN, WAN, structured cabling, fiber, wireless links and secure configuration for dependable daily operations.', 'edgepoint' ),
	),
	array(
		'id'      => 'security',
		'icon'    => 'security',
		'title'   => __( 'Security & protection', 'edgepoint' ),
		'summary' => __( 'CCTV, access systems and cybersecurity solutions planned with privacy, resilience and responsible access in mind.', 'edgepoint' ),
	),
	array(
		'id'      => 'digital-systems',
		'icon'    => 'software',
		'title'   => __( 'Software & websites', 'edgepoint' ),
		'summary' => __( 'Websites, business systems, APIs and automation that turn real operational needs into maintainable digital tools.', 'edgepoint' ),
	),
	array(
		'id'      => 'cloud',
		'icon'    => 'cloud',
		'title'   => __( 'Cloud & communications', 'edgepoint' ),
		'summary' => __( 'Business email, cloud platforms, hosting, backup, VoIP and collaboration configured for secure, practical use.', 'edgepoint' ),
	),
	array(
		'id'      => 'support',
		'icon'    => 'support',
		'title'   => __( 'Consulting, support & growth', 'edgepoint' ),
		'summary' => __( 'Technology planning, equipment, technical support and digital growth services coordinated through one team.', 'edgepoint' ),
	),
);

$programmes = array(
	array(
		'number'  => '01',
		'verb'    => __( 'Connect', 'edgepoint' ),
		'title'   => __( 'Make every connection dependable.', 'edgepoint' ),
		'summary' => __( 'Bring internet, Wi-Fi, fiber and network infrastructure into one resilient plan.', 'edgepoint' ),
		'items'   => array(
			__( 'Internet and Starlink deployment', 'edgepoint' ),
			__( 'LAN, WAN, fiber and structured cabling', 'edgepoint' ),
			__( 'Wi-Fi, PtP and PtMP coverage', 'edgepoint' ),
		),
	),
	array(
		'number'  => '02',
		'verb'    => __( 'Protect', 'edgepoint' ),
		'title'   => __( 'Reduce exposure without slowing work.', 'edgepoint' ),
		'summary' => __( 'Coordinate physical security, cyber controls, identity and recovery around real operational risk.', 'edgepoint' ),
		'items'   => array(
			__( 'CCTV, access control and alarms', 'edgepoint' ),
			__( 'Firewall, email and network security', 'edgepoint' ),
			__( 'Backup and disaster recovery', 'edgepoint' ),
		),
	),
	array(
		'number'  => '03',
		'verb'    => __( 'Build', 'edgepoint' ),
		'title'   => __( 'Turn workflows into useful systems.', 'edgepoint' ),
		'summary' => __( 'Design websites, applications, integrations and cloud environments that are maintainable from day one.', 'edgepoint' ),
		'items'   => array(
			__( 'Business systems and websites', 'edgepoint' ),
			__( 'APIs, integrations and automation', 'edgepoint' ),
			__( 'Cloud, email, hosting and collaboration', 'edgepoint' ),
		),
	),
	array(
		'number'  => '04',
		'verb'    => __( 'Advance', 'edgepoint' ),
		'title'   => __( 'Align technology with the next goal.', 'edgepoint' ),
		'summary' => __( 'Combine advisory, support, equipment and digital growth into a practical improvement path.', 'edgepoint' ),
		'items'   => array(
			__( 'ICT strategy and technical support', 'edgepoint' ),
			__( 'Equipment and communications', 'edgepoint' ),
			__( 'Digital marketing and creative services', 'edgepoint' ),
		),
	),
);

$commitments = array(
	array(
		'title' => __( 'Clear scope', 'edgepoint' ),
		'text'  => __( 'Requirements, assumptions and responsibilities defined before delivery.', 'edgepoint' ),
	),
	array(
		'title' => __( 'Secure defaults', 'edgepoint' ),
		'text'  => __( 'Privacy, access and recovery considered as part of the solution—not after it.', 'edgepoint' ),
	),
	array(
		'title' => __( 'Useful handover', 'edgepoint' ),
		'text'  => __( 'Testing, documentation and next steps prepared for the people who will operate it.', 'edgepoint' ),
	),
);

$industries = array(
	__( 'Education', 'edgepoint' ),
	__( 'Healthcare', 'edgepoint' ),
	__( 'Government', 'edgepoint' ),
	__( 'NGOs', 'edgepoint' ),
	__( 'Hospitality', 'edgepoint' ),
	__( 'Retail', 'edgepoint' ),
	__( 'Manufacturing', 'edgepoint' ),
	__( 'Financial services', 'edgepoint' ),
	__( 'Religious organizations', 'edgepoint' ),
	__( 'Construction', 'edgepoint' ),
	__( 'Real estate', 'edgepoint' ),
	__( 'SMEs', 'edgepoint' ),
	__( 'Homes & estates', 'edgepoint' ),
);

$capabilities = array(
	__( 'Internet', 'edgepoint' ),
	__( 'Networks', 'edgepoint' ),
	__( 'Starlink', 'edgepoint' ),
	__( 'Cybersecurity', 'edgepoint' ),
	__( 'Software', 'edgepoint' ),
	__( 'Cloud', 'edgepoint' ),
	__( 'CCTV', 'edgepoint' ),
	__( 'ICT support', 'edgepoint' ),
	__( 'Telecommunications', 'edgepoint' ),
	__( 'Digital growth', 'edgepoint' ),
);
?>

<main id="main">
	<section class="hero">
		<div class="wrap hero__grid">
			<div class="hero__content" data-reveal>
				<p class="eyebrow eyebrow--light"><span></span><?php esc_html_e( 'Integrated ICT • Nairobi metropolitan area', 'edgepoint' ); ?></p>
				<h1>
					<?php esc_html_e( 'Connected infrastructure.', 'edgepoint' ); ?>
					<span><?php esc_html_e( 'Secure systems.', 'edgepoint' ); ?></span>
					<?php esc_html_e( 'Digital momentum.', 'edgepoint' ); ?>
				</h1>
				<p class="hero__lead"><?php esc_html_e( 'Edgepoint plans, delivers and supports the technology your home, business or institution depends on—all through one coordinated partner.', 'edgepoint' ); ?></p>
				<div class="button-row">
					<a class="button button--accent" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Explore our capabilities', 'edgepoint' ); ?> <span aria-hidden="true">↗</span></a>
					<a class="button button--ghost-light" href="<?php echo esc_url( home_url( '/get-a-quote/' ) ); ?>"><?php esc_html_e( 'Plan a solution', 'edgepoint' ); ?></a>
				</div>
				<p class="hero__craft"><a href="#website-craft"><?php esc_html_e( 'We design websites like this one.', 'edgepoint' ); ?></a></p>
			</div>
			<div class="hero-visual" data-reveal>
				<div class="hero-visual__orbit hero-visual__orbit--one"></div>
				<div class="hero-visual__orbit hero-visual__orbit--two"></div>
				<div class="hero-visual__photo">
					<picture>
						<source srcset="<?php echo esc_url( get_template_directory_uri() . '/assets/images/connectivity-installation.webp' ); ?>" type="image/webp">
						<img
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/connectivity-installation.jpg' ); ?>"
							width="1280"
							height="720"
							fetchpriority="high"
							alt="<?php esc_attr_e( 'ICT engineer testing network cabling in a modern office', 'edgepoint' ); ?>"
						>
					</picture>
				</div>
				<div class="hero-visual__core">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-mark.png' ); ?>" width="480" height="359" alt="">
				</div>
				<span class="hero-visual__node hero-visual__node--a" aria-hidden="true"></span>
				<span class="hero-visual__node hero-visual__node--b" aria-hidden="true"></span>
				<span class="hero-visual__node hero-visual__node--c" aria-hidden="true"></span>
				<span class="hero-visual__node hero-visual__node--d" aria-hidden="true"></span>
				<div class="signal-card signal-card--network"><span></span><?php esc_html_e( 'Network ready', 'edgepoint' ); ?></div>
				<div class="signal-card signal-card--secure"><span></span><?php esc_html_e( 'Secure by design', 'edgepoint' ); ?></div>
				<div class="signal-card signal-card--scale"><span></span><?php esc_html_e( 'Built to evolve', 'edgepoint' ); ?></div>
			</div>
		</div>
		<div class="wrap hero__scroll">
			<a href="#capabilities"><?php esc_html_e( 'Explore the system', 'edgepoint' ); ?><span aria-hidden="true">↓</span></a>
		</div>
	</section>

	<section class="signal-strip" aria-label="<?php esc_attr_e( 'Edgepoint service facts', 'edgepoint' ); ?>">
		<div class="wrap signal-strip__grid">
			<div><strong>12</strong><span><?php esc_html_e( 'connected service families', 'edgepoint' ); ?></span></div>
			<div><strong>24/7</strong><span><?php esc_html_e( 'stated service availability', 'edgepoint' ); ?></span></div>
			<div><strong><?php esc_html_e( 'Kasarani', 'edgepoint' ); ?></strong><span><?php esc_html_e( 'local office in Nairobi', 'edgepoint' ); ?></span></div>
			<div><strong><?php esc_html_e( 'End-to-end', 'edgepoint' ); ?></strong><span><?php esc_html_e( 'plan, deliver and support', 'edgepoint' ); ?></span></div>
		</div>
	</section>

	<section class="section section--programmes" id="capabilities">
		<div class="wrap section-heading section-heading--wide" data-reveal>
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Technology as one connected system', 'edgepoint' ); ?></p>
				<h2><?php esc_html_e( 'Four outcomes. One accountable direction.', 'edgepoint' ); ?></h2>
			</div>
			<p><?php esc_html_e( 'The strongest technology decisions work across infrastructure, security, systems and people. Start with the outcome, then combine only the capabilities the environment needs.', 'edgepoint' ); ?></p>
		</div>
		<div class="wrap programme-grid">
			<?php foreach ( $programmes as $programme ) : ?>
				<article class="programme-card" data-reveal>
					<header>
						<span><?php echo esc_html( $programme['number'] ); ?></span>
						<p><?php echo esc_html( $programme['verb'] ); ?></p>
					</header>
					<h3><?php echo esc_html( $programme['title'] ); ?></h3>
					<p><?php echo esc_html( $programme['summary'] ); ?></p>
					<ul>
						<?php foreach ( $programme['items'] as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="wrap digital-feature">
			<div data-reveal>
				<p class="eyebrow"><?php esc_html_e( 'Physical and digital, planned together', 'edgepoint' ); ?></p>
				<h3><?php esc_html_e( 'The network, cloud and software should strengthen each other.', 'edgepoint' ); ?></h3>
				<p><?php esc_html_e( 'Edgepoint connects infrastructure decisions with the systems and people that depend on them—reducing hand-offs and avoiding technology that works only in isolation.', 'edgepoint' ); ?></p>
				<a class="text-link" href="<?php echo esc_url( home_url( '/services/software-website-development/' ) ); ?>"><?php esc_html_e( 'Explore software and digital systems', 'edgepoint' ); ?> <span aria-hidden="true">↗</span></a>
			</div>
			<figure data-reveal>
				<picture>
					<source srcset="<?php echo esc_url( get_template_directory_uri() . '/assets/images/software-cloud-team.webp' ); ?>" type="image/webp">
					<img
						src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/software-cloud-team.jpg' ); ?>"
						width="1280"
						height="720"
						loading="lazy"
						alt="<?php esc_attr_e( 'Technology team collaborating around laptops in a bright workspace', 'edgepoint' ); ?>"
					>
				</picture>
			</figure>
		</div>
	</section>

	<section class="capability-ribbon" aria-label="<?php esc_attr_e( 'Edgepoint capabilities', 'edgepoint' ); ?>">
		<div class="capability-ribbon__track">
			<?php for ( $ribbon_copy = 0; $ribbon_copy < 2; $ribbon_copy++ ) : ?>
				<div<?php echo 1 === $ribbon_copy ? ' aria-hidden="true"' : ''; ?>>
					<?php foreach ( $capabilities as $capability ) : ?>
						<span><?php echo esc_html( $capability ); ?></span>
					<?php endforeach; ?>
				</div>
			<?php endfor; ?>
		</div>
	</section>

	<section class="section studio" id="website-craft">
		<div class="wrap studio__layout">
			<div class="studio__copy" data-reveal>
				<p class="eyebrow"><?php esc_html_e( 'Websites we design', 'edgepoint' ); ?></p>
				<h2><?php esc_html_e( 'This page is the kind of website we build.', 'edgepoint' ); ?></h2>
				<p><?php esc_html_e( 'Edgepoint designs sites for businesses that sell infrastructure, security and services. The page you are on is the example: your colours, your logo, and a clear way to call or write.', 'edgepoint' ); ?></p>
				<ul class="studio__points">
					<li>
						<strong><?php esc_html_e( 'Your identity stays in front.', 'edgepoint' ); ?></strong>
						<?php esc_html_e( 'Sky blue, white and the real mark are kept. The layout is written for the business, not pulled from a generic template.', 'edgepoint' ); ?>
					</li>
					<li>
						<strong><?php esc_html_e( 'The page is built to be read.', 'edgepoint' ); ?></strong>
						<?php esc_html_e( 'Type, spacing and images stay light so the site opens cleanly on a phone and stays comfortable to scan.', 'edgepoint' ); ?>
					</li>
					<li>
						<strong><?php esc_html_e( 'Reaching you is obvious.', 'edgepoint' ); ?></strong>
						<?php esc_html_e( 'Phone, email, WhatsApp and the quote form sit where a visitor looks first.', 'edgepoint' ); ?>
					</li>
				</ul>
				<div class="studio__actions">
					<a class="button button--accent" href="<?php echo esc_url( home_url( '/services/software-website-development/' ) ); ?>"><?php esc_html_e( 'Scope a website', 'edgepoint' ); ?> <span aria-hidden="true">↗</span></a>
					<a class="text-link" href="<?php echo esc_url( home_url( '/get-a-quote/' ) ); ?>"><?php esc_html_e( 'Request a website quote', 'edgepoint' ); ?> <span aria-hidden="true">→</span></a>
				</div>
			</div>
			<figure class="studio-stage" data-reveal>
				<div class="studio-frame" aria-hidden="true">
					<div class="studio-frame__chrome">
						<span></span>
						<span></span>
						<span></span>
						<p>edgepoint-internet.com</p>
					</div>
					<div class="studio-frame__page">
						<div class="studio-frame__bar">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-mark.png' ); ?>" width="480" height="359" alt="">
							<div class="studio-frame__nav"><i></i><i></i><i></i></div>
						</div>
						<p class="studio-frame__kicker"><?php esc_html_e( 'Nairobi', 'edgepoint' ); ?></p>
						<p class="studio-frame__title"><?php esc_html_e( 'Connected', 'edgepoint' ); ?><br><em><?php esc_html_e( 'Secure', 'edgepoint' ); ?></em><br><?php esc_html_e( 'Digital', 'edgepoint' ); ?></p>
						<div class="studio-frame__chips">
							<b><?php esc_html_e( 'Internet', 'edgepoint' ); ?></b>
							<b><?php esc_html_e( 'Security', 'edgepoint' ); ?></b>
							<b><?php esc_html_e( 'Websites', 'edgepoint' ); ?></b>
						</div>
					</div>
				</div>
				<figcaption><?php esc_html_e( 'A drawing of this homepage. The live page is the finished example.', 'edgepoint' ); ?></figcaption>
			</figure>
		</div>
	</section>

	<section class="section section--intro">
		<div class="wrap split-heading" data-reveal>
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Every capability, clearly connected', 'edgepoint' ); ?></p>
				<h2><?php esc_html_e( 'Explore the full technology landscape.', 'edgepoint' ); ?></h2>
			</div>
			<p><?php esc_html_e( 'Go deeper by service family, or let us help connect several disciplines into one practical solution.', 'edgepoint' ); ?></p>
		</div>
		<div class="wrap solution-grid">
			<?php foreach ( $solutions as $solution ) : ?>
				<article class="solution-card" id="<?php echo esc_attr( $solution['id'] ); ?>" data-reveal>
					<div class="solution-card__icon"><?php echo edgepoint_icon( $solution['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<h3><?php echo esc_html( $solution['title'] ); ?></h3>
					<p><?php echo esc_html( $solution['summary'] ); ?></p>
					<a href="<?php echo esc_url( home_url( '/services/#' . $solution['id'] ) ); ?>">
						<?php esc_html_e( 'View capabilities', 'edgepoint' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</article>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="section infrastructure-story">
		<div class="wrap infrastructure-story__grid">
			<div class="work-pair" data-reveal>
				<figure class="work-pair__main">
					<picture>
						<source srcset="<?php echo esc_url( get_template_directory_uri() . '/assets/images/completed-structured-cabling.webp' ); ?>" type="image/webp">
						<img
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/completed-structured-cabling.jpg' ); ?>"
							width="1080"
							height="1442"
							loading="lazy"
							alt="<?php esc_attr_e( 'Completed network rack with neatly routed green and white structured cabling', 'edgepoint' ); ?>"
						>
					</picture>
				</figure>
				<figure class="work-pair__accent">
					<picture>
						<source srcset="<?php echo esc_url( get_template_directory_uri() . '/assets/images/completed-wireless-tower.webp' ); ?>" type="image/webp">
						<img
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/completed-wireless-tower.jpg' ); ?>"
							width="1080"
							height="1440"
							loading="lazy"
							alt="<?php esc_attr_e( 'Completed telecommunications tower with installed wireless antennas', 'edgepoint' ); ?>"
						>
					</picture>
				</figure>
			</div>
			<div data-reveal>
				<p class="eyebrow eyebrow--light"><?php esc_html_e( 'Built for operational reality', 'edgepoint' ); ?></p>
				<h2><?php esc_html_e( 'The visible installation is only part of the solution.', 'edgepoint' ); ?></h2>
				<p><?php esc_html_e( 'Dependability comes from what sits behind it: considered design, secure configuration, tested handover and a support path people understand.', 'edgepoint' ); ?></p>
				<a class="text-link text-link--light" href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'Discover our approach', 'edgepoint' ); ?> <span aria-hidden="true">↗</span></a>
			</div>
		</div>
	</section>

	<section class="section section--dark">
		<div class="wrap outcome-grid">
			<div data-reveal>
				<p class="eyebrow"><?php esc_html_e( 'A repeatable delivery rhythm', 'edgepoint' ); ?></p>
				<h2><?php esc_html_e( 'From unclear requirement to confident operation.', 'edgepoint' ); ?></h2>
				<p><?php esc_html_e( 'We plan across connectivity, devices, systems and support so each decision fits the wider environment. Every engagement begins with requirements, constraints and a clear handover.', 'edgepoint' ); ?></p>
				<a class="text-link text-link--light" href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'How we work', 'edgepoint' ); ?> <span aria-hidden="true">→</span></a>
			</div>
			<ol class="process-list" data-reveal>
				<li><span>01</span><div><h3><?php esc_html_e( 'Discover', 'edgepoint' ); ?></h3><p><?php esc_html_e( 'Understand the site, users, risks and priorities.', 'edgepoint' ); ?></p></div></li>
				<li><span>02</span><div><h3><?php esc_html_e( 'Design', 'edgepoint' ); ?></h3><p><?php esc_html_e( 'Define a practical solution and transparent scope.', 'edgepoint' ); ?></p></div></li>
				<li><span>03</span><div><h3><?php esc_html_e( 'Deliver', 'edgepoint' ); ?></h3><p><?php esc_html_e( 'Install, configure, test and document the work.', 'edgepoint' ); ?></p></div></li>
				<li><span>04</span><div><h3><?php esc_html_e( 'Support', 'edgepoint' ); ?></h3><p><?php esc_html_e( 'Provide agreed guidance, maintenance and next steps.', 'edgepoint' ); ?></p></div></li>
			</ol>
		</div>
	</section>

	<section class="section section--commitments">
		<div class="wrap commitment-intro" data-reveal>
			<p class="eyebrow"><?php esc_html_e( 'What dependable delivery looks like', 'edgepoint' ); ?></p>
			<h2><?php esc_html_e( 'Professionalism you can see in the work.', 'edgepoint' ); ?></h2>
		</div>
		<div class="wrap commitment-grid">
			<?php foreach ( $commitments as $index => $commitment ) : ?>
				<article data-reveal>
					<span>0<?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
					<h3><?php echo esc_html( $commitment['title'] ); ?></h3>
					<p><?php echo esc_html( $commitment['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="section">
		<div class="wrap split-heading" data-reveal>
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Solutions by environment', 'edgepoint' ); ?></p>
				<h2><?php esc_html_e( 'Technology shaped around how you operate.', 'edgepoint' ); ?></h2>
			</div>
			<p><?php esc_html_e( 'Explore pathways for different environments, then talk to us about the exact combination your organization or home requires.', 'edgepoint' ); ?></p>
		</div>
		<div class="wrap industry-cloud" aria-label="<?php esc_attr_e( 'Target industries and environments', 'edgepoint' ); ?>" data-reveal>
			<?php foreach ( $industries as $industry ) : ?>
				<a href="<?php echo esc_url( home_url( '/industries/' ) ); ?>"><?php echo esc_html( $industry ); ?></a>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="section section--local">
		<div class="wrap local-card" data-reveal>
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Local service, wider capability', 'edgepoint' ); ?></p>
				<h2><?php esc_html_e( 'Based in Kasarani. Serving Nairobi and surrounding areas.', 'edgepoint' ); ?></h2>
				<p><?php echo esc_html( edgepoint_business_detail( 'service_area' ) ); ?>.</p>
			</div>
			<div class="local-card__address">
				<span><?php esc_html_e( 'Visit our office', 'edgepoint' ); ?></span>
				<strong><?php echo esc_html( edgepoint_business_detail( 'address' ) ); ?></strong>
				<a href="<?php echo esc_url( edgepoint_maps_href( edgepoint_business_detail( 'address' ) ) ); ?>"><?php esc_html_e( 'Get directions', 'edgepoint' ); ?> <span aria-hidden="true">→</span></a>
			</div>
		</div>
	</section>

	<section class="section section--cta">
		<div class="wrap cta" data-reveal>
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Your next technology project', 'edgepoint' ); ?></p>
				<h2><?php esc_html_e( 'Tell us what needs to work better.', 'edgepoint' ); ?></h2>
				<p><?php esc_html_e( 'Share your requirements and location. We will help identify the right next step, from an initial conversation to a site assessment.', 'edgepoint' ); ?></p>
			</div>
			<div class="cta__actions">
				<a class="button button--light" href="<?php echo esc_url( home_url( '/get-a-quote/' ) ); ?>"><?php esc_html_e( 'Request a quote', 'edgepoint' ); ?></a>
				<a class="text-link text-link--light" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Visit or contact us', 'edgepoint' ); ?> <span aria-hidden="true">↗</span></a>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
