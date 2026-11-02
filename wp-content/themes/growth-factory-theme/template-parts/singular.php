<?php
/** Standard content fallback, including the_content() required by Elementor. @package Growth_Factory_Theme */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<main id="main" class="site-main">
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( growth_factory_theme_show_title() ) : ?>
				<header class="gf-page-heading"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></header>
			<?php endif; ?>
			<div class="<?php echo esc_attr( growth_factory_theme_content_class() ); ?>">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<nav class="page-links" aria-label="' . esc_attr__( 'Page navigation', 'growth-factory-theme' ) . '">', 'after' => '</nav>' ) ); ?>
			</div>
		</article>
		<?php if ( comments_open() || get_comments_number() ) { comments_template(); } ?>
	<?php endwhile; ?>
</main>
