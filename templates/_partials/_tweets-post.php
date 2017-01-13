<?php
/* Bloc/temptate pour la création d'un article
   Ce bloc reçoit un tableau de donnée qui contient les infos de twitter
   retourne une vue pour inserer proprement dans l'article */

function format_post($article)
{


    $content = "
        <h1>Derniers tweets</h1>
        <p> Loremp Lipsum tweets</p>
        <ul>";

    foreach ($article['tweets'] as $tweet):
        $content = $content . "<li> . $tweet .</li>";

    endforeach;
    $content = $content . "</ul>";

    return $content;
}

