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
			<p><?php echo esc_html( edgepoint_business_detail( 'service_area' ) ); ?></p>
			<p class="contact-lines">
				<a href="<?php echo esc_url( edgepoint_phone_href( edgepoint_business_detail( 'phone' ) ) ); ?>"><?php echo esc_html( edgepoint_phone_label( edgepoint_business_detail( 'phone' ) ) ); ?></a>
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
<?php wp_footer(); ?>
</body>
</html>
