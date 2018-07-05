<?php
/**
 * Golden Bowl extra functions and definitions
 *
 * @package Qohelet
 * @since Qohelet 0.0.1
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Qohelet 0.0.1
 */

/**
 * Golden Bowl styles linked to parent styles
 */
function golden_bowl_enqueue_styles() {
 
    $parent_style = 'qohelet-style';
    $mycurtheme = wp_get_theme();
    $myparenttheme = wp_get_theme($mycurtheme->get('Template'));
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css',array(), $myparenttheme->get('Version') );
    wp_enqueue_style( 'golden_bowl-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        $mycurtheme->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'golden_bowl_enqueue_styles' );

/*
 * Additional setup features for Golden Bowl
 */
if ( ! function_exists( 'gb_setup' ) ) {
	function gb_setup() {
		global $content_width;
                
                // Enable support for Custom Backgrounds
		add_theme_support( 'custom-background', array(
				// Background color default
				'default-color' => 'fff',
				// Background image default
				'default-image' => trailingslashit( get_stylesheet_directory_uri() ) . 'images/thbg.png',
                                'default-repeat' => 'repeat-x'
			) );
                
                // Enable support for Custom Headers (or in our case, a custom logo)
		add_theme_support( 'custom-header', array(
				// Header image default
				'default-image' => trailingslashit( get_stylesheet_directory_uri() ) . 'images/logo.png',
				// Header text display default
				'header-text' => false,
				// Header text color default
				'default-text-color' => '000',
				// Flexible width
				'flex-width' => true,
				// Header image width (in pixels)
				'width' => 150,
				// Flexible height
				'flex-height' => true,
				// Header image height (in pixels)
				'height' => 150
			) );
                
        }    // end function gb_setup        
} // end code for setting up gb_setup
add_action( 'after_setup_theme', 'gb_setup' );


/**
 * Return a string containing the footer credits & link
 *
 * @since Qohelet 0.0.1
 *
 * @return string Footer credits & link
 */
/*
if ( ! function_exists( 'qohelet_get_credits' ) ) {
	function qohelet_get_credits() {
		$output = '';
		
                $output = 'This website is powered by <a href="http://wordpress.org">Wordpress</a>, using the <strong>Golden Bowl</strong> child theme, with the parent <em>Qohelet</em> theme, both from <a href="http://oldcastleweb.com">Old Castle Web Solutions</a>.';

		return $output;
	}
}
 * 
 */

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

?>