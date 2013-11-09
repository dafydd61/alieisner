<?php
/**
 * ali functions and definitions
 *
 * @package ali
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'ali_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function ali_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on ali, use a find and replace
	 * to change 'ali' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ali', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'post-thumbnails' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ali' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'ali_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // ali_setup
add_action( 'after_setup_theme', 'ali_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function ali_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'ali' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'ali_widgets_init' );

/**
 * Hide Music, Video and TV categories from blog and RSS feed
 */
function exclude_category($query) {
	if ( $query->is_home() || $query->is_feed()) {
		$catsToExclude = "-" . get_cat_ID( 'video' );
		$catsToExclude .= " -" . get_cat_ID( 'tv' );
		$catsToExclude .= " -" . get_cat_ID( 'music' );
		$query->set('cat', $catsToExclude);
	}
	return $query;
}
add_filter('pre_get_posts', 'exclude_category');

// function blog_category($query) {
// 	if ( ($query->is_home() || $query->is_feed())  ) {
// 		$cat = get_cat_ID( 'blog' );
// 		$query->set('cat', $cat);
// 	}
// 	return $query;
// }
// add_filter('pre_get_posts', 'blog_category');


/**
 * Enqueue scripts and styles
 */
function ali_scripts() {
	wp_enqueue_style( 'ali-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ali-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'ali-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'ali-onload', get_template_directory_uri() . '/js/onload.js', array('jquery'), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'ali-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'ali_scripts' );

function ali_change_grunion_success_message( $msg ) {
global $contact_form_message;
return '<div class="contact-form"><h3>Yippee! I&rsquo;ll be in touch.<br><a href="' . esc_url( home_url( '/' ) ) . '">Back</a></h3></div>';
}
add_filter( 'grunion_contact_form_success_message', 'ali_change_grunion_success_message' );

function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '&hellip; <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read the whole thing</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
