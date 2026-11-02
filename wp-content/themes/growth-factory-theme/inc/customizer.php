<?php
/** Only fallback visibility settings; Elementor controls the actual design. @package Growth_Factory_Theme */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function growth_factory_theme_sanitize_checkbox( $value ) {
	return (bool) $value;
}

function growth_factory_theme_customize_register( $customizer ) {
	$customizer->add_section( 'growth_factory_layout', array(
		'title'       => __( 'Growth Factory Layout', 'growth-factory-theme' ),
		'description' => __( 'These switches control the basic theme header and footer. Assigned Elementor Theme Builder templates take precedence. Use Elementor Canvas for a completely blank page.', 'growth-factory-theme' ),
		'priority'    => 30,
	) );
	foreach ( array( 'header' => __( 'Show fallback header', 'growth-factory-theme' ), 'footer' => __( 'Show fallback footer', 'growth-factory-theme' ) ) as $part => $label ) {
		$key = 'growth_factory_show_' . $part;
		$customizer->add_setting( $key, array( 'default' => true, 'sanitize_callback' => 'growth_factory_theme_sanitize_checkbox' ) );
		$customizer->add_control( $key, array( 'label' => $label, 'section' => 'growth_factory_layout', 'type' => 'checkbox' ) );
	}
}
add_action( 'customize_register', 'growth_factory_theme_customize_register' );
