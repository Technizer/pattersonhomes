<?php
/** Minimal fallback header; replace using Elementor Theme Builder. @package Growth_Factory_Theme */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<header class="gf-site-header">
	<div class="gf-site-branding">
		<?php if ( has_custom_logo() ) : ?>
			<?php the_custom_logo(); ?>
		<?php else : ?>
			<p class="gf-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php endif; ?>
		<?php if ( get_bloginfo( 'description' ) ) : ?>
			<p class="gf-site-description"><?php bloginfo( 'description' ); ?></p>
		<?php endif; ?>
	</div>
	<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<nav aria-label="<?php esc_attr_e( 'Primary menu', 'growth-factory-theme' ); ?>">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'gf-menu', 'fallback_cb' => false ) ); ?>
		</nav>
	<?php endif; ?>
</header>
