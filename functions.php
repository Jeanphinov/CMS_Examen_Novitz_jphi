<?php

/***************************************************************************************************************
 *  Page functions.php
 *  je place ici les fonction à utiliser dans  mon site
 *  j'inclus les styles et les css ou d'autres fichiers
 *
 *  Les choses qui prennent trop de place ou que je veux isoler je les met dans un de ces répertoires
 *   - /content ou /extension pour les methodes php
 *   - /templates ou /templates/_partials pour ce qui est de la mise en forme
 *
 *  J'essaie de mettre un maximum de commentaires
 *
 ****************************************************************************************************************/
/*
 * inclus Nav
 */
include('content/getNav.php');

/*
 * formulaire de contact
 */
include 'content/formulaire.php';

/*
 * Twitter part
 */
include 'extensions/Tweets.php';
include 'content/get_twitter.php';
include_once "templates/_partials/_tweets-post.php";


function add_admin_menu()
{
    add_menu_page('Page Tweeter',
        'page Tweeter',
        'manage_options',
        '/content/get_twitter', 'my_tweets');
}

add_action('admin_menu', 'add_admin_menu');
/*
 *  fin Twitter Part
 */

/*
 * ajout image à la une
 */
add_theme_support('post-thumbnails');

function la_date()
{
    $date = Date('d F Y');
    return date_i18n(get_option('date_format'), strtotime($date));

}

/*
* traduction
*/
add_action('after_setup_theme', 'pdw_theme_setup');

function pdw_theme_setup()
{
    load_theme_textdomain('wp-theme-base-translate', get_template_directory() . '/languages');
}

/*
 * Widget
 */
global $n;

include('content/widget.php');

add_action('widgets_init', 'wp_base_theme_widgets_init');

/*
 * Styles
 */
if (!function_exists('superlist_enqueue_styles')) {
    function superlist_enqueue_styles()
    {
        // Ajout du fichier main.css dans le head
        wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/assets/libraries/font-awesome/css/font-awesome.min.css');
        wp_enqueue_style('superlist', get_stylesheet_directory_uri() . '/assets/css/superlist.css');
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

    $menu = wp_get_nav_menu_object($name); // recupere le menu qui porte le nom $name
    $menu_items = wp_get_nav_menu_items($menu->term_id);

    $child = array();
    foreach ($menu_items as $item) {
        // menu_item_parent représente l'id de l'élément parent

    }
    include(locate_template('content/content-menu.php'));

}

include_once('content/getArticles.php');
include_once('content/slider.php');

//wp_reset_postdata();

