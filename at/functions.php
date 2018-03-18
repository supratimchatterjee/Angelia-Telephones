<?php
/**
 * Angelia Telephones functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Angelia_Telephones
 */

if ( ! function_exists( 'at_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function at_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Angelia Telephones, use a find and replace
	 * to change 'at' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'at', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'at' ),
		'footer' => esc_html__( 'Footer', 'at' )
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

}
endif;
add_action( 'after_setup_theme', 'at_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function at_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'at_content_width', 1120 );
}
add_action( 'after_setup_theme', 'at_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function at_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'at' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'at' ),
		'before_widget' => '<div id="%1$s" class="widget uk-panel %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'at' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Footer Widgets', 'at' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
register_sidebar( array(
		'name'          => esc_html__( 'Login Widgets', 'at' ),
		'id'            => 'login-form',
		'description'   => esc_html__( 'Login Widgets', 'at' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );	


}
add_action( 'widgets_init', 'at_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function at_scripts() {
	wp_enqueue_style( 'uikit-css', get_stylesheet_directory_uri() . '/css/uikit.css' );
	wp_enqueue_style( 'uikit-accordion-css', get_stylesheet_directory_uri() . '/css/components/accordion.css' );
	wp_enqueue_style( 'uikit-slideshow-css', get_stylesheet_directory_uri() . '/css/components/slideshow.css' );
	wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/css/app.css' );

	wp_enqueue_script( 'uikit-js', get_template_directory_uri() . '/js/uikit.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'uikit-accordion-js', get_template_directory_uri() . '/js/components/accordion.min.js', array(), '1.0', true );
	wp_enqueue_script( 'uikit-slideshow-js', get_template_directory_uri() . '/js/components/slideshow.min.js', array(), '1.0', true );
	//wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/app.js', array(), '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'at_scripts' );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' => 'Theme Settings',
		'menu_title'=> 'Theme Settings',
		'menu_slug' => 'theme-settings',
		'capability'=> 'edit_posts',
		'redirect'	=> false
	));

}



//Quotes widget

class Quotes_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		'quotes_widget', // Base ID
		__('Quotes Widget', 'at'), // Name
		array( 'description' => __( 'Widget containing Quotes', 'at' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
	
	echo $args['before_widget'];
	
	?>
    
   <?php if( have_rows('quotes', 'widget_' . $this->id) ): $count = 1; ?>
	<?php while( have_rows('quotes', 'widget_' . $this->id) ): the_row(); 
        $quote = get_sub_field('quote');
        $author = get_sub_field('author');
		$position = get_sub_field('position');
		$class = ($count % 2 == 0) ? 'blackbg' : '';
    ?>
   
    <div class="quote_widget <?php echo $class; ?>"><!--quote_widget-->
    	<p>"<?php echo $quote; ?>"</p>
        <span><?php echo $author; ?> <?php if($position): ?>-<?php endif; ?></span>
        <span><?php echo $position; ?></span>
     	<span class="quote_arrow"></span>   
    </div><!--quote_widget-->
    
    <?php $count++; endwhile; ?>
    <?php endif; ?>
    
    
    <?php
	
	
	echo $args['after_widget'];
	}

	public function form( $instance ) {
	
	}

} 

// function register_security_logos_widget should copy in add_action section
// Copy  class name from top and pest it on  register_widget section below

function register_quotes_widget() {
register_widget( 'Quotes_Widget' );
}
add_action( 'widgets_init', 'register_quotes_widget' );










function human_filesize($ch, $dec = 2) {
	$headers	= get_headers($ch, 1);
	$fsize		= $headers['Content-Length'];
	$sizes		= array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
	$factor		= floor((strlen($fsize) - 1) / 3);
	return sprintf("%.{$dec}f", $fsize / pow(1024, $factor)) . @$sizes[$factor];
}
