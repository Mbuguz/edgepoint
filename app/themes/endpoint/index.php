<?php
/**
 * Archive fallback.
 *
 * @package Endpoint
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="main-content">
	<section class="wrap archive-heading">
		<p class="eyebrow"><?php esc_html_e( 'Knowledge & updates', 'endpoint' ); ?></p>
		<h1>
			<?php
			if ( is_search() ) {
				printf(
					/* translators: %s: search query. */
					esc_html__( 'Search results for “%s”', 'endpoint' ),
					esc_html( get_search_query() )
				);
			} elseif ( is_archive() ) {
				the_archive_title();
			} else {
				esc_html_e( 'Insights', 'endpoint' );
			}
			?>
		</h1>
		<?php the_archive_description( '<div class="archive-heading__description">', '</div>' ); ?>
	</section>

	<div class="wrap post-grid">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<article <?php post_class( 'post-card' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="post-card__image" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
							<?php the_post_thumbnail( 'endpoint-card' ); ?>
						</a>
					<?php endif; ?>
					<div class="post-card__body">
						<p class="entry__meta"><?php echo esc_html( get_the_date() ); ?></p>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
						<a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read article', 'endpoint' ); ?> <span aria-hidden="true">→</span></a>
					</div>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<div class="empty-state">
				<h2><?php esc_html_e( 'Nothing matched your request.', 'endpoint' ); ?></h2>
				<p><?php esc_html_e( 'Try another search or explore our services.', 'endpoint' ); ?></p>
				<a class="button" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Explore services', 'endpoint' ); ?></a>
			</div>
		<?php endif; ?>
	</div>

	<div class="wrap pagination"><?php the_posts_pagination(); ?></div>
</main>
<?php
get_footer();
