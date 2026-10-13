<?php
/**
 * Single content template.
 *
 * @package Endpoint
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
				<a class="button" href="<?php echo esc_url( home_url( '/get-a-quote/' ) ); ?>"><?php esc_html_e( 'Discuss your requirements', 'endpoint' ); ?></a>
			</footer>
		</article>
	<?php endwhile; ?>
</main>
<?php
get_footer();
