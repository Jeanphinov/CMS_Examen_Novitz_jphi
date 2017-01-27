<?php

/**
 * Widget
 * crée les widget personnalisé
 * reste à les inclure dans les templates
 *
 */

function wp_base_theme_widgets_init()
{
    $titres = ["edito", "A-propos", "texte-personnalisable_1", "texte-personnalisable_2"];
    for ($i = 0; $i <= 3; $i++) {

        register_sidebar(array(
            'name' => __($titres[$i], 'wp-theme-base-translate'),
            'id' => $titres[$i],
            'description' => __('Ajout d\'un bloc texte ou autre sur le site', 'wp-theme-base-translate'),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' =>  '<div class="page-title"> <h3>',
            'after_title' => '</h3></div> ',
        ));
    }
}