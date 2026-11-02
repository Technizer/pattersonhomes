<?php
/** Not-found fallback. @package Growth_Factory_Theme */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<main id="main" class="site-main gf-not-found">
	<h1><?php esc_html_e( 'Page not found', 'growth-factory-theme' ); ?></h1>
	<p><?php esc_html_e( 'The page you are looking for could not be found. Try a search instead.', 'growth-factory-theme' ); ?></p>
	<?php get_search_form(); ?>
</main>
