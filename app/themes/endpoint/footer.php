<?php
/**
 * Site footer.
 *
 * @package Endpoint
 */

defined( 'ABSPATH' ) || exit;
?>
<footer class="site-footer">
	<div class="wrap site-footer__grid">
		<div class="site-footer__brand">
			<?php endpoint_brand(); ?>
			<p><?php esc_html_e( 'Integrated ICT solutions for homes, businesses and institutions across Nairobi and the surrounding metropolitan area.', 'endpoint' ); ?></p>
		</div>
		<div>
			<h2><?php esc_html_e( 'Solutions', 'endpoint' ); ?></h2>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/services/#connectivity' ) ); ?>"><?php esc_html_e( 'Connectivity', 'endpoint' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/services/#networks' ) ); ?>"><?php esc_html_e( 'Networks', 'endpoint' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/services/#security' ) ); ?>"><?php esc_html_e( 'Security', 'endpoint' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/services/#digital-systems' ) ); ?>"><?php esc_html_e( 'Digital systems', 'endpoint' ); ?></a></li>
			</ul>
		</div>
		<div>
			<h2><?php esc_html_e( 'Company', 'endpoint' ); ?></h2>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'endpoint' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>"><?php esc_html_e( 'Portfolio', 'endpoint' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/careers/' ) ); ?>"><?php esc_html_e( 'Careers', 'endpoint' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/support/' ) ); ?>"><?php esc_html_e( 'Support', 'endpoint' ); ?></a></li>
			</ul>
		</div>
		<div>
			<h2><?php esc_html_e( 'Visit us', 'endpoint' ); ?></h2>
			<address><?php echo esc_html( endpoint_business_detail( 'address' ) ); ?></address>
			<p><?php echo esc_html( endpoint_business_detail( 'service_area' ) ); ?></p>
			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact details', 'endpoint' ); ?></a>
		</div>
	</div>
	<div class="wrap site-footer__bottom">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( endpoint_business_detail( 'name' ) ); ?>.</p>
		<nav aria-label="<?php esc_attr_e( 'Legal navigation', 'endpoint' ); ?>">
			<a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy', 'endpoint' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Terms', 'endpoint' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/accessibility/' ) ); ?>"><?php esc_html_e( 'Accessibility', 'endpoint' ); ?></a>
		</nav>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
