<?php

/*
 * ============== Header Layout ==============
 */
$wp_customize->add_section ( 'apollo_header_layout', array (
		'title' => esc_html__ ( 'Layout', 'apollo' ),
		'panel' => 'apollo_header',
		'priority' => 10 
) );

// Header Template
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

// Fix primary menu when to long
$wp_customize->add_setting ( 'header_menu_fix', array (
		'default' => apollo_get_option ( 'header_menu_fix' ),
		'transport' => 'postMessage'
) );
$wp_customize->add_control ( 'apollo_header_menu_fix', array (
		'label' => esc_html__ ( 'Fix menu position when over logo', 'apollo' ),
		'section' => 'apollo_header_layout',
		'settings' => 'header_menu_fix',
		'type' => 'checkbox',
		'priority' => 40
) );
