<?php
/** Blog, archive and search fallback. @package Growth_Factory_Theme */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<main id="main" class="site-main gf-archive">
	<?php if ( is_search() ) : ?>
		<h1><?php printf( esc_html__( 'Search results for: %s', 'growth-factory-theme' ), esc_html( get_search_query() ) ); ?></h1>
	<?php elseif ( is_archive() ) : ?>
		<header><?php the_archive_title( '<h1>', '</h1>' ); the_archive_description( '<div>', '</div>' ); ?></header>
	<?php elseif ( is_home() && ! is_front_page() ) : ?>
		<h1><?php single_post_title(); ?></h1>
	<?php endif; ?>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if ( has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
				<?php endif; ?>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>
			</article>
		<?php endwhile; ?>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'No content found.', 'growth-factory-theme' ); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</main>
