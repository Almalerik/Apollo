<?php
class Apollo_Custom_Menu {
	
	/*
	 * --------------------------------------------*
	 * Constructor
	 * --------------------------------------------
	 */
	
	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {
		// add custom menu fields to menu
		add_filter ( 'wp_setup_nav_menu_item', array (
				$this,
				'apollo_add_custom_nav_fields' 
		) );
		// save menu custom fields
		add_action ( 'wp_update_nav_menu_item', array (
				$this,
				'apollo_update_custom_nav_fields' 
		), 10, 3 );
		// edit menu walker
		add_filter ( 'wp_edit_nav_menu_walker', array (
				$this,
				'apollo_edit_walker' 
		), 10, 2 );
	} // end constructor
	
	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 *
	 */
	function apollo_add_custom_nav_fields($menu_item) {
		$menu_item->apollo_custom_html = get_post_meta ( $menu_item->ID, '_menu_item_apollo_custom_html', true );
		$menu_item->apollo_icon = get_post_meta ( $menu_item->ID, '_menu_item_apollo_icon', true );
		$menu_item->apollo_image = get_post_meta ( $menu_item->ID, '_menu_item_apollo_image', true );
		return $menu_item;
	}
	
	/**
	 * Save menu custom fields
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 */
	function apollo_update_custom_nav_fields($menu_id, $menu_item_db_id, $args) {
		
		// Check if element is properly sent
		if (isset ( $_REQUEST ['menu-item-apollo-custom-html'] ) && is_array ( $_REQUEST ['menu-item-apollo-custom-html'] )) {
			$custom_html_value = $_REQUEST ['menu-item-apollo-custom-html'] [$menu_item_db_id];
			update_post_meta ( $menu_item_db_id, '_menu_item_apollo_custom_html', $custom_html_value );
		}
		
		if (isset ( $_REQUEST ['menu-item-apollo-icon'] ) && is_array ( $_REQUEST ['menu-item-apollo-icon'] )) {
			$icon_value = $_REQUEST ['menu-item-apollo-icon'] [$menu_item_db_id];
			update_post_meta ( $menu_item_db_id, '_menu_item_apollo_icon', $icon_value );
		}
		
		if (isset ( $_REQUEST ['menu-item-apollo-image'] ) && is_array ( $_REQUEST ['menu-item-apollo-image'] )) {
			$image_value = $_REQUEST ['menu-item-apollo-image'] [$menu_item_db_id];
			update_post_meta ( $menu_item_db_id, '_menu_item_apollo_image', $image_value );
		}
	}
	/**
	 * Define new Walker edit
	 *
	 * @access public
	 * @since 1.0
	 * @return void
	 *
	 */
	function apollo_edit_walker($walker, $menu_id) {
		return 'Walker_Nav_Menu_Edit_Apollo';
	}
}

// instantiate plugin's class
$GLOBALS ['Apollo_Custom_Menu'] = new Apollo_Custom_Menu ();

include_once ('custom-nav-menu.php');
include_once ('custom-nav-walker.php');

