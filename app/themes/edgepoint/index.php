<?php
/**
 * Insights, trends and search.
 *
 * @package Edgepoint
 */

defined( 'ABSPATH' ) || exit;

get_header();

$insights_url = get_permalink( (int) get_option( 'page_for_posts' ) );
$trends_term  = get_category_by_slug( 'trends' );
$is_trends    = is_category( 'trends' );
$is_insights  = is_home() || is_category();
$shown        = 0;
?>
<main id="main" class="main-content<?php echo $is_insights ? ' insights-page' : ''; ?>">
	<section class="wrap archive-heading">
		<p class="eyebrow"><?php echo $is_trends ? esc_html__( 'Picture-led updates', 'edgepoint' ) : esc_html__( 'Knowledge & updates', 'edgepoint' ); ?></p>
		<h1>
			<?php
			if ( is_search() ) {
				printf(
					/* translators: %s: search query. */
					esc_html__( 'Search results for “%s”', 'edgepoint' ),
					esc_html( get_search_query() )
				);
			} elseif ( is_home() ) {
				esc_html_e( 'Insights', 'edgepoint' );
			} elseif ( $is_trends ) {
				esc_html_e( 'Trends', 'edgepoint' );
			} elseif ( is_archive() ) {
				the_archive_title();
			} else {
				esc_html_e( 'Insights', 'edgepoint' );
			}
			?>
		</h1>
		<?php if ( is_home() ) : ?>
			<p class="archive-heading__lead"><?php esc_html_e( 'Practical notes on connectivity, security and the websites that present the work. Trends are the updates that carry a picture.', 'edgepoint' ); ?></p>
		<?php elseif ( $is_trends ) : ?>
			<p class="archive-heading__lead"><?php esc_html_e( 'Each trend has a picture of the technology being discussed. The photos are illustrative. They are not Edgepoint installations or customer projects.', 'edgepoint' ); ?></p>
		<?php else : ?>
			<?php the_archive_description( '<div class="archive-heading__description">', '</div>' ); ?>
		<?php endif; ?>
		<?php if ( $is_insights && $insights_url && $trends_term instanceof WP_Term ) : ?>
			<nav class="insight-switch" aria-label="<?php esc_attr_e( 'Insight types', 'edgepoint' ); ?>">
				<a href="<?php echo esc_url( $insights_url ); ?>"<?php echo is_home() ? ' aria-current="page"' : ''; ?>><?php esc_html_e( 'All insights', 'edgepoint' ); ?></a>
				<a href="<?php echo esc_url( get_category_link( $trends_term ) ); ?>"<?php echo $is_trends ? ' aria-current="page"' : ''; ?>><?php esc_html_e( 'Trends', 'edgepoint' ); ?></a>
			</nav>
		<?php endif; ?>
	</section>

	<div class="wrap post-grid">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php
				if ( ! edgepoint_trend_is_visible() ) {
					continue;
				}
				++$shown;
				$is_trend = edgepoint_is_trend();
				?>
				<article <?php post_class( $is_trend ? 'post-card post-card--trend' : 'post-card' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="post-card__image" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
							<?php the_post_thumbnail( 'edgepoint-card' ); ?>
						</a>
					<?php endif; ?>
					<div class="post-card__body">
						<?php if ( $is_trend ) : ?>
							<p class="post-card__kicker"><?php esc_html_e( 'Trend', 'edgepoint' ); ?></p>
						<?php else : ?>
							<p class="entry__meta"><?php echo esc_html( get_the_date() ); ?></p>
						<?php endif; ?>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
						<a href="<?php the_permalink(); ?>"><?php echo $is_trend ? esc_html__( 'Read trend', 'edgepoint' ) : esc_html__( 'Read article', 'edgepoint' ); ?> <span aria-hidden="true">→</span></a>
					</div>
				</article>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php if ( 0 === $shown ) : ?>
			<div class="empty-state">
				<?php if ( $is_trends ) : ?>
					<h2><?php esc_html_e( 'Trends appear here with a picture.', 'edgepoint' ); ?></h2>
					<p><?php esc_html_e( 'A trend is listed only after its featured image is set.', 'edgepoint' ); ?></p>
				<?php else : ?>
					<h2><?php esc_html_e( 'Nothing matched your request.', 'edgepoint' ); ?></h2>
					<p><?php esc_html_e( 'Try another search or explore our services.', 'edgepoint' ); ?></p>
				<?php endif; ?>
				<a class="button" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Explore services', 'edgepoint' ); ?></a>
			</div>
		<?php endif; ?>
	</div>

	<div class="wrap pagination"><?php the_posts_pagination(); ?></div>
</main>
<?php
get_footer();
