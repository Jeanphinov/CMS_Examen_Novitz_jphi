<?php

/*
 * Styles
 */
if (!function_exists('superlist_enqueue_styles')) {
    function superlist_enqueue_styles()
    {
        // Ajout du fichier main.css dans le head
        wp_enqueue_style('superlist', get_stylesheet_directory_uri() . '/assets/css/superlist.css');
        wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/assets/libraries/font-awesome/css/font-awesome.min.css');

    }

    add_action('wp_enqueue_scripts', 'superlist_enqueue_styles');

}

/*
 * Script
 */
if (!function_exists('superlist_enqueue_scripts')) {
    function superlist_enqueue_scripts()
    {
        // Pour éviter toute duplication de script Jquery, avant d'enregistrer le notre on désactive les autres
        wp_deregister_script('jquery');
        // Ajout du fichier main.min.js dans le head
        wp_register_script('jquery', get_stylesheet_directory_uri() . '/assets/css/jquery.js', TRUE);
        wp_register_script('map', get_stylesheet_directory_uri() . '/assets/css/map.js', TRUE);
        wp_register_script('superlist', get_stylesheet_directory_uri() . '/assets/css/superlist.js', TRUE);

        wp_enqueue_script('jquery');
        wp_enqueue_script('map');
        wp_enqueue_script('superlist');
        // Ajout de variable PHP dans le script js
        wp_localize_script(
            'main', 'Infos', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'themeurl' => get_stylesheet_directory_uri()
            )
        );
    }


}

add_action('wp_enqueue_scripts', 'superlist_enqueue_scripts');
/*
function remove_admin_login_header()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'remove_admin_login_header');*/

function get_menu($name,$class = null)
{

    $menu = wp_get_nav_menu_object($name); // recupere le mmenu qui porte le nom $name
    $menu_items = wp_get_nav_menu_items($menu->term_id);

    $child = array();
    foreach ($menu_items as $item) {
        // menu_item_parent représente l'id de l'élément parent

       /**
        * il faut faut faire la création des sous-menus
        */

    }
    include(locate_template('content/content-menu.php'));

}

wp_reset_postdata();

