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

add_editor_style( 'editor-style.css' );

/**
 * defines the visual layout to be added in to the Wordpress content object
 * @param  [type] $content [description]
 * @return [type]          [description]
 */
function custom_layout_injector( $content )
{
    // assemble the custom content
    $content = '
    <div class="content-col-main">
        &nbsp;
        Main content goes here.
    </div>

    <div class="content-col-right">
        &nbsp;
        Side content goes here.
    </div>

    ';
    return $content;
}
add_filter('default_content', 'custom_layout_injector' );