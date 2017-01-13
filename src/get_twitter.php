<?php

function hello()
{
    /* J'instancie ma classe Tweets
       Ma classe Tweets se connecte à Twitter
       Ma classe récupère les cinq derniers tweets
    */

    $connecte = new Tweets();
    $infoTweeter = $connecte->getUserTimeline();

    global $user_ID;
    $article = array();

    $article['post_title'] = $infoTweeter['screen_name'] . ": derniers tweets";
    $article['post_content'] = format_post($infoTweeter);
    $article['post_status'] = 'publish';

    $post_id = wp_insert_post($article, true);


}