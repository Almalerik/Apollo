<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Apollo
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes
 *        	Classes for the body element.
 * @return array
 */
function apollo_body_classes($classes) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if (is_multi_author ()) {
		$classes [] = 'group-blog';
	}
	
	// Adds a class of hfeed to non-singular pages.
	if (! is_singular ()) {
		$classes [] = 'hfeed';
	}
	
	// Adds a class if primary menu must be fix if override logo.
	if ( apollo_get_option ( 'header_menu_fix' )) {
		$classes [] = 'apollo-menu-fix';
	}
	
	return $classes;
}
add_filter ( 'body_class', 'apollo_body_classes' );

/**
 * This will generate a line of CSS for use in header output.
 * If the setting (apollo_get_option()) has no defined value or value is equal to default (apollo_get_option_defaults()), the CSS will not be output.
 *
 * @uses get_theme_mod()
 * @param string $selector
 *        	CSS selector
 * @param string $style
 *        	The name of the CSS *property* to modify
 * @param string $mod_name
 *        	The name of the 'theme_mod' option to fetch
 * @param string $prefix
 *        	Optional. Anything that needs to be output before the CSS property
 * @param string $postfix
 *        	Optional. Anything that needs to be output after the CSS property
 * @param bool $echo
 *        	Optional. Whether to print directly to the page (default: TRUE).
 * @return string Returns a single line of CSS with selectors and a property.
 */
function apollo_generate_css($selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true) {
	$return = '';
	$mod = apollo_get_option ( $mod_name );
	$default = apollo_get_option_defaults () [$mod_name];
	
	if ($mod != '' && $mod !== $default) {
		$return = sprintf ( "%s { %s:%s; }\n", $selector, $style, $prefix . $mod . $postfix );
		if ($echo) {
			echo $return;
		}
	}
	
	return $return;
}

/**
 * Convert a hex color to rgba color format getting parameter from Theme Modification API
 *
 * @param String $mod_name_hex
 *        	Key theme option with hex color value
 * @param String $mod_name_opacity
 *        	Key theme option with opacity color value; if null value 1 is used
 * @param boolean $css
 *        	If true return a rgba string else return an array of rgba values
 */
function apollo_hex2rgba($mod_name_hex, $mod_name_opacity, $css) {
	$rgba = array ();
	$mod_hex = apollo_get_option ( $mod_name_hex );
	$mod_hex_default = apollo_get_option_defaults () [$mod_name_hex];
	if (! $mod_name_opacity) {
		$mod_opacity = 1;
		$mod_opacity_default = 0;
	} else {
		$mod_opacity = apollo_get_option ( $mod_name_opacity );
		$mod_opacity_default = apollo_get_option_defaults () [$mod_name_opacity];
	}
	
	if (($mod_hex !== '' && $mod_hex !== $mod_hex_default) || ($mod_opacity !== '' && $mod_opacity !== $mod_opacity_default)) {
		
		$mod_hex = str_replace ( "#", "", $mod_hex );
		
		if (strlen ( $mod_hex ) == 3) {
			$r = hexdec ( substr ( $mod_hex, 0, 1 ) . substr ( $mod_hex, 0, 1 ) );
			$g = hexdec ( substr ( $mod_hex, 1, 1 ) . substr ( $mod_hex, 1, 1 ) );
			$b = hexdec ( substr ( $mod_hex, 2, 1 ) . substr ( $mod_hex, 2, 1 ) );
		} else {
			$r = hexdec ( substr ( $mod_hex, 0, 2 ) );
			$g = hexdec ( substr ( $mod_hex, 2, 2 ) );
			$b = hexdec ( substr ( $mod_hex, 4, 2 ) );
		}
		
		$rgba = array (
				$r,
				$g,
				$b,
				$mod_opacity 
		);
	}
	
	if ($css) {
		if (count ( $rgba ) > 0) {
			return "rgba(" . implode ( ',', $rgba ) . ")";
		} else {
			return '';
		}
	} else {
		return $rgba;
	}
}
