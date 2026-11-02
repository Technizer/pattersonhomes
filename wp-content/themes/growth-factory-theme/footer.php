<?php
/** Elementor-aware footer and closing document shell. @package Growth_Factory_Theme */
if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
	if ( get_theme_mod( 'growth_factory_show_footer', true ) ) {
		get_template_part( 'template-parts/footer' );
	}
}
wp_footer();
?>
</body>
</html>
