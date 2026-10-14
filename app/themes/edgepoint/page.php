<?php
/**
 * Standard page template.
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
				<p class="eyebrow"><?php esc_html_e( 'Edgepoint Internets Solutions Ltd', 'edgepoint' ); ?></p>
				<h1><?php the_title(); ?></h1>
			</header>
			<div class="entry__content">
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div>
		</article>
	<?php endwhile; ?>
</main>
<?php
get_footer();
