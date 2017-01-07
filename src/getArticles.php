<?php

/**
 * @param $n
 * @return array
 *
 * Methode get_article
 * Cette fonction va rechercher les n derniers article paru, les classes par ordre antéchronologique (du plus récent au plus ancien)
 * Construction d'un Array qui sera renvoyé, c'est une façon de contrôler ce qui est disponible dans la vue.
 *
 * C'est içi qu'il faut faire les changements
 * $n représente le nombre d'articles à récupérer, sa valeur est à null par défaut: si j'appelle la fonction sans préciser
 * get_articles recupere toutI
 */

function get_articles($n=null)
{
    $args = ['numberposts' => $n, 'order' => 'DESC', 'orderby' => 'date'];  // configure les options de ce que je veux récupérer
    $articles_liste = get_posts($args); // je récupere les articles
    $actu = array();

    foreach ($articles_liste as $article) :
        setup_postdata($article);

        /**
         * je rempli mon tableau $actu avec les infos nécéssaires
         */
        $id = $article->ID;

        foreach (get_attached_media('image', $id) as $item):
            $actu[$id]['src'] = $item->guid;
        endforeach;

        $actu[$id]['titre'] = $article->post_title;
        //$actu[$id]['date'] = $article->post_date; fonctionne mais me fournit une date non formatée
        $actu[$id]['date'] = get_the_date('', $article);
        $actu[$id]['maj'] = $article->post_update;
        $actu[$id]['url'] = get_permalink($article);
        $actu[$id]['extrait'] = get_the_excerpt($article);
        $actu[$id]['categories'] = get_the_category($article);
        $actu[$id]['auteur'] = get_the_author_meta('display_name');
        $actu[$id]['email'] = get_the_author_meta('user_email');


    endforeach;
    return $actu;


}
