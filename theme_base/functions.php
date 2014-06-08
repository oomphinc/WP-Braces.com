<?php
/**
 * hfhkfk functions and definitions
 *
 * @package WordPress
 * @subpackage Hfhkfk
 * @author hjvjhvjhjh
 * @link jhfjhfjh
 */

{{{VIP}}}
/**
 * Add VIP functionality
 * @link http://lobby.vip.wordpress.com/getting-started/development-environment/
 */
require_once( WP_CONTENT_DIR . '/themes/vip/plugins/vip-init.php' );
wpcom_vip_load_plugin( 'post-meta-inspector' );
{{{/VIP}}}


/**
 * Set the content width based on the theme's design and stylesheet.
 * @link https://codex.wordpress.org/Content_Width
 * @author johncionci
 */
if ( !isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function cfjfkfuyr_setup() {

	
	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Enable support for HTML5 markup.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
	 * @author johncionci
	 */
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'cfjfkfuyr_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cfjfkfuyr' ),
	) );

}
add_action( 'after_setup_theme', 'cfjfkfuyr_setup' );

/**
 * Enqueue scripts and styles
 */
function cfjfkfuyr_scripts() {
	wp_enqueue_style( 'cfjfkfuyr', get_stylesheet_uri() );
	wp_enqueue_style( 'cfjfkfuyr-theme', get_template_directory_uri() . '/css/styles.css', null, false, 'all' );

	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	
}
add_action( 'wp_enqueue_scripts', 'cfjfkfuyr_scripts' );

/**
 * Add Custom Classes
 */

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

/**
 * Load Widgets file.
 */
require get_template_directory() . '/inc/widgets.php';
{{{CUSTOM-POSTS}}}
/**
 * Custom post types
 */
{%= post_type_include %}
{{{/CUSTOM-POSTS}}}
