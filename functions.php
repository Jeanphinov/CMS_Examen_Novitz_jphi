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
/*function new_excerpt_length($length) {
    return 10;
}
add_filter('excerpt_length', 'new_excerpt_length');*/

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

function get_articles($n)
{
    $args = ['numberposts' => $n, 'order' => 'DESC', 'orderby' => 'date'];  // configure les options de ce que je veux récupérer
    $articles_liste = get_posts($args); // je récupere les articles
    $actu = array();

    foreach ($articles_liste as $article) :
        setup_postdata($article);
        // var_dump($article);
        /**
         * je rempli mon tableau $actu avec les infos nécéssaires
         */
        $id = $article->ID;

        $actu[$id]['titre'] = $article->post_title;
        $actu[$id]['date'] = $article->post_date;
        $actu[$id]['maj'] = $article->post_update;
        $actu[$id]['url'] =  get_permalink($article);
        //$actu[$id]['contenu'] = $contenu;
        $actu[$id]['extrait'] =  get_the_excerpt($article);
        $actu[$id]['categories'] = get_the_category($article);
        // var_dump($actu);

    endforeach;
    return $actu;


}

wp_reset_postdata();

