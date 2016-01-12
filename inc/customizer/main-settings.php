<?php 

$wp_customize->add_panel ( 'apollo_main_settings', array (
		'title' => esc_html__ ( 'Main settings', 'apollo' ),
		'priority' => 11
) );

$wp_customize->get_section ( 'title_tagline' )->panel = 'apollo_main_settings';
$wp_customize->get_section ( 'background_image' )->panel = 'apollo_main_settings';
$wp_customize->get_section ( 'colors' )->panel = 'apollo_main_settings';

/*
 * ============== TITLE TAGLINE ==============
 */
$wp_customize->add_setting ( 'logo', array (
		'default' => apollo_get_option ( "logo" )
) );
$wp_customize->add_control ( new WP_Customize_Image_Control ( $wp_customize, 'logo', array (
		'label' => esc_html__ ( 'Logo', 'apollo' ),
		'section' => 'title_tagline',
		'settings' => 'logo',
		'priority' => 1
) ) );

/*
 * ============== COLORS ==============
 */
$wp_customize->add_setting ( 'page_bg_color', array (
		'default' => apollo_get_option ( 'page_bg_color' ),
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
) );
$wp_customize->add_control ( new WP_Customize_Color_Control ( $wp_customize, 'apollo_page_bg_color', array (
		'label' => esc_html__ ( 'Page container background color', 'apollo' ),
		'section' => 'colors',
		'settings' => 'page_bg_color',
		'priority' => 20
) ) );

/*
 * ============== LAYOUT ==============
 */
$wp_customize->add_section ( 'apollo_layout', array (
		'title' => esc_html__ ( 'Layout', 'apollo' ),
		'panel' => 'apollo_main_settings',
		'priority' => 40
) );
// Container_class
$wp_customize->add_setting ( 'container_class', array (
		'default' => apollo_get_option ( 'container_class' ),
		'transport' => 'postMessage',
		'sanitize_callback' => 'apollo_sanitize_container'
) );
$wp_customize->add_control ( 'apollo_container_class', array (
		'label' => esc_html__ ( 'Container', 'apollo' ),
		'section' => 'apollo_layout',
		'settings' => 'container_class',
		'type' => 'select',
		'choices' => array (
				'container-fluid' => esc_html__ ( 'Fluid', 'apollo' ),
				'container' => esc_html__ ( 'Fixed', 'apollo' )
		),
		'priority' => 10
) );
// Wrapper container max width
$wp_customize->add_setting ( 'wrapped_element_max_width', array (
		'default' => apollo_get_option ( 'wrapped_element_max_width' ),
		'transport' => 'postMessage',
		'sanitize_callback' => 'apollo_sanitize_int',
		'sanitize_js_callback' => 'apollo_sanitize_int'
) );
$wp_customize->add_control ( 'apollo_wrapped_element_max_width', array (
		'label' => esc_html__ ( 'Wrapped element max width (px)', 'apollo' ),
		'description' => esc_html__ ( 'Site elements like header, blog, etc. could be wrapped. Value must be a positive number.', 'apollo' ),
		'section' => 'apollo_layout',
		'settings' => 'wrapped_element_max_width',
		'type' => 'text',
		'priority' => 20,
		'active_callback' => 'apollo_is_container_fluid_callback'
) );
