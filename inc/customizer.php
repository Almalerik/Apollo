<?php
/**
 * Apollo Theme Customizer.
 *
 * @package Apollo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize
 *        	Theme Customizer object.
 */
function apollo_customize_register($wp_customize) {
	$wp_customize->get_setting ( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting ( 'blogdescription' )->transport = 'postMessage';
	
	include ('customizer/customizer.php');
}
add_action ( 'customize_register', 'apollo_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function apollo_customize_preview_js() {
	wp_enqueue_script ( 'apollo_customizer', get_template_directory_uri () . '/assets/admin/js/customizer.js', array (
			'customize-preview' 
	), '20130508', true );
}
add_action ( 'customize_preview_init', 'apollo_customize_preview_js' );

/**
 * Binds JS handlers to Theme Customizer control.
 */
function apollo_customize_init_js() {
	wp_enqueue_script ( 'apollo_customizer_init', get_template_directory_uri () . '/assets/admin/js/customizer-init.js', array (
			'jquery'
	), '20130508', true );
}
add_action ( 'customize_controls_enqueue_scripts', 'apollo_customize_init_js' );

include ('customizer/sanitizers.php');

/**
 * Check if container is not fluid
 *
 * @param unknown $control
 * @return boolean
 */
function apollo_is_container_fluid_callback($control) {
	if ($control->manager->get_setting ( 'container_class' )->value () == 'container') {
		return false;
	}
	return true;
}
