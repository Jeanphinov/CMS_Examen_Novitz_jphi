<?php

include 'extensions/Tweets.php';
include 'src/get_twitter.php';
include_once "templates/_partials/_tweets-post.php";
add_action( 'after_setup_theme', 'pdw_theme_setup' );

function pdw_theme_setup(){
    load_theme_textdomain( 'slug-de-mes-traductions', get_template_directory() . '/languages' );
}

function menu_html(){
    echo 'hello world';
}

function add_admin_menu()
{
    add_menu_page('Page Tweeter',
        'page Tweeter',
        'manage_options',
        '/src/get_twitter','hello');
}
add_action('admin_menu', 'add_admin_menu');

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
        wp_register_script('jquery', get_stylesheet_directory_uri() . '/assets/js/jquery.js', TRUE);
        wp_register_script('map', get_stylesheet_directory_uri() . '/assets/js/map.js', TRUE);
        wp_register_script('carousel', get_stylesheet_directory_uri() . '/assets/libraries/owl.carousel/owl.carousel.min.js', TRUE);
        wp_register_script('superlist', get_stylesheet_directory_uri() . '/assets/js/superlist.js', TRUE);
        wp_register_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', TRUE);


        wp_enqueue_script('jquery');
        wp_enqueue_script('map');
        wp_enqueue_script('carousel');
        wp_enqueue_script('superlist');
        wp_enqueue_script('bootstrap');

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


function get_menu($name, $class = null)
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

include_once('src/getArticles.php');
include_once('src/slider.php');

wp_reset_postdata();

