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
 * defines the visual layout to be added in to the Wordpress content object.
 * @param   Object $content
 * @return  Object $content
 */
function custom_layout_injector( $content )
{
    // assemble the custom content
    $content = '
    <div class="content-col-left">
        &nbsp;
        Put your image here.
        <br>
        <div class="content-row-bottom">
            Put your sound file here.
        </div>
    </div>

    <div class="content-col-right">
        <div class="show-hide visible">
            <b>Transcript</b>
            <hr />
            Put Your Transcript here.
        </div>
        <div class="button-container"></div>
    </div>





    ';
    return $content;
}
add_filter('default_content', 'custom_layout_injector' );


/**
 * Change the label for "Posts" in the admin area to "Activities"
 * @return none
 */
function youlisten_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Activities';
    $submenu['edit.php'][5][0] = 'Activities';
    $submenu['edit.php'][10][0] = 'Add an Activity';
    $submenu['edit.php'][16][0] = 'Activity Tags';
    echo '';
}
/**
 * Change the labels on the post object to more accurately reflect the purpose of our application.
 * "Posts" are relabled "Activities"
 * @return none
 */
function youlisten_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Activities';
    $labels->singular_name = 'Activities';
    $labels->add_new = 'Add an Activity';
    $labels->add_new_item = 'Add an Activity';
    $labels->edit_item = 'Edit an Activity';
    $labels->new_item = 'Activities';
    $labels->view_item = 'View Activities';
    $labels->search_items = 'Search Activities';
    $labels->not_found = 'No Activities Found';
    $labels->not_found_in_trash = 'No Activities found in Trash';
    $labels->all_items = 'All Activities';
    $labels->menu_name = 'Activities';
    $labels->name_admin_bar = 'Activities';
}

add_action( 'admin_menu', 'youlisten_change_post_label' );
add_action( 'init', 'youlisten_change_post_object' );


function youlisten_add_acripts() {
    wp_register_script( 'show-hide', get_stylesheet_directory_uri() . '/js/showHide.js', array ('jquery'));
    wp_enqueue_script('show-hide');
}

add_action( 'wp_enqueue_scripts', 'youlisten_add_acripts');