<?php
/**
 *
 * Portfolio child theme functions and definitions
 *
 */

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/**
 * Add the parent CSS to the child theme
 * @return null
 */
function theme_enqueue_styles()
{
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
