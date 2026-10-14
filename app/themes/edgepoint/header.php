<?php
/**
 * Site header.
 *
 * @package Edgepoint
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
<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'edgepoint' ); ?></a>

<div class="utility">
	<div class="wrap utility__inner">
		<p>
			<span><?php esc_html_e( '24/7 service availability', 'edgepoint' ); ?></span>
			<span aria-hidden="true">•</span>
			<span><?php echo esc_html( edgepoint_business_detail( 'address' ) ); ?></span>
		</p>
		<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
			<?php esc_html_e( 'Contact Edgepoint', 'edgepoint' ); ?>
		</a>
	</div>
</div>

<header class="site-header" data-site-header>
	<div class="wrap site-header__inner">
		<?php edgepoint_brand(); ?>
		<button
			class="nav-toggle"
			type="button"
			aria-expanded="false"
			aria-controls="primary-navigation"
			data-nav-toggle
		>
			<span class="nav-toggle__bars" aria-hidden="true"></span>
			<span><?php esc_html_e( 'Menu', 'edgepoint' ); ?></span>
		</button>
		<nav id="primary-navigation" class="primary-nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'edgepoint' ); ?>" data-nav>
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
					<li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Services', 'edgepoint' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/industries/' ) ); ?>"><?php esc_html_e( 'Industries', 'edgepoint' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'edgepoint' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/insights/' ) ); ?>"><?php esc_html_e( 'Insights', 'edgepoint' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/support/' ) ); ?>"><?php esc_html_e( 'Support', 'edgepoint' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'edgepoint' ); ?></a></li>
				</ul>
				<?php
			}
			?>
			<a class="button button--small" href="<?php echo esc_url( home_url( '/get-a-quote/' ) ); ?>">
				<?php esc_html_e( 'Get a quote', 'edgepoint' ); ?>
			</a>
		</nav>
	</div>
</header>

<?php edgepoint_breadcrumbs(); ?>
