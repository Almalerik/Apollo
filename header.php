<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Apollo
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site <?php echo apollo_get_option('container_class');?>">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'apollo' ); ?></a>
	
	<?php locate_template( 'template-parts/header/' . apollo_get_option( 'header_template' ) . '.php', true, true );?>

	<div id="content" class="site-content">
