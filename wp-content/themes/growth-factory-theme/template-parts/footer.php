<?php
/** Minimal fallback footer. @package Growth_Factory_Theme */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<footer class="gf-site-footer">
	<?php if ( has_nav_menu( 'footer' ) ) : ?>
		<nav aria-label="<?php esc_attr_e( 'Footer menu', 'growth-factory-theme' ); ?>">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'menu_class' => 'gf-menu', 'fallback_cb' => false ) ); ?>
		</nav>
	<?php endif; ?>
	<p>&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
</footer>
