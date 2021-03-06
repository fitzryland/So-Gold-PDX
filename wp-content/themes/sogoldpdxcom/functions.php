<?php
/**
 * sogoldpdxcom functions and definitions
 *
 * @package sogoldpdxcom
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'sogoldpdxcom_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sogoldpdxcom_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sogoldpdxcom, use a find and replace
	 * to change 'sogoldpdxcom' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'sogoldpdxcom', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'sogoldpdxcom' ),
	) );


	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // sogoldpdxcom_setup
add_action( 'after_setup_theme', 'sogoldpdxcom_setup' );

function remove_acf_menu() {
	remove_menu_page('edit.php?post_type=acf');
}

if ( ! defined( 'SOGOLD_ENVIRONMENT' ) || SOGOLD_ENVIRONMENT !== 'local' ) {
	require_once(get_stylesheet_directory() . '/inc/acf-export.php');
	add_action( 'admin_menu', 'remove_acf_menu', 999 );
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function sogoldpdxcom_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'sogoldpdxcom' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'sogoldpdxcom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sogoldpdxcom_scripts() {
	wp_enqueue_style( 'sogoldpdxcom-google_fonts', 'http://fonts.googleapis.com/css?family=Lato:300,400,900' );
	wp_enqueue_style( 'sogoldpdxcom-style', get_stylesheet_uri() );

	wp_enqueue_script( 'sogoldpdxcom-navigation', get_template_directory_uri() . '/js/lib/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'sogoldpdxcom-skip-link-focus-fix', get_template_directory_uri() . '/js/lib/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'bx-slider', get_template_directory_uri() . '/js/lib/jquery.bxslider.js', array(), '20130115', true );

	wp_enqueue_script( 'sogoldpdxcom-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sogoldpdxcom_scripts' );


function add_editor_style_function() {
  add_editor_style('style.css');
}
add_action('init', 'add_editor_style_function');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';



/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Custom Post Type Registration
 */
require get_template_directory() . '/functions-cpt.php';

/**
 * Helpers!
 */
require get_template_directory() . '/functions-helpers.php';