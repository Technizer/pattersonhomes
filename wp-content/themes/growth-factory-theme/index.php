<?php
/** Elementor locations with useful WordPress fallback templates. @package Growth_Factory_Theme */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
?>
<div id="content" tabindex="-1">
<?php
if ( is_singular() ) {
	if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {
		get_template_part( 'template-parts/singular' );
	}
} elseif ( is_404() ) {
	get_template_part( 'template-parts/not-found' );
} elseif ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'archive' ) ) {
	get_template_part( 'template-parts/archive' );
}
?>
</div>
<?php get_footer(); ?>
