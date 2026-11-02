<?php
/** Document shell and Elementor-aware header. @package Growth_Factory_Theme */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'growth-factory-theme' ); ?></a>
<?php
// Elementor location templates take precedence over the optional fallback.
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
	if ( get_theme_mod( 'growth_factory_show_header', true ) ) {
		get_template_part( 'template-parts/header' );
	}
}
