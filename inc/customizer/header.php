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
		'description' => esc_html__ ( 'Opacity in all page and post and during scroll if header fixed top.', 'apollo' ),
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