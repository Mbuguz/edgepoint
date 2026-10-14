<?php
/**
 * Single content template.
 *
 * @package Edgepoint
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="main" class="main-content">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<article <?php post_class( 'entry wrap wrap--reading' ); ?>>
			<header class="entry__header">
				<p class="entry__meta">
					<?php
					$edgepoint_trends = get_category_by_slug( 'trends' );
					if ( edgepoint_is_trend() && $edgepoint_trends instanceof WP_Term ) :
						?>
						<a href="<?php echo esc_url( get_category_link( $edgepoint_trends ) ); ?>"><?php esc_html_e( 'Trend', 'edgepoint' ); ?></a>
						<span aria-hidden="true"> · </span>
					<?php endif; ?>
					<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
				</p>
				<h1><?php the_title(); ?></h1>
				<?php if ( has_excerpt() ) : ?>
					<p class="entry__lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>
			</header>
			<?php if ( has_post_thumbnail() ) : ?>
				<?php $edgepoint_image_id = get_post_thumbnail_id(); ?>
				<figure class="entry__image">
					<?php the_post_thumbnail( 'large' ); ?>
				</figure>
			<?php elseif ( edgepoint_is_trend() ) : ?>
				<p class="entry__lead"><?php esc_html_e( 'This trend is waiting for its picture before it is listed on Insights.', 'edgepoint' ); ?></p>
			<?php endif; ?>
			<div class="entry__content">
				<?php the_content(); ?>
			</div>
			<footer class="entry__footer">
				<a class="button" href="<?php echo esc_url( home_url( '/get-a-quote/' ) ); ?>"><?php esc_html_e( 'Discuss your requirements', 'edgepoint' ); ?></a>
			</footer>
		</article>
	<?php endwhile; ?>
</main>
<?php
get_footer();
