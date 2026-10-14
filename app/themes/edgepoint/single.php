<?php
/**
 * Single content template.
 *
 * @package Edgepoint
 */

defined( 'ABSPATH' ) || exit;

get_header();

$is_insight = is_singular( 'post' );
?>
<main id="main" class="main-content<?php echo $is_insight ? ' insight-entry' : ''; ?>">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php if ( $is_insight ) : ?>
			<?php
			$edgepoint_trends = get_category_by_slug( 'trends' );
			$is_trend         = edgepoint_is_trend() && $edgepoint_trends instanceof WP_Term;
			$back_url         = $is_trend ? get_category_link( $edgepoint_trends ) : get_permalink( (int) get_option( 'page_for_posts' ) );
			$back_label       = $is_trend ? __( 'All trends', 'edgepoint' ) : __( 'All insights', 'edgepoint' );
			?>
			<article <?php post_class( 'entry' ); ?>>
				<header class="insight-entry__header">
					<div class="wrap wrap--reading">
						<?php if ( $back_url ) : ?>
							<p class="insight-entry__back"><a href="<?php echo esc_url( $back_url ); ?>"><?php echo esc_html( $back_label ); ?></a></p>
						<?php endif; ?>
						<p class="entry__meta">
							<?php if ( $is_trend ) : ?>
								<a href="<?php echo esc_url( get_category_link( $edgepoint_trends ) ); ?>"><?php esc_html_e( 'Trend', 'edgepoint' ); ?></a>
							<?php else : ?>
								<?php esc_html_e( 'Insight', 'edgepoint' ); ?>
							<?php endif; ?>
							<span aria-hidden="true"> · </span>
							<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
						</p>
						<h1><?php the_title(); ?></h1>
						<?php if ( has_excerpt() ) : ?>
							<p class="entry__lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
						<?php endif; ?>
					</div>
				</header>
				<?php if ( has_post_thumbnail() ) : ?>
					<figure class="insight-entry__figure wrap">
						<?php the_post_thumbnail( 'large' ); ?>
					</figure>
				<?php elseif ( $is_trend ) : ?>
					<div class="wrap wrap--reading">
						<p class="entry__lead"><?php esc_html_e( 'This trend is waiting for its picture before it is listed on Insights.', 'edgepoint' ); ?></p>
					</div>
				<?php endif; ?>
				<div class="wrap wrap--reading">
					<div class="entry__content">
						<?php the_content(); ?>
					</div>
					<footer class="entry__footer">
						<a class="button" href="<?php echo esc_url( home_url( '/get-a-quote/' ) ); ?>"><?php esc_html_e( 'Discuss your requirements', 'edgepoint' ); ?></a>
					</footer>
				</div>
			</article>
		<?php else : ?>
			<article <?php post_class( 'entry wrap wrap--reading' ); ?>>
				<header class="entry__header">
					<p class="entry__meta">
						<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
					</p>
					<h1><?php the_title(); ?></h1>
					<?php if ( has_excerpt() ) : ?>
						<p class="entry__lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
					<?php endif; ?>
				</header>
				<?php if ( has_post_thumbnail() ) : ?>
					<figure class="entry__image"><?php the_post_thumbnail( 'large' ); ?></figure>
				<?php endif; ?>
				<div class="entry__content">
					<?php the_content(); ?>
				</div>
				<footer class="entry__footer">
					<a class="button" href="<?php echo esc_url( home_url( '/get-a-quote/' ) ); ?>"><?php esc_html_e( 'Discuss your requirements', 'edgepoint' ); ?></a>
				</footer>
			</article>
		<?php endif; ?>
	<?php endwhile; ?>
</main>
<?php
get_footer();
