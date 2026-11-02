<?php

/**
 * Growth Factory Theme bootstrap. Intentionally small and builder friendly.
 *
 * @package Growth_Factory_Theme
 */

if (! defined('ABSPATH')) {
	exit;
}

define('GROWTH_FACTORY_THEME_VERSION', '1.0.0');

/** Register the core WordPress features used by the fallback templates. */
function growth_factory_theme_setup()
{
	load_theme_textdomain('growth-factory-theme', get_template_directory() . '/languages');
	add_theme_support('title-tag');
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support('responsive-embeds');
	add_theme_support('align-wide');
	add_theme_support('custom-logo', array('flex-width' => true, 'flex-height' => true));
	add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets'));

	register_nav_menus(
		array(
			'primary' => __('Primary Menu', 'growth-factory-theme'),
			'footer'  => __('Footer Menu', 'growth-factory-theme'),
		)
	);

	$GLOBALS['content_width'] = (int) apply_filters('growth_factory_theme_content_width', 1140);
}
add_action('after_setup_theme', 'growth_factory_theme_setup');

/** One local stylesheet, no remote fonts, frontend JavaScript or frameworks. */
function growth_factory_theme_styles()
{
	$enqueue_base = (bool) apply_filters('growth_factory_theme_enqueue_style', true);

	if ($enqueue_base) {
		wp_enqueue_style('growth-factory-theme', get_template_directory_uri() . '/style.css', array(), GROWTH_FACTORY_THEME_VERSION);
		if (is_rtl()) {
			wp_enqueue_style('growth-factory-theme-rtl', get_template_directory_uri() . '/rtl.css', array('growth-factory-theme'), GROWTH_FACTORY_THEME_VERSION);
		}
	}

	// Child theme styling follows the parent foundation when present.
	if (is_child_theme()) {
		wp_enqueue_style('growth-factory-child', get_stylesheet_uri(), $enqueue_base ? array('growth-factory-theme') : array(), wp_get_theme()->get('Version'));
	}

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'growth_factory_theme_styles');

/** Allow Elementor Pro to replace headers, footers, singles and archives. */
function growth_factory_theme_register_locations($manager)
{
	$manager->register_all_core_location();
}
add_action('elementor/theme/register_locations', 'growth_factory_theme_register_locations');

/** Match Elementor's page-title selector so its Hide Title setting works. */
function growth_factory_theme_title_selector()
{
	return 'h1.entry-title';
}
add_filter('elementor/page_title/selector', 'growth_factory_theme_title_selector');

/** Supply a main landmark and skip-link target in Elementor Full Width pages. */
function growth_factory_theme_full_width_open()
{
	echo '<main id="content" class="site-main" tabindex="-1">';
}

function growth_factory_theme_full_width_close()
{
	echo '</main>';
}
add_action('elementor/page_templates/header-footer/before_content', 'growth_factory_theme_full_width_open');
add_action('elementor/page_templates/header-footer/after_content', 'growth_factory_theme_full_width_close');

/** Honor Hide Title server-side too, without requiring Elementor to be active. */
function growth_factory_theme_show_title()
{
	$show = true;
	if (did_action('elementor/loaded') && class_exists('\Elementor\Plugin')) {
		$document = \Elementor\Plugin::instance()->documents->get(get_the_ID());
		if ($document && 'yes' === $document->get_settings('hide_title')) {
			$show = false;
		}
	}

	return (bool) apply_filters('growth_factory_theme_show_title', $show);
}

/** Keep a container for plain WordPress content, without boxing Elementor pages. */
function growth_factory_theme_content_class()
{
	if (did_action('elementor/loaded') && class_exists('\Elementor\Plugin')) {
		$document = \Elementor\Plugin::instance()->documents->get(get_the_ID());
		if ($document && $document->is_built_with_elementor()) {
			return 'entry-content';
		}
	}

	return 'entry-content gf-content-inner';
}

/**
 * Register the Portfolio custom post type.
 *
 * Portfolio projects have their own archive and single URLs. Categories are
 * attached through the separate portfolio_category taxonomy below.
 *
 * @since 1.0.0
 */
