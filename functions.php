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
        <div id="tab-container">
          <ul class="box-tabs">
              <li><a href="#blank-div">Hide</a></li>
              <li><a href="#transcript-div">Transcript</a></li>
              <li><a href="#questions-div">Questions</a></li>
          </ul>
          <div id="blank-div"></div>
          <div id="transcript-div">
            <h2>Transcript</h2>
            <hr />
            <p>Paste your Transcript here</p>
        </div>
        <div id="questions-div">
            <h2>Questions</h2>
            <hr/>
            <p>Paste your questions here</p>
        </div>
    </div>
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

/**
 * Add any and all javascript to the page
 * @return  none
 */
function youlisten_add_acripts() {
    wp_register_script( 'inits', get_stylesheet_directory_uri() . '/js/inits.js', array ('jquery'));
    wp_enqueue_script('inits');
    wp_register_script( 'easytabs', get_stylesheet_directory_uri() . '/js/jquery/jquery.easytabs.js', array ('jquery'));
    wp_enqueue_script('easytabs');
}

add_action( 'wp_enqueue_scripts', 'youlisten_add_acripts');


/**
 * Redirects the current user to the login page if they are not logged in
 */
function redirect_to_login() {
    // [String] wordpress global storing currently visited page
    global $pagenow;
    if( ! is_user_logged_in() && ! is_page( 'login' ) ){
        auth_redirect();
    }
}

add_action('template_redirect', 'redirect_to_login' );


/**
 * Redirect all users with the role of "student" to the home page after a successful login
 * @param  [type] $redirect_to [description]
 * @param  [type] $request     [description]
 * @param  [type] $user        [description]
 * @return [type]              [description]
 */
function redirect_after_login($url, $request, $user) {
    if ( $user- && is_object($user) && is_a($user, 'wp_user') ) {
        if ( $user->has_cap( 'student' ) ) {
            $url = home_url();
        }
    } else {
        $url = admin_url();
    }
}
return $url;
}

add_filter( 'login_redirect', 'redirect_after_login', 10, 3 );

