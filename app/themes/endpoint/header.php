<?php
/**
 * Site header.
 *
 * @package Endpoint
 */

defined( 'ABSPATH' ) || exit;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'endpoint' ); ?></a>

<div class="utility">
	<div class="wrap utility__inner">
		<p>
			<span><?php esc_html_e( '24/7 service availability', 'endpoint' ); ?></span>
			<span aria-hidden="true">•</span>
			<span><?php echo esc_html( endpoint_business_detail( 'address' ) ); ?></span>
		</p>
		<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
			<?php esc_html_e( 'Contact Endpoint', 'endpoint' ); ?>
		</a>
	</div>
</div>

<header class="site-header" data-site-header>
	<div class="wrap site-header__inner">
		<?php endpoint_brand(); ?>
		<button
			class="nav-toggle"
			type="button"
			aria-expanded="false"
			aria-controls="primary-navigation"
			data-nav-toggle
		>
			<span class="nav-toggle__bars" aria-hidden="true"></span>
			<span><?php esc_html_e( 'Menu', 'endpoint' ); ?></span>
		</button>
		<nav id="primary-navigation" class="primary-nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'endpoint' ); ?>" data-nav>
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'primary-nav__list',
						'fallback_cb'    => false,
					)
				);
			} else {
				?>
				<ul class="primary-nav__list">
					<li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Services', 'endpoint' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/products/' ) ); ?>"><?php esc_html_e( 'Products', 'endpoint' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/industries/' ) ); ?>"><?php esc_html_e( 'Industries', 'endpoint' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>"><?php esc_html_e( 'Portfolio', 'endpoint' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/insights/' ) ); ?>"><?php esc_html_e( 'Insights', 'endpoint' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'endpoint' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'endpoint' ); ?></a></li>
				</ul>
				<?php
			}
			?>
			<a class="button button--small" href="<?php echo esc_url( home_url( '/get-a-quote/' ) ); ?>">
				<?php esc_html_e( 'Get a quote', 'endpoint' ); ?>
			</a>
		</nav>
	</div>
</header>

<?php endpoint_breadcrumbs(); ?>
