<?php

/**
 *  function my_tweets
 *  Instancie un nouvel Objet Tweets qui se connecte à l'api de Twitter
 *  Cette fonction charge ensuite la userTimeline qui représente les cinq derniers posts.
 *  my_tweets crée un article et le publie
 */
function my_tweets()
{

    $connecte = new Tweets(); // instanciation
    $infoTweeter = $connecte->getUserTimeline(5); // recupere la timeline

    global $user_ID;  // mon id utilisateur

    $cat_id = wp_create_category('Tweets');

    $article = array(); // article contiendra l'article à publier.
    $article['post_title'] = $infoTweeter['screen_name'] . ": derniers tweets";
    $article['post_content'] = format_post($infoTweeter);
    // envoie le tableau brut et recoit une 'vue' mise en forme

    $article['post_status'] = 'publish';
    $article['post_category'] = [$cat_id];

    if ($post_id = wp_insert_post($article, true)) {
        // insertion de l'article.
        /*
        * insertion du logo twitter-logo.jpg comme image à la une
        */
        $filename = '/2017/01/twitter-logo.jpg';
        $filetype = wp_check_filetype(basename($filename), null);
        $wp_upload_dir = wp_upload_dir();

        $attachment = array(
            'guid' => $wp_upload_dir['url'] . '/' . basename($filename),
            'post_mime_type' => $filetype['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
            'post_content' => '',
            'post_status' => 'inherit'
        );

        $attach_id = wp_insert_attachment($attachment, $filename, $post_id);
        $res = set_post_thumbnail($post_id, $attach_id);

        /*
         * fin  ajoutt image à la une
         */

        echo '<i class="fa fa-check" style="font-size: 50px;" aria-hidden="true"></i>
<br />Article Publié !';
    } else echo 'erreur';


}