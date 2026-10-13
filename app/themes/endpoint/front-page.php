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
			<div class="hero__content">
				<p class="eyebrow"><?php esc_html_e( 'Integrated ICT solutions • Nairobi metropolitan area', 'endpoint' ); ?></p>
				<h1><?php esc_html_e( 'Technology that keeps your world connected and moving forward.', 'endpoint' ); ?></h1>
				<p class="hero__lead"><?php esc_html_e( 'From internet and networks to software, cloud and security, Endpoint brings essential technology services together around your goals.', 'endpoint' ); ?></p>
				<div class="button-row">
					<a class="button" href="<?php echo esc_url( home_url( '/get-a-quote/' ) ); ?>"><?php esc_html_e( 'Plan your solution', 'endpoint' ); ?></a>
					<a class="button button--ghost" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Explore services', 'endpoint' ); ?></a>
				</div>
				<ul class="hero__proof" aria-label="<?php esc_attr_e( 'Service highlights', 'endpoint' ); ?>">
					<li><?php esc_html_e( 'Homes', 'endpoint' ); ?></li>
					<li><?php esc_html_e( 'Businesses', 'endpoint' ); ?></li>
					<li><?php esc_html_e( 'Institutions', 'endpoint' ); ?></li>
				</ul>
			</div>
			<div class="hero-visual" aria-hidden="true">
				<div class="hero-visual__orbit hero-visual__orbit--one"></div>
				<div class="hero-visual__orbit hero-visual__orbit--two"></div>
				<div class="hero-visual__core">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-mark.svg' ); ?>" width="88" height="88" alt="">
				</div>
				<span class="hero-visual__node hero-visual__node--a"></span>
				<span class="hero-visual__node hero-visual__node--b"></span>
				<span class="hero-visual__node hero-visual__node--c"></span>
				<span class="hero-visual__node hero-visual__node--d"></span>
			</div>
		</div>
	</section>

	<section class="section section--intro">
		<div class="wrap split-heading">
			<div>
				<p class="eyebrow"><?php esc_html_e( 'One coordinated technology partner', 'endpoint' ); ?></p>
				<h2><?php esc_html_e( 'Start with the outcome you need.', 'endpoint' ); ?></h2>
			</div>
			<p><?php esc_html_e( 'A reliable connection, a secure workplace, a better business system or ongoing support—our service pathways make complex choices easier to navigate.', 'endpoint' ); ?></p>
		</div>
		<div class="wrap solution-grid">
			<?php foreach ( $solutions as $solution ) : ?>
				<article class="solution-card" id="<?php echo esc_attr( $solution['id'] ); ?>">
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
		<figure class="feature-image">
			<img
				src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/network-infrastructure.jpg' ); ?>"
				width="1600"
				height="836"
				loading="lazy"
				alt="<?php esc_attr_e( 'Network cables connected to data-centre equipment', 'endpoint' ); ?>"
			>
			<figcaption class="wrap">
				<?php esc_html_e( 'Contextual infrastructure image; final project photography will be added only with permission.', 'endpoint' ); ?>
			</figcaption>
		</figure>
	</section>

	<section class="section section--dark">
		<div class="wrap outcome-grid">
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Built around real environments', 'endpoint' ); ?></p>
				<h2><?php esc_html_e( 'Solutions should work together—not create more complexity.', 'endpoint' ); ?></h2>
				<p><?php esc_html_e( 'We plan across connectivity, devices, systems and support so each decision fits the wider environment. Every engagement begins with requirements, constraints and a clear handover.', 'endpoint' ); ?></p>
				<a class="text-link text-link--light" href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'How we work', 'endpoint' ); ?> <span aria-hidden="true">→</span></a>
			</div>
			<ol class="process-list">
				<li><span>01</span><div><h3><?php esc_html_e( 'Discover', 'endpoint' ); ?></h3><p><?php esc_html_e( 'Understand the site, users, risks and priorities.', 'endpoint' ); ?></p></div></li>
				<li><span>02</span><div><h3><?php esc_html_e( 'Design', 'endpoint' ); ?></h3><p><?php esc_html_e( 'Define a practical solution and transparent scope.', 'endpoint' ); ?></p></div></li>
				<li><span>03</span><div><h3><?php esc_html_e( 'Deliver', 'endpoint' ); ?></h3><p><?php esc_html_e( 'Install, configure, test and document the work.', 'endpoint' ); ?></p></div></li>
				<li><span>04</span><div><h3><?php esc_html_e( 'Support', 'endpoint' ); ?></h3><p><?php esc_html_e( 'Provide agreed guidance, maintenance and next steps.', 'endpoint' ); ?></p></div></li>
			</ol>
		</div>
	</section>

	<section class="section">
		<div class="wrap split-heading">
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Solutions by environment', 'endpoint' ); ?></p>
				<h2><?php esc_html_e( 'Technology shaped around how you operate.', 'endpoint' ); ?></h2>
			</div>
			<p><?php esc_html_e( 'Explore pathways for different environments, then talk to us about the exact combination your organization or home requires.', 'endpoint' ); ?></p>
		</div>
		<div class="wrap industry-cloud" aria-label="<?php esc_attr_e( 'Target industries and environments', 'endpoint' ); ?>">
			<?php foreach ( $industries as $industry ) : ?>
				<a href="<?php echo esc_url( home_url( '/industries/' ) ); ?>"><?php echo esc_html( $industry ); ?></a>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="section section--local">
		<div class="wrap local-card">
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
		<div class="wrap cta">
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Your next technology project', 'endpoint' ); ?></p>
				<h2><?php esc_html_e( 'Tell us what needs to work better.', 'endpoint' ); ?></h2>
				<p><?php esc_html_e( 'Share your requirements and location. We will help identify the right next step, from an initial conversation to a site assessment.', 'endpoint' ); ?></p>
			</div>
			<a class="button button--light" href="<?php echo esc_url( home_url( '/get-a-quote/' ) ); ?>"><?php esc_html_e( 'Request a quote', 'endpoint' ); ?></a>
		</div>
	</section>
</main>

<?php
get_footer();
