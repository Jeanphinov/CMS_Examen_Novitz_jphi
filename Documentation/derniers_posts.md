Récupérer les x derniers posts
------------------------------  

**methode query_posts**  
https://developer.wordpress.org/reference/functions/get_posts/ dans la doc
setup_postdata() -> aide à mettre en forme le résultat.
var_dump montra la longue liste des champs que contient l'article.  
J'appelle la fonction depuis la vue 
!! les articles récupéres ne sont pas dans un tableau mais dans un OBJET  !!  

**get_the_excerpt**  permet de récupérer un 'extrait' de l'article pour donner envie de cliquer pour lire.  
**get_the_category** recupere les categories de l'article.
**get_the_date** recupere la date, l'avantage c'est que la date est déjà formatée   
**get_the_author_meta**  utilisé pour récupérer le nom de l'auteur et son email  
  
Pour afficher mes derniers articles j'ai besoin d'afficher une vignette donc d'une __image à la une __ :
* ```<?php add_theme_support( 'post-thumbnails' ); ?>``` dans le function.php permet d'ajouter la possibilité de mettre 
une image à la une.
* Fichier getArticles.php.  Dans la boucle qui récupère les x derniers articles j'ai placé le bout de code 
 ```
 $temp=wp_get_attachment_image_src(get_post_thumbnail_id ($id ), 'medium');
 $actu[$id]['src']=  $temp[0];
 ```
 - _get Attachment image src()_  est une fonction wordpress permettant de ne récupérer que l'url 'src' de l'image à la une
 - je le récupère et le met dans la variable $temp
 - la fonction get_attachment retourne un tableau de trois éléments: url, largeur, hauteur
 - je récupère le premier [0] qui est url

J'ai placé la fonction getArticles dans un fichier externe pour plus de lisibilité.

J'utilise deux fois cette fonction sans devoir dupliquer du code: une fois dans accueil.php une fois dans actu.php
* avec deux lignes je récupère et affiche les x derniers articles où je veux.
* ``` $actu = get_articles(5); ``` recupère les derniers article si le nbre n'est pas précisé il récupère tout
* ``` include('_partials/_liste-articles.php'); ``` affiche les articles