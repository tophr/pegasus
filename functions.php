<?php

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 700;

/**
 * Sets up theme defaults and registers the various WordPress features.
 */

function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
	//wp_register_script( 'webfonts', '//use.typekit.net/qmo2igc.js', array() );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap' );
	//wp_enqueue_script( 'webfonts' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );


	// Register menus.
	//register_nav_menu( 'primary', 'Primary Menu' );
	//register_nav_menu( 'footer', 'Footer Menu' );

	register_nav_menus(
        array(
        'primary' => __('Header Menu'),
        'footer' => __('Footer Links')
        )
     );

	// Register Custom Navigation Walker for Bootstrap
	require_once('twitter_bootstrap_nav_walker.php');

// Check for submenus. Code by Nathaniel Taintor of goldenapplesdesign.com
//function check_for_submenu($classes, $item) {
  //  global $wpdb;
    //$has_children = $wpdb->get_var("SELECT COUNT(meta_id) FROM wp_postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='".$item->ID."'");
    //if ($has_children > 0) array_push($classes,'dropdown'); // assign the class dir to list items with sub menu.
    //return $classes;
//}
 
//add_filter( 'nav_menu_css_class', 'check_for_submenu', 10, 2);

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 940, 260, true ); // force image to crop to size

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'landing-thumb', 940 ); //940 pixels wide (and unlimited height)
}

function pegasus_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'pegasus' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'pegasus' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Homepage Feature', 'pegasus' ),
		'id' => 'homepage-feature',
		'description' => __( 'Controls the Lower Right Column on the Front Page', 'pegasus' ),
		'before_widget' => '<div class="home-banner">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Header Widget Area', 'pegasus' ),
		'id' => 'sidebar-header',
		'description' => __( 'Controls the Contact Us link in the site header', 'pegasus' ),
		'before_widget' => '<div id="%1$s" class="contact widget %2$s">',
		'after_widget' => '</div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Left Footer Widget Area', 'pegasus' ),
		'id' => 'footer-left',
		'description' => __( 'Controls the left side of the site footer', 'pegasus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Right Footer Widget Area', 'pegasus' ),
		'id' => 'footer-right',
		'description' => __( 'Controls the right side of the site footer', 'pegasus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
	) );
}
add_action( 'widgets_init', 'pegasus_widgets_init' );

function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'my_add_excerpts_to_pages' );

/* Custom Login Logo Support */

function tz_custom_login_logo() {
    echo '<style type="text/css">
        .login h1 a { background-image:url('.get_template_directory_uri().'/img/pegasus_logo.png); background-size: auto auto; width: 235px; height: 143px; }
    </style>';
}
function tz_wp_login_url() {
    return home_url();
}
function tz_wp_login_title() {
    return get_option('blogname');
}

add_action('login_head', 'tz_custom_login_logo');
add_filter('login_headerurl', 'tz_wp_login_url');
add_filter('login_headertitle', 'tz_wp_login_title');