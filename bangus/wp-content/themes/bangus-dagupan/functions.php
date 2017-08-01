<?php
/**
 * Bangus Dagupan functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bangus_Dagupan
 */

if ( ! function_exists( 'bangus_dagupan_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bangus_dagupan_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Bangus Dagupan, use a find and replace
	 * to change 'bangus-dagupan' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bangus-dagupan', get_template_directory() . '/languages' );

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
//	register_nav_menus( array(
//		'menu-1' => esc_html__( 'Primary', 'bangus-dagupan' ),
//	) );

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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bangus_dagupan_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'bangus_dagupan_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bangus_dagupan_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bangus_dagupan_content_width', 640 );
}
add_action( 'after_setup_theme', 'bangus_dagupan_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bangus_dagupan_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bangus-dagupan' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bangus-dagupan' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bangus_dagupan_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function own_style(){
//My Own Scripts and Styles
wp_enqueue_style( 'modifycss', get_template_directory_uri() . '/css/modify.css',false,'','all');    
wp_enqueue_style( 'customcss', get_template_directory_uri() . '/css/custom.css',false,'','all');
wp_enqueue_style( 'extra-stylecss', get_template_directory_uri() . '/css/extra-style.css',false,'','all');
wp_enqueue_style( 'responsivecss', get_template_directory_uri() . '/css/responsive.css',false,'','all' );    
wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.css');
//wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',false,'3.3.7','all');
}
add_action('wp_enqueue_scripts', 'own_style');

function bangus_dagupan_scripts() {
    wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', array('jquery'), '1.9.1', false);
    
	wp_enqueue_script( 'bangus-dagupan-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bangus_dagupan_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

//LOGO
add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );

//Custom Menu
function register_my_menus() {
  register_nav_menus(
    array(
      'new-menu' => __( 'Super Header Menu' ),
      'another-menu' => __( 'Footer' ),
      'side-menu' => __( 'Side Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

//MY CUSTOM POST TYPES

// Our custom post type function
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'events',
		array(
			'labels' => array(
				'name'          => __( 'Events' ),
				'singular_name' => __( 'Event' )
			),
            'taxonomies'    => array( 'category' ),    
		'public'      => true,
		'has_archive' => true,
            
		)
	);
}

add_theme_support( 'post-thumbnails' );
function theme_setup() {
    register_post_type( 'events', array(
        'supports' => array('thumbnail'),
    ));
}
add_action( 'after_setup_theme', 'theme_setup' );

//CUSTOM REGISTER  SIDEBAR
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Sidebar Directory Page',
		'id' => 'directory',
		'description' => 'This is a custom sidebar for Directory',
		'before_widget' => '<section id="%1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Sub Menu',
		'id' => 'custom',
		'description' => 'This is a custom sidebar for Pages',
		'before_widget' => '<section id="%1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Contact Sub Menu',
		'id' => 'custom-sidebar',
		'description' => 'This is a custom sidebar Contact Page',
		'before_widget' => '<section id="%1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
//End of Custom Register Sidebar


// Option Page of ACF
 if( function_exists('acf_add_options_page') ) { 
  acf_add_options_page(array(
    'page_title'  => 'Theme General Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
}
//End of Option Page of ACF

// Custom Excerpt function for Advanced Custom Fields
function custom_field_excerpt() {
	global $post;
	$text = get_sub_field('pt_image_description'); //Replace 'your_field_name'
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]&gt;', ']]&gt;', $text);
		$excerpt_length = 25; // 20 words
		$excerpt_more = apply_filters('excerpt_more', ' ' . '...');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}

//Custom Image Size
add_image_size( 'thumbnail-size', 277, 277, true );
//Featured Image Upload
add_image_size('Featured_Image-size', 540, 360, true);
//Slider Upload
add_image_size('Slider_Image', 1600, 560, true);