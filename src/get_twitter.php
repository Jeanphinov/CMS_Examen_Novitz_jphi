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

    $article = array(); // article contiendra l'article à publier.
    $article['post_title'] = $infoTweeter['screen_name'] . ": derniers tweets";
    $article['post_content'] = format_post($infoTweeter);
    // envoie le tableau brut et recoit une 'vue' mise en forme

    $article['post_status'] = 'publish';

    if ($post_id = wp_insert_post($article, true))
        // insertion de l'article.
        echo '<i class="fa fa-check" style="font-size: 50px;" aria-hidden="true"></i>
<br />Article Publié !';
    else echo 'erreur';


}