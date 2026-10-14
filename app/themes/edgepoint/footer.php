<?php
/**
 * Site footer.
 *
 * @package Edgepoint
 */

defined( 'ABSPATH' ) || exit;
?>
<footer class="site-footer">
	<div class="wrap site-footer__grid">
		<div class="site-footer__brand">
			<?php edgepoint_brand(); ?>
			<p><?php esc_html_e( 'Integrated ICT solutions for homes, businesses and institutions across Nairobi and the surrounding metropolitan area.', 'edgepoint' ); ?></p>
		</div>
		<div>
			<h2><?php esc_html_e( 'Solutions', 'edgepoint' ); ?></h2>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/services/#connectivity' ) ); ?>"><?php esc_html_e( 'Connectivity', 'edgepoint' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/services/#networks' ) ); ?>"><?php esc_html_e( 'Networks', 'edgepoint' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/services/#security' ) ); ?>"><?php esc_html_e( 'Security', 'edgepoint' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/services/#digital-systems' ) ); ?>"><?php esc_html_e( 'Digital systems', 'edgepoint' ); ?></a></li>
			</ul>
		</div>
		<div>
			<h2><?php esc_html_e( 'Company', 'edgepoint' ); ?></h2>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'edgepoint' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>"><?php esc_html_e( 'Portfolio', 'edgepoint' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/careers/' ) ); ?>"><?php esc_html_e( 'Careers', 'edgepoint' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/support/' ) ); ?>"><?php esc_html_e( 'Support', 'edgepoint' ); ?></a></li>
			</ul>
		</div>
		<div>
			<h2><?php esc_html_e( 'Visit us', 'edgepoint' ); ?></h2>
			<address><?php echo esc_html( edgepoint_business_detail( 'address' ) ); ?></address>
			<p><a href="<?php echo esc_url( edgepoint_maps_href( edgepoint_business_detail( 'address' ) ) ); ?>"><?php esc_html_e( 'Get directions', 'edgepoint' ); ?></a></p>
			<p><?php echo esc_html( edgepoint_business_detail( 'service_area' ) ); ?></p>
			<p class="contact-lines">
				<a href="<?php echo esc_url( edgepoint_phone_href( edgepoint_business_detail( 'phone' ) ) ); ?>"><?php echo esc_html( edgepoint_phone_label( edgepoint_business_detail( 'phone' ) ) ); ?></a>
				<a href="<?php echo esc_url( edgepoint_whatsapp_href( edgepoint_business_detail( 'phone' ) ) ); ?>"><?php esc_html_e( 'WhatsApp', 'edgepoint' ); ?></a>
				<a href="<?php echo esc_url( 'mailto:' . edgepoint_business_detail( 'email' ) ); ?>"><?php echo esc_html( edgepoint_business_detail( 'email' ) ); ?></a>
			</p>
			<?php $social_links = edgepoint_social_links(); ?>
			<?php if ( $social_links ) : ?>
				<ul class="social-links">
					<?php foreach ( $social_links as $social_link ) : ?>
						<li><a href="<?php echo esc_url( $social_link['url'] ); ?>"><?php echo esc_html( $social_link['label'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
	<div class="wrap site-footer__bottom">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( edgepoint_business_detail( 'name' ) ); ?>.</p>
		<nav aria-label="<?php esc_attr_e( 'Legal navigation', 'edgepoint' ); ?>">
			<a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy', 'edgepoint' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Terms', 'edgepoint' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/accessibility/' ) ); ?>"><?php esc_html_e( 'Accessibility', 'edgepoint' ); ?></a>
		</nav>
	</div>
</footer>
<a class="whatsapp-link" href="<?php echo esc_url( edgepoint_whatsapp_href( edgepoint_business_detail( 'phone' ) ) ); ?>">
	<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
		<path fill="currentColor" d="M12.04 2C6.58 2 2.15 6.4 2.15 11.83c0 1.74.46 3.44 1.34 4.94L2 22l5.39-1.41a10 10 0 0 0 4.65 1.18h.01c5.46 0 9.89-4.4 9.89-9.83C21.94 6.4 17.5 2 12.04 2Zm5.76 14.02c-.24.68-1.4 1.3-1.93 1.38-.49.07-1.1.1-1.78-.11-.41-.13-.94-.31-1.62-.6-2.85-1.23-4.7-4.1-4.84-4.29-.14-.19-1.16-1.54-1.16-2.94s.73-2.08 1-2.37c.24-.27.64-.39 1.02-.39h.73c.23 0 .54-.09.84.64.31.76 1.06 2.62 1.15 2.81.1.19.16.41.03.66-.13.24-.2.39-.39.6-.19.21-.41.47-.58.63-.19.18-.39.37-.17.73.22.36.98 1.62 2.11 2.62 1.45 1.29 2.67 1.69 3.05 1.88.38.19.6.16.82-.1.22-.26.94-1.1 1.19-1.48.25-.37.5-.31.84-.19.34.13 2.15 1.01 2.52 1.2.37.18.61.27.7.42.1.16.1.9-.14 1.58Z"/>
	</svg>
	<span><?php esc_html_e( 'WhatsApp', 'edgepoint' ); ?></span>
</a>
<?php wp_footer(); ?>
</body>
</html>