function growth_factory_register_portfolio_cpt()
{
	$labels = array(
		'name'                  => __('Portfolio', 'growth-factory-theme'),
		'singular_name'         => __('Portfolio Item', 'growth-factory-theme'),
		'menu_name'             => __('Portfolio', 'growth-factory-theme'),
		'name_admin_bar'        => __('Portfolio Item', 'growth-factory-theme'),
		'add_new'               => __('Add New', 'growth-factory-theme'),
		'add_new_item'          => __('Add New Item', 'growth-factory-theme'),
		'new_item'              => __('New Portfolio Item', 'growth-factory-theme'),
		'edit_item'             => __('Edit Portfolio Item', 'growth-factory-theme'),
		'view_item'             => __('View Portfolio Item', 'growth-factory-theme'),
		'all_items'             => __('All Portfolio Items', 'growth-factory-theme'),
		'search_items'          => __('Search Portfolio', 'growth-factory-theme'),
		'not_found'             => __('No portfolio items found.', 'growth-factory-theme'),
		'not_found_in_trash'    => __('No portfolio items found in Trash.', 'growth-factory-theme'),
		'featured_image'        => __('Portfolio Featured Image', 'growth-factory-theme'),
		'set_featured_image'    => __('Set Featured Image', 'growth-factory-theme'),
		'remove_featured_image' => __('Remove Featured Image', 'growth-factory-theme'),
		'use_featured_image'    => __('Use as Featured Image', 'growth-factory-theme'),
		'archives'              => __('Portfolio Archives', 'growth-factory-theme'),
		'items_list'            => __('Portfolio Items List', 'growth-factory-theme'),
	);

	register_post_type(
		'portfolio',
		array(
			'labels'              => $labels,
			'description'         => __('Manage projects and portfolio items.', 'growth-factory-theme'),
			'public'              => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'show_in_rest'        => true,
			'menu_position'       => 21,
			'menu_icon'           => 'dashicons-portfolio',
			'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'),
			'has_archive'         => true,
			'rewrite'             => array(
				'slug'       => 'portfolio',
				'with_front' => false,
			),
			// Projects are independent posts; only categories have a hierarchy.
			'hierarchical'        => false,
			'taxonomies'          => array('portfolio_category'),
			'capability_type'     => 'post',
			'map_meta_cap'        => true,
			'query_var'           => true,
		)
	);
}
add_action('init', 'growth_factory_register_portfolio_cpt');

/**
 * Register Portfolio Categories exclusively for Portfolio items.
 *
 * The taxonomy has its own labels and URL configuration. Reusing the post
 * type arguments here would overwrite Portfolio settings and menu labels.
 *
 * @since 1.0.0
 */
function growth_factory_register_portfolio_taxonomy()
{
	$labels = array(
		'name'              => __('Portfolio Categories', 'growth-factory-theme'),
		'singular_name'     => __('Portfolio Category', 'growth-factory-theme'),
		'menu_name'         => __('Portfolio Categories', 'growth-factory-theme'),
		'search_items'      => __('Search Portfolio Categories', 'growth-factory-theme'),
		'all_items'         => __('All Portfolio Categories', 'growth-factory-theme'),
		'parent_item'       => __('Parent Portfolio Category', 'growth-factory-theme'),
		'parent_item_colon' => __('Parent Portfolio Category:', 'growth-factory-theme'),
		'edit_item'         => __('Edit Portfolio Category', 'growth-factory-theme'),
		'view_item'         => __('View Portfolio Category', 'growth-factory-theme'),
		'update_item'       => __('Update Portfolio Category', 'growth-factory-theme'),
		'add_new_item'      => __('Add New Portfolio Category', 'growth-factory-theme'),
		'new_item_name'     => __('New Portfolio Category Name', 'growth-factory-theme'),
		'not_found'         => __('No portfolio categories found.', 'growth-factory-theme'),
	);

	register_taxonomy(
		'portfolio_category',
		array('portfolio'),
		array(
			'labels'             => $labels,
			'hierarchical'       => true,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_admin_column'  => true,
			'show_in_quick_edit' => true,
			'show_in_nav_menus'  => true,
			'show_in_rest'       => true,
			'show_tagcloud'      => false,
			'rewrite'            => array(
				'slug'         => 'portfolio-category',
				'with_front'   => false,
				'hierarchical' => true,
			),
			'query_var'          => true,
		)
	);
}
add_action('init', 'growth_factory_register_portfolio_taxonomy');

require_once get_template_directory() . '/inc/customizer.php';
if (is_admin()) {
	require_once get_template_directory() . '/inc/elementor-notice.php';
}
