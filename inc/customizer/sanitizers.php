<?php

/**
 * Sanitize callback for container class
 *
 * @param string $value
 * @return string
 */
function apollo_sanitize_container($value) {
	if (! in_array ( $value, array (
			'container-fluid',
			'container' 
	) ))
		$value = 'container-fluid';
	
	return $value;
}

/**
 * Sanitize callback for integer
 *
 * @param mixed $value        	
 * @return int
 */
function apollo_sanitize_int($value) {
	return absint ( $value );
}

/**
 * Sanitize callback for css opacity value
 *
 * @param string $value        	
 * @return string
 */
function apollo_sanitize_opacity($value) {
	return floatval ( $value );
}