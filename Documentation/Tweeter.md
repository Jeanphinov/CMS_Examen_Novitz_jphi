Twitter API
===========

Installer 
---------
J'ai d'abors installé twitter via Composer fans le répertoire extensions.

Classe Tweets
-------------

Dans ce même dossier j'ai créé une classe Tweets.php

Pour s'authentifier ave OAuth Twitter nécéssite d'avoir deux consumer_key et deux access token.  
Je les déclares dans ma class : 
 * Les Consumer_key sont des constantes parce que à priori ils sont lié à mon compte et ne devraient pas changer.
 * Les access_toker sont des variables et peuvent être régénérés dans l'interface admin de Tweeter.
 * je déclare également une variable pour la connection.  
   
le __contstuctor() fait qu'à l'instanciation de la classe je me connecte à l'API Twitter.  

Ma classe contient une méthode qui contient une function ``` php getUserTimeline($n = 5) ```  
qui se contente de récupérer la user_timeline et d'en retirer des info dont j'aurais besoin. (La timeline d'origine contient
 enormément d'info c'est pour cela que je fais une sélection)  

je récupere: date, photo_profil, background, screen_name, url et location.

Function.php
------------

je fais une include de ma classe Tweets.php, de ma page get_twitter et de la vue _tweets-post
```
include 'extensions/Tweets.php';
include 'src/get_twitter.php';
include_once "templates/_partials/_tweets-post.php";
```
  
Je crée le bouton Tweeter, en cliquant il déclenchera la fonction my_tweets dans la page  'src/get_twitter'
```
function add_admin_menu()
{
    add_menu_page('Page Tweeter',
        'page Tweeter',
        'manage_options',
        '/src/get_twitter', 'my_tweets');
}
```
  
* Instanciation de la classe
* recupere les 5 derniers tweets
    
```
`   $connecte = new Tweets(); // instanciation
    $infoTweeter = $connecte->getUserTimeline(5); // recupere la timeline
```

* récupère l'id de l'utilisateur
* crée un article 
* poste l'article
```
    global $user_ID;  // mon id utilisateur

    $article = array(); // article contiendra l'article à publier.
    $article['post_title'] = $infoTweeter['screen_name'] . ": derniers tweets";
    $article['post_content'] = format_post($infoTweeter);
    // envoie le tableau brut et recoit une 'vue' mise en forme

    $article['post_status'] = 'publish';

    $post_id = wp_insert_post($article, true);
    // insertion de l'article.
```

__ pour le content j'appelle le ficher [_tweets-post.php](../templates/_partials/_tweets-post.php):
* reçoit le tableaux contenant les tweets
* crée une vue en intégrant ces tweets à une mise en forme html
* renvoit le résultat

