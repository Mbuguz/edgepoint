<?php
/**
 * Not-found template.
 *
 * @package Endpoint
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="main-content">
	<section class="wrap error-page">
		<p class="eyebrow"><?php esc_html_e( 'Error 404', 'endpoint' ); ?></p>
		<h1><?php esc_html_e( 'This endpoint could not be reached.', 'endpoint' ); ?></h1>
		<p><?php esc_html_e( 'The page may have moved or the address may be incorrect. Return home or explore our technology services.', 'endpoint' ); ?></p>
		<div class="button-row">
			<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return home', 'endpoint' ); ?></a>
			<a class="button button--secondary" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Explore services', 'endpoint' ); ?></a>
		</div>
	</section>
</main>
<?php
get_footer();
