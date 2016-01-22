<?php
/**
 * Apollo functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Apollo
 */
$apollo_version = '1.0.0';

if ( ! function_exists( 'apollo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function apollo_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Apollo, use a find and replace
	 * to change 'apollo' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'apollo', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'apollo' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'apollo_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'apollo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function apollo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'apollo_content_width', 1024 );
}
add_action( 'after_setup_theme', 'apollo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function apollo_widgets_init() {
	register_sidebar ( array (
			'name' => esc_html__ ( 'Left sidebar', 'apollo' ),
			'id' => 'left-sidebar',
			'description' => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
	) );
	register_sidebar ( array (
			'name' => esc_html__ ( 'Right sidebar', 'apollo' ),
			'id' => 'right-sidebar',
			'description' => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
	) );
	register_sidebar ( array (
			'name' => esc_html__ ( 'Homepage features', 'apollo' ),
			'id' => 'homepage-features',
			'description' => esc_html__ ( 'From the widgets list, select "Apollo Feature".', 'apollo' ),
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
	) );
	register_sidebar ( array (
			'name' => esc_html__ ( 'Homepage highlights', 'apollo' ),
			'id' => 'homepage-highlights',
			'description' => esc_html__ ( 'From the widgets list, select "Apollo Highlights".', 'apollo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
	) );
	register_sidebar ( array (
			'name' => esc_html__ ( 'Homepage highlights', 'apollo' ),
			'id' => 'homepage-staff',
			'description' => esc_html__ ( 'From the widgets list, select "Apollo Highlights".', 'apollo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
	) );
}
add_action( 'widgets_init', 'apollo_widgets_init' );

/**
 * Enqueue public scripts and styles.
 */
if (! function_exists ( 'apollo_public_scripts' )) {

	function apollo_public_scripts() {
		
		// FontAwesome
		wp_enqueue_style ( 'apollo-fontawesome', get_template_directory_uri () . '/assets/font-awesome/css/font-awesome.min.css' );
		
		// Bootstrap
		wp_enqueue_style ( 'apollo-bootstrap-style', get_template_directory_uri () . '/assets/bootstrap/3.3.6/css/bootstrap.css' );
		wp_enqueue_script ( 'apollo-bootstrap-script', get_template_directory_uri () . '/assets/bootstrap/3.3.6/js/bootstrap.min.js', array (
				'jquery'
		), '3.3.6', true );
		
		// Sticky-kit
		wp_enqueue_script ( 'apollo-stickykit-script', get_template_directory_uri () . '/assets/sticky-kit/1.1.2/jquery.sticky-kit.min.js', array (
				'jquery'
		), '1.1.2', true );
		
		// Swiper
		wp_enqueue_style ( 'apollo-swiper-style', get_template_directory_uri () . '/assets/swiper/css/swiper.css' );
		wp_enqueue_script ( 'apollo-swiper-script', get_template_directory_uri () . '/assets/swiper/js/swiper.jquery.js', array (
				'jquery'
		), '3.3.5', true );
		
		// Shuffle
		wp_enqueue_script ( 'apollo-shuffle-script', get_template_directory_uri () . '/assets/public/js/jquery.shuffle.modernizr.min.js', array (
				'jquery'
		), '3.3.5', true );
		
		wp_enqueue_style ( 'apollo-style', get_stylesheet_uri () );
		wp_enqueue_script ( 'apollo-script', get_template_directory_uri () . '/assets/public/js/public.js', array (
				'jquery'
		), '1.0.0', true );
		
		wp_enqueue_script ( 'apollo-skip-link-focus-fix', get_template_directory_uri () . '/assets/public/js/skip-link-focus-fix.js', array (), '20130115', true );
		
		wp_register_script( 'ie_html5shiv', get_bloginfo('stylesheet_url') . '/assets/public/js/html5shiv.min.js', __FILE__, false, '3.7.3' );
		wp_enqueue_script( 'ie_html5shiv');
		wp_script_add_data( 'ie_html5shiv', 'conditional', 'lt IE 9' );
		
		wp_register_script( 'ie_respond', get_bloginfo('stylesheet_url') . '/assets/public/js/respond.min.js', __FILE__, false, '1.4.2' );
		wp_enqueue_script( 'ie_respond');
		wp_script_add_data( 'ie_respond', 'conditional', 'lt IE 9' );
		
		if (is_singular () && comments_open () && get_option ( 'thread_comments' )) {
			wp_enqueue_script ( 'comment-reply' );
		}
	}
	
}
add_action ( 'wp_enqueue_scripts', 'apollo_public_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
if (! function_exists ( 'apollo_admin_scripts' )) {
	function apollo_admin_scripts($hook) {

		// FontAwesome
		wp_enqueue_style ( 'apollo-admin-fontawesome', get_template_directory_uri () . '/assets/font-awesome/css/font-awesome.min.css', array (
				'apollo-admin-style'
		) );

		// Select2
		wp_enqueue_style ( 'apollo-select2-style', get_template_directory_uri () . '/assets/admin/select2/css/select2.min.css', array (
				'apollo-admin-style'
		) );
		wp_enqueue_script ( 'apollo-select2-script', get_template_directory_uri () . '/assets/admin/select2/js/select2.full.min.js', array (
				'jquery'
		), true );
		
		// Wp Media
		wp_enqueue_media ();

		// Wp jQuery UI
		wp_enqueue_script ( 'jquery-ui-core' );
		wp_enqueue_script ( 'jquery-ui-accordion' );

		wp_register_style ( 'apollo-admin-style', get_template_directory_uri () . '/assets/admin/css/admin.css' );
		wp_enqueue_style ( 'apollo-admin-style' );
		wp_enqueue_script ( 'apollo-admin-script', get_template_directory_uri () . '/assets/admin/js/admin.js', array (
				'jquery',
				'apollo-select2-script'
		) );

	}
}
add_action ( 'admin_enqueue_scripts', 'apollo_admin_scripts' );

/**
 * Implement Theme function.
 */
require get_template_directory() . '/inc/apollo.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom-Metaboxes-and-Fields-for-WordPress2
 * @link     https://github.com/WebDevStudios/CMB2
 */
require get_template_directory () . '/inc/CMB2/init.php';

/**
 * Load Custom Nav
 */
// TODO: MEGAMENU
//require get_template_directory () . '/inc/nav/nav.php';
require get_template_directory () . '/inc/nav/wp_bootstrap_navwalker.php';
