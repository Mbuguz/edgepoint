<?php
/**
 * Structured-content archive.
 *
 * @package Endpoint
 */

defined( 'ABSPATH' ) || exit;

get_header();

$is_service_archive = is_post_type_archive( 'endpoint_service' );
$item_number        = 0;
?>
<main id="main" class="main-content">
	<section class="archive-hero">
		<div class="wrap archive-heading">
		<p class="eyebrow"><?php esc_html_e( 'Endpoint solutions', 'endpoint' ); ?></p>
		<h1>
			<?php
			if ( is_post_type_archive() ) {
				echo esc_html( post_type_archive_title( '', false ) );
			} else {
				the_archive_title();
			}
			?>
		</h1>
		<?php if ( $is_service_archive ) : ?>
			<p class="archive-heading__lead"><?php esc_html_e( 'Twelve connected service families. Explore one capability or combine several into a solution planned around your environment.', 'endpoint' ); ?></p>
		<?php endif; ?>
		<?php the_archive_description( '<div class="archive-heading__description">', '</div>' ); ?>
		</div>
	</section>

	<div class="wrap post-grid <?php echo $is_service_archive ? 'service-catalogue' : ''; ?>">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php
				++$item_number;
				$content      = get_the_content();
				$capabilities = '';
				if ( $is_service_archive && preg_match( '/<ul[^>]*>.*?<\/ul>/s', $content, $matches ) ) {
					$capabilities = $matches[0];
				}
				?>
				<article <?php post_class( 'post-card' ); ?> data-reveal>
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="post-card__image" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
							<?php the_post_thumbnail( 'endpoint-card' ); ?>
						</a>
					<?php endif; ?>
					<div class="post-card__body">
						<?php if ( $is_service_archive ) : ?>
							<p class="post-card__number"><?php echo esc_html( str_pad( (string) $item_number, 2, '0', STR_PAD_LEFT ) ); ?></p>
						<?php endif; ?>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 26 ) ); ?></p>
						<?php if ( $capabilities ) : ?>
							<div class="post-card__capabilities"><?php echo wp_kses_post( $capabilities ); ?></div>
						<?php endif; ?>
						<a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Explore this solution', 'endpoint' ); ?> <span aria-hidden="true">→</span></a>
					</div>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<div class="empty-state">
				<h2><?php esc_html_e( 'Detailed solutions are being prepared.', 'endpoint' ); ?></h2>
				<p><?php esc_html_e( 'Tell us what you need and we will help route your request.', 'endpoint' ); ?></p>
				<a class="button" href="<?php echo esc_url( home_url( '/get-a-quote/' ) ); ?>"><?php esc_html_e( 'Request a quote', 'endpoint' ); ?></a>
			</div>
		<?php endif; ?>
	</div>

	<div class="wrap pagination"><?php the_posts_pagination(); ?></div>
</main>
<?php
get_footer();
