<?php
/**
 * Front page.
 *
 * @package Endpoint
 */

defined( 'ABSPATH' ) || exit;

get_header();

$solutions = array(
	array(
		'id'      => 'connectivity',
		'icon'    => 'connectivity',
		'title'   => __( 'Internet & connectivity', 'endpoint' ),
		'summary' => __( 'Home and business internet, fiber, Wi-Fi hotspots and Starlink installation designed around your location and use case.', 'endpoint' ),
	),
	array(
		'id'      => 'networks',
		'icon'    => 'network',
		'title'   => __( 'Networks & infrastructure', 'endpoint' ),
		'summary' => __( 'LAN, WAN, structured cabling, fiber, wireless links and secure configuration for dependable daily operations.', 'endpoint' ),
	),
	array(
		'id'      => 'security',
		'icon'    => 'security',
		'title'   => __( 'Security & protection', 'endpoint' ),
		'summary' => __( 'CCTV, access systems and cybersecurity solutions planned with privacy, resilience and responsible access in mind.', 'endpoint' ),
	),
	array(
		'id'      => 'digital-systems',
		'icon'    => 'software',
		'title'   => __( 'Software & websites', 'endpoint' ),
		'summary' => __( 'Websites, business systems, APIs and automation that turn real operational needs into maintainable digital tools.', 'endpoint' ),
	),
	array(
		'id'      => 'cloud',
		'icon'    => 'cloud',
		'title'   => __( 'Cloud & communications', 'endpoint' ),
		'summary' => __( 'Business email, cloud platforms, hosting, backup, VoIP and collaboration configured for secure, practical use.', 'endpoint' ),
	),
	array(
		'id'      => 'support',
		'icon'    => 'support',
		'title'   => __( 'Consulting, support & growth', 'endpoint' ),
		'summary' => __( 'Technology planning, equipment, technical support and digital growth services coordinated through one team.', 'endpoint' ),
	),
);

$programmes = array(
	array(
		'number'  => '01',
		'verb'    => __( 'Connect', 'endpoint' ),
		'title'   => __( 'Make every connection dependable.', 'endpoint' ),
		'summary' => __( 'Bring internet, Wi-Fi, fiber and network infrastructure into one resilient plan.', 'endpoint' ),
		'items'   => array(
			__( 'Internet and Starlink deployment', 'endpoint' ),
			__( 'LAN, WAN, fiber and structured cabling', 'endpoint' ),
			__( 'Wi-Fi, PtP and PtMP coverage', 'endpoint' ),
		),
	),
	array(
		'number'  => '02',
		'verb'    => __( 'Protect', 'endpoint' ),
		'title'   => __( 'Reduce exposure without slowing work.', 'endpoint' ),
		'summary' => __( 'Coordinate physical security, cyber controls, identity and recovery around real operational risk.', 'endpoint' ),
		'items'   => array(
			__( 'CCTV, access control and alarms', 'endpoint' ),
			__( 'Endpoint, email and network security', 'endpoint' ),
			__( 'Backup and disaster recovery', 'endpoint' ),
		),
	),
	array(
		'number'  => '03',
		'verb'    => __( 'Build', 'endpoint' ),
		'title'   => __( 'Turn workflows into useful systems.', 'endpoint' ),
		'summary' => __( 'Design websites, applications, integrations and cloud environments that are maintainable from day one.', 'endpoint' ),
		'items'   => array(
			__( 'Business systems and websites', 'endpoint' ),
			__( 'APIs, integrations and automation', 'endpoint' ),
			__( 'Cloud, email, hosting and collaboration', 'endpoint' ),
		),
	),
	array(
		'number'  => '04',
		'verb'    => __( 'Advance', 'endpoint' ),
		'title'   => __( 'Align technology with the next goal.', 'endpoint' ),
		'summary' => __( 'Combine advisory, support, equipment and digital growth into a practical improvement path.', 'endpoint' ),
		'items'   => array(
			__( 'ICT strategy and technical support', 'endpoint' ),
			__( 'Equipment and communications', 'endpoint' ),
			__( 'Digital marketing and creative services', 'endpoint' ),
		),
	),
);

$commitments = array(
	array(
		'title' => __( 'Clear scope', 'endpoint' ),
		'text'  => __( 'Requirements, assumptions and responsibilities defined before delivery.', 'endpoint' ),
	),
	array(
		'title' => __( 'Secure defaults', 'endpoint' ),
		'text'  => __( 'Privacy, access and recovery considered as part of the solution—not after it.', 'endpoint' ),
	),
	array(
		'title' => __( 'Useful handover', 'endpoint' ),
		'text'  => __( 'Testing, documentation and next steps prepared for the people who will operate it.', 'endpoint' ),
	),
);

