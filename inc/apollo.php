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
			
			'header_template' => 'logo-left',
			'header_wrapped' => true,
			'header_position' => 'apollo-header-sticky-top',
			'header_menu_fix' => true,
			'header_bg_color' => '#ffffff',
			'header_bg_color_opacity' => '1',
			'header_bg_color_opacity_onscroll' => '1',
			'header_title_color' => '#111111',
			'header_description_color' => '#777777',
				
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
			'logo-left' => esc_html__ ( 'Left logo', 'apollo' ),
			'logo-center' => esc_html__ ( 'Center logo', 'apollo' ),
			'logo-right' => esc_html__ ( 'Right logo', 'apollo' ) 
	);
	return apply_filters ( 'apollo_header_templates', $templates );
}

/**
 * Return header css class from options.
 *
 * @param bool $echo
 *        	Optional. Whether to print directly to the page (default: true).
 * @return string
 */
function apollo_get_header_css_class($echo = true) {
	$result = '';
	
	// if (apollo_get_option ( 'header_banner' )) {
	// $result [] = apollo_get_option ( 'header_banner_layout' );
	// }
	
	$result [] = apollo_get_option ( 'header_position' );
	
	if ($echo) {
		echo implode ( ' ', $result );
	}
	
	return implode ( ' ', $result );
}

/**
 * This will output the logo url.
 *
 * @return string Returns logo url.
 */
function apollo_get_logo() {
	$logo = apollo_get_option ( 'logo' );
	
	if (isset ( $logo ) && $logo != "") {
		return $logo;
	} else {
		if (file_exists ( get_stylesheet_directory () . "/assets/images/logo.png" )) {
			return get_stylesheet_directory_uri () . "/assets/images/logo.png";
		} else {
			return get_template_directory_uri () . "/assets/images/logo.png";
		}
	}
}
