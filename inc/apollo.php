<?php
/**
 * Apollo theme functions.
 *
 * @package Apollo
 */

/**
 * Theme default values
 *
 * @return valuable filterable
 *         By making the return valuable filterable, the Theme defaults can be easily overridden by a Child Theme or Plugin.
 */
function apollo_get_option_defaults() {
	$defaults = array (
			'page_bg_color' => '#ffffff',
			'logo' => '',
			'container_class' => 'container-fluid',
			'wrapped_element_max_width' => '1170',
			
			'header_template' => 'logo-left.php',
	);
	return apply_filters ( 'apollo_option_defaults', $defaults );
}

/**
 * Get theme options value using Theme Modification API; if key not exists, return default value.
 *
 * @param string $key        	
 * @return mixed
 */
function apollo_get_option($key) {
	return get_theme_mod ( $key, apollo_get_option_defaults () [$key] );
}

/**
 * Header templates
 *
 * @return valuable filterable
 */
function apollo_get_header_templates() {
	$templates = array (
			'logo-left.php' => esc_html__('Left logo', 'apollo'),
			'logo-center.php' => esc_html__('Center logo', 'apollo'),
			'logo-right.php' => esc_html__('Right logo', 'apollo'),
	);
	return apply_filters ( 'apollo_header_templates', $templates );
}
