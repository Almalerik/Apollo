<?php

/*
 * ============== HEADER ==============
 */
$wp_customize->add_panel ( 'apollo_header', array (
		'title' => esc_html__ ( 'Header', 'apollo' ),
		'priority' => 20 
) );
$wp_customize->add_section ( 'apollo_header_layout', array (
		'title' => esc_html__ ( 'Layout', 'apollo' ),
		'panel' => 'apollo_header',
		'priority' => 10 
) );

// Header layout
$wp_customize->add_setting ( 'header_template', array (
		'default' => apollo_get_option ( 'header_template' ) 
) );
$wp_customize->add_control ( 'apollo_header_template', array (
		'label' => esc_html__ ( 'Template', 'apollo' ),
		'section' => 'apollo_header_layout',
		'settings' => 'header_template',
		'type' => 'select',
		'choices' => apollo_get_header_templates (),
		'priority' => 10 
) );

// Fixed header max width
$wp_customize->add_setting ( 'header_wrapped', array (
		'default' => apollo_get_option ( 'header_wrapped' ),
		'transport' => 'postMessage' 
) );
$wp_customize->add_control ( 'apollo_header_wrapped', array (
		'label' => esc_html__ ( 'Wrapped', 'apollo' ),
		'description' => esc_html__ ( 'Value is set in "Main settings -> Layout"', 'apollo' ),
		'section' => 'apollo_header_layout',
		'settings' => 'header_wrapped',
		'type' => 'checkbox',
		'priority' => 20 
) );

// Header position
$wp_customize->add_setting ( 'header_position', array (
		'default' => apollo_get_option ( 'header_position' ),
		'transport' => 'postMessage' 
) );
$wp_customize->add_control ( 'apollo_header_position', array (
		'label' => esc_html__ ( 'Position', 'apollo' ),
		'section' => 'apollo_header_layout',
		'settings' => 'header_position',
		'type' => 'select',
		'choices' => array (
				'' => esc_html__ ( 'Top', 'apollo' ),
				'apollo-header-sticky-top' => esc_html__ ( 'Fixed top', 'apollo' ) 
		),
		'priority' => 30 
) );

// Header colors
$wp_customize->add_section ( 'apollo_header_colors', array (
		'title' => esc_html__ ( 'Colors', 'apollo' ),
		'panel' => 'apollo_header',
		'priority' => 20 
) );
// Header background color
$wp_customize->add_setting ( 'header_bg_color', array (
		'default' => apollo_get_option ( 'header_bg_color' ),
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage' 
) );
$wp_customize->add_control ( new WP_Customize_Color_Control ( $wp_customize, 'apollo_header_bg_color', array (
		'label' => esc_html__ ( 'Background color', 'apollo' ),
		'section' => 'apollo_header_colors',
		'settings' => 'header_bg_color',
		'priority' => 10 
) ) );
// Header background color opacity
$wp_customize->add_setting ( 'header_bg_color_opacity', array (
		'default' => apollo_get_option ( 'header_bg_color_opacity' ),
		'sanitize_callback' => 'apollo_sanitize_opacity',
		'transport' => 'postMessage' 
) );
$wp_customize->add_control ( 'apollo_header_bg_color_opacity', array (
		'label' => esc_html__ ( 'Background opacity', 'apollo' ),
		'section' => 'apollo_header_colors',
		'settings' => 'header_bg_color_opacity',
		'type' => 'range',
		'priority' => 20,
		'input_attrs' => array (
				'min' => 0,
				'max' => 1,
				'step' => 0.1 
		) 
) );
// Header background color opacity on scrolling
$wp_customize->add_setting ( 'header_bg_color_opacity_onscroll', array (
		'default' => apollo_get_option ( 'header_bg_color_opacity_onscroll' ),
		'sanitize_callback' => 'apollo_sanitize_opacity',
		'transport' => 'postMessage' 
) );
$wp_customize->add_control ( 'apollo_header_bg_color_opacity_onscroll', array (
		'label' => esc_html__ ( 'Scrolling background opacity', 'apollo' ),
		'description' => esc_html__ ( 'Opacity on scrolling if fixed top.', 'apollo' ),
		'section' => 'apollo_header_colors',
		'settings' => 'header_bg_color_opacity_onscroll',
		'type' => 'range',
		'priority' => 30,
		'input_attrs' => array (
				'min' => 0,
				'max' => 1,
				'step' => 0.1 
		) 
) );
// Typography colors
$wp_customize->add_setting ( 'header_title_color', array (
		'default' => apollo_get_option ( 'header_title_color' ),
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
) );
$wp_customize->add_control ( new WP_Customize_Color_Control ( $wp_customize, 'apollo_header_title_color', array (
		'label' => esc_html__ ( 'Title', 'apollo' ),
		'section' => 'apollo_header_colors',
		'settings' => 'header_title_color',
		'priority' => 40
) ) );
$wp_customize->add_setting ( 'header_description_color', array (
		'default' => apollo_get_option ( 'header_description_color' ),
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
) );
$wp_customize->add_control ( new WP_Customize_Color_Control ( $wp_customize, 'apollo_header_description_color', array (
		'label' => esc_html__ ( 'Blog description', 'apollo' ),
		'section' => 'apollo_header_colors',
		'settings' => 'header_description_color',
		'priority' => 50
) ) );