$industries = array(
	__( 'Education', 'endpoint' ),
	__( 'Healthcare', 'endpoint' ),
	__( 'Government', 'endpoint' ),
	__( 'NGOs', 'endpoint' ),
	__( 'Hospitality', 'endpoint' ),
	__( 'Retail', 'endpoint' ),
	__( 'Manufacturing', 'endpoint' ),
	__( 'Financial services', 'endpoint' ),
	__( 'Religious organizations', 'endpoint' ),
	__( 'Construction', 'endpoint' ),
	__( 'Real estate', 'endpoint' ),
	__( 'SMEs', 'endpoint' ),
	__( 'Homes & estates', 'endpoint' ),
);
?>

<main id="main">
	<section class="hero">
		<div class="wrap hero__grid">
			<div class="hero__content" data-reveal>
				<p class="eyebrow eyebrow--light"><span></span><?php esc_html_e( 'Integrated ICT • Nairobi metropolitan area', 'endpoint' ); ?></p>
				<h1>
					<?php esc_html_e( 'Connected infrastructure.', 'endpoint' ); ?>
					<span><?php esc_html_e( 'Secure systems.', 'endpoint' ); ?></span>
					<?php esc_html_e( 'Digital momentum.', 'endpoint' ); ?>
				</h1>
				<p class="hero__lead"><?php esc_html_e( 'Endpoint plans, delivers and supports the technology your home, business or institution depends on—all through one coordinated partner.', 'endpoint' ); ?></p>
				<div class="button-row">
					<a class="button button--accent" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Explore our capabilities', 'endpoint' ); ?> <span aria-hidden="true">↗</span></a>
					<a class="button button--ghost-light" href="<?php echo esc_url( home_url( '/get-a-quote/' ) ); ?>"><?php esc_html_e( 'Plan a solution', 'endpoint' ); ?></a>
				</div>
			</div>
			<div class="hero-visual" data-reveal>
				<div class="hero-visual__orbit hero-visual__orbit--one"></div>
				<div class="hero-visual__orbit hero-visual__orbit--two"></div>
				<div class="hero-visual__photo">
					<img
						src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/connectivity-installation.jpg' ); ?>"
						width="1280"
						height="720"
						alt="<?php esc_attr_e( 'ICT engineer testing network cabling in a modern office', 'endpoint' ); ?>"
					>
				</div>
				<div class="hero-visual__core">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-mark.svg' ); ?>" width="88" height="88" alt="">
				</div>
				<span class="hero-visual__node hero-visual__node--a" aria-hidden="true"></span>
				<span class="hero-visual__node hero-visual__node--b" aria-hidden="true"></span>
				<span class="hero-visual__node hero-visual__node--c" aria-hidden="true"></span>
				<span class="hero-visual__node hero-visual__node--d" aria-hidden="true"></span>
				<div class="signal-card signal-card--network"><span></span><?php esc_html_e( 'Network ready', 'endpoint' ); ?></div>
				<div class="signal-card signal-card--secure"><span></span><?php esc_html_e( 'Secure by design', 'endpoint' ); ?></div>
				<div class="signal-card signal-card--scale"><span></span><?php esc_html_e( 'Built to evolve', 'endpoint' ); ?></div>
			</div>
		</div>
		<div class="wrap hero__scroll">
			<a href="#capabilities"><?php esc_html_e( 'Explore the system', 'endpoint' ); ?><span aria-hidden="true">↓</span></a>
		</div>
	</section>

	<section class="signal-strip" aria-label="<?php esc_attr_e( 'Endpoint service facts', 'endpoint' ); ?>">
		<div class="wrap signal-strip__grid">
			<div><strong>12</strong><span><?php esc_html_e( 'connected service families', 'endpoint' ); ?></span></div>
			<div><strong>24/7</strong><span><?php esc_html_e( 'stated service availability', 'endpoint' ); ?></span></div>
			<div><strong><?php esc_html_e( 'Kasarani', 'endpoint' ); ?></strong><span><?php esc_html_e( 'local office in Nairobi', 'endpoint' ); ?></span></div>
			<div><strong><?php esc_html_e( 'End-to-end', 'endpoint' ); ?></strong><span><?php esc_html_e( 'plan, deliver and support', 'endpoint' ); ?></span></div>
		</div>
	</section>

	<section class="section section--programmes" id="capabilities">
		<div class="wrap section-heading section-heading--wide" data-reveal>
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Technology as one connected system', 'endpoint' ); ?></p>
				<h2><?php esc_html_e( 'Four outcomes. One accountable direction.', 'endpoint' ); ?></h2>
			</div>
			<p><?php esc_html_e( 'The strongest technology decisions work across infrastructure, security, systems and people. Start with the outcome, then combine only the capabilities the environment needs.', 'endpoint' ); ?></p>
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
				<p class="eyebrow"><?php esc_html_e( 'Physical and digital, planned together', 'endpoint' ); ?></p>
				<h3><?php esc_html_e( 'The network, cloud and software should strengthen each other.', 'endpoint' ); ?></h3>
				<p><?php esc_html_e( 'Endpoint connects infrastructure decisions with the systems and people that depend on them—reducing hand-offs and avoiding technology that works only in isolation.', 'endpoint' ); ?></p>
				<a class="text-link" href="<?php echo esc_url( home_url( '/services/software-website-development/' ) ); ?>"><?php esc_html_e( 'Explore software and digital systems', 'endpoint' ); ?> <span aria-hidden="true">↗</span></a>
			</div>
			<figure data-reveal>
				<img
					src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/software-cloud-team.jpg' ); ?>"
					width="1280"
					height="720"
					loading="lazy"
					alt="<?php esc_attr_e( 'Technology team collaborating around laptops in a bright workspace', 'endpoint' ); ?>"
				>
				<figcaption><?php esc_html_e( 'Demonstrative image; not an Endpoint employee or customer project.', 'endpoint' ); ?></figcaption>
			</figure>
		</div>
	</section>

	<section class="capability-ribbon" aria-label="<?php esc_attr_e( 'Endpoint capabilities', 'endpoint' ); ?>">
		<div>
			<span><?php esc_html_e( 'Internet', 'endpoint' ); ?></span>
			<span><?php esc_html_e( 'Networks', 'endpoint' ); ?></span>
			<span><?php esc_html_e( 'Starlink', 'endpoint' ); ?></span>
			<span><?php esc_html_e( 'Cybersecurity', 'endpoint' ); ?></span>
			<span><?php esc_html_e( 'Software', 'endpoint' ); ?></span>
			<span><?php esc_html_e( 'Cloud', 'endpoint' ); ?></span>
			<span><?php esc_html_e( 'CCTV', 'endpoint' ); ?></span>
			<span><?php esc_html_e( 'ICT support', 'endpoint' ); ?></span>
			<span><?php esc_html_e( 'Telecommunications', 'endpoint' ); ?></span>
			<span><?php esc_html_e( 'Digital growth', 'endpoint' ); ?></span>
		</div>
	</section>

	<section class="section section--intro">
		<div class="wrap split-heading" data-reveal>
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Every capability, clearly connected', 'endpoint' ); ?></p>
				<h2><?php esc_html_e( 'Explore the full technology landscape.', 'endpoint' ); ?></h2>
			</div>
			<p><?php esc_html_e( 'Go deeper by service family, or let us help connect several disciplines into one practical solution.', 'endpoint' ); ?></p>
		</div>
		<div class="wrap solution-grid">
			<?php foreach ( $solutions as $solution ) : ?>
				<article class="solution-card" id="<?php echo esc_attr( $solution['id'] ); ?>" data-reveal>
					<div class="solution-card__icon"><?php echo endpoint_icon( $solution['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<h3><?php echo esc_html( $solution['title'] ); ?></h3>
					<p><?php echo esc_html( $solution['summary'] ); ?></p>
					<a href="<?php echo esc_url( home_url( '/services/#' . $solution['id'] ) ); ?>">
						<?php esc_html_e( 'View capabilities', 'endpoint' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</article>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="section infrastructure-story">
		<div class="wrap infrastructure-story__grid">
			<figure data-reveal>
				<img
					src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/network-infrastructure.jpg' ); ?>"
					width="1600"
					height="836"
					loading="lazy"
					alt="<?php esc_attr_e( 'Network cables connected to data-centre equipment', 'endpoint' ); ?>"
				>
				<figcaption><?php esc_html_e( 'Contextual infrastructure image; final project photography requires permission.', 'endpoint' ); ?></figcaption>
			</figure>
			<div data-reveal>
				<p class="eyebrow eyebrow--light"><?php esc_html_e( 'Built for operational reality', 'endpoint' ); ?></p>
				<h2><?php esc_html_e( 'The visible installation is only part of the solution.', 'endpoint' ); ?></h2>
				<p><?php esc_html_e( 'Dependability comes from what sits behind it: considered design, secure configuration, tested handover and a support path people understand.', 'endpoint' ); ?></p>
				<a class="text-link text-link--light" href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'Discover our approach', 'endpoint' ); ?> <span aria-hidden="true">↗</span></a>
			</div>
		</div>
	</section>

	<section class="section section--dark">
		<div class="wrap outcome-grid">
			<div data-reveal>
				<p class="eyebrow"><?php esc_html_e( 'A repeatable delivery rhythm', 'endpoint' ); ?></p>
				<h2><?php esc_html_e( 'From unclear requirement to confident operation.', 'endpoint' ); ?></h2>
				<p><?php esc_html_e( 'We plan across connectivity, devices, systems and support so each decision fits the wider environment. Every engagement begins with requirements, constraints and a clear handover.', 'endpoint' ); ?></p>
				<a class="text-link text-link--light" href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'How we work', 'endpoint' ); ?> <span aria-hidden="true">→</span></a>
			</div>
			<ol class="process-list" data-reveal>
				<li><span>01</span><div><h3><?php esc_html_e( 'Discover', 'endpoint' ); ?></h3><p><?php esc_html_e( 'Understand the site, users, risks and priorities.', 'endpoint' ); ?></p></div></li>
				<li><span>02</span><div><h3><?php esc_html_e( 'Design', 'endpoint' ); ?></h3><p><?php esc_html_e( 'Define a practical solution and transparent scope.', 'endpoint' ); ?></p></div></li>
				<li><span>03</span><div><h3><?php esc_html_e( 'Deliver', 'endpoint' ); ?></h3><p><?php esc_html_e( 'Install, configure, test and document the work.', 'endpoint' ); ?></p></div></li>
				<li><span>04</span><div><h3><?php esc_html_e( 'Support', 'endpoint' ); ?></h3><p><?php esc_html_e( 'Provide agreed guidance, maintenance and next steps.', 'endpoint' ); ?></p></div></li>
			</ol>
		</div>
	</section>

	<section class="section section--commitments">
		<div class="wrap commitment-intro" data-reveal>
			<p class="eyebrow"><?php esc_html_e( 'What dependable delivery looks like', 'endpoint' ); ?></p>
			<h2><?php esc_html_e( 'Professionalism you can see in the work.', 'endpoint' ); ?></h2>
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
				<p class="eyebrow"><?php esc_html_e( 'Solutions by environment', 'endpoint' ); ?></p>
				<h2><?php esc_html_e( 'Technology shaped around how you operate.', 'endpoint' ); ?></h2>
			</div>
			<p><?php esc_html_e( 'Explore pathways for different environments, then talk to us about the exact combination your organization or home requires.', 'endpoint' ); ?></p>
		</div>
		<div class="wrap industry-cloud" aria-label="<?php esc_attr_e( 'Target industries and environments', 'endpoint' ); ?>" data-reveal>
			<?php foreach ( $industries as $industry ) : ?>
				<a href="<?php echo esc_url( home_url( '/industries/' ) ); ?>"><?php echo esc_html( $industry ); ?></a>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="section section--local">
		<div class="wrap local-card" data-reveal>
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Local service, wider capability', 'endpoint' ); ?></p>
				<h2><?php esc_html_e( 'Based in Kasarani. Serving Nairobi and surrounding areas.', 'endpoint' ); ?></h2>
				<p><?php echo esc_html( endpoint_business_detail( 'service_area' ) ); ?>.</p>
			</div>
			<div class="local-card__address">
				<span><?php esc_html_e( 'Visit our office', 'endpoint' ); ?></span>
				<strong><?php echo esc_html( endpoint_business_detail( 'address' ) ); ?></strong>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Plan a visit', 'endpoint' ); ?> <span aria-hidden="true">→</span></a>
			</div>
		</div>
	</section>

	<section class="section section--cta">
		<div class="wrap cta" data-reveal>
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Your next technology project', 'endpoint' ); ?></p>
				<h2><?php esc_html_e( 'Tell us what needs to work better.', 'endpoint' ); ?></h2>
				<p><?php esc_html_e( 'Share your requirements and location. We will help identify the right next step, from an initial conversation to a site assessment.', 'endpoint' ); ?></p>
			</div>
			<div class="cta__actions">
				<a class="button button--light" href="<?php echo esc_url( home_url( '/get-a-quote/' ) ); ?>"><?php esc_html_e( 'Request a quote', 'endpoint' ); ?></a>
				<a class="text-link text-link--light" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Visit or contact us', 'endpoint' ); ?> <span aria-hidden="true">↗</span></a>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
