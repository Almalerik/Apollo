<?php

/*
 * ============== GENERAL SETTINGS ==============
 */
include('main-settings.php');
	

/*
 * ============== HEADER SETTINGS ==============
 */
$wp_customize->add_panel ( 'apollo_header', array (
		'title' => esc_html__ ( 'Header', 'apollo' ),
		'priority' => 20
) );
include('header_layout.php');
include('header_colors.php');

