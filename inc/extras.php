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
 * @param array $classes Classes for the body element.
 * @return array
 */
function apollo_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'apollo_body_classes' );

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
