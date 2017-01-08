**examen de wordpress**
-----------------------

Novitz Jean-Philippe
Instsitut Saint-Laurent (Promotion Sociale), 2016

**Enoncé**  
Nom du thème CMS Examen Votre Nom  
- Nom du dossier cms-examen-nom  
- Pages demandées :  
+ Accueil composée des 5 derniers articles, une description du site et un carrousel  
+ Page Contactez nous avec formulaire de contact (suivre ma documentation)  
+ Page Notre actualités qui liste les articles avec pagination  
+ Page "A propos" composée du texte encodé par le client via le wysiwyg  
  
Bonus:  
  
- Filtre dans la liste des articles (filtrer par le nom via LIKE ou sur une catégorie ou ...)   
- Formulaire de contact via AJAX (j'expliquerai cela en classe)  
- Carrousel dynamique (gérable par le client grâce au ACF)  

**Notes**  
---------

Pour mettre mes fichiers de départ je me suis basé sutr decoboots, merci Philippe.
Je me suis aussi basé sur le codex Wordpress.  

Pour adapter mon header je me suis servis des fonction:
* wp_enqueue_style() pour les stylesheets  
* wp_register_script() et  wp_enqueue_script() pour le javascript  
* get_stylesheet_directory_uri() sert à connaître le répertoire courant de mon theme. une fonctionnalité utile
pour afficher mon logo:  
** j'ai remplacé `<img src="assets/img/logo.png" alt="Logo">` par  
** `<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png" alt="Logo">`  
et mon logo invisible est apparu.
  
Création du Menu  
----------------  

* Création des pages Accueil, Notre actualité, Contactez-nous et à propos dans le back office 
  'Main' est le nom du menu.  Important pour pouvoir le retrouver après.  
*  la fonction 'get_menu($name,$class = null)' va aller chercher, lors de son appel le menu qui porte le nom $name
  et qui sera afficher selon la classe $class.  class est mis à nul pour rendre ce parametre optionnel.   
* '$menu = wp_get_nav_menu_object($name);' va recherche le menu  
* '$menu_items = wp_get_nav_menu_items($menu->term_id);' va rechercher chaque élement du menu  
* je parcours le menu et les élements du menu, les replaces dans une structure html.  

Templates  
---------   

Je commence a donner un contenu aux pages, créant un dosseir templates et au autant de templates que nécéssaire.  
  
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
**get_the_attached_media**  je l'ai utilisé pour récupérer l'image  
**get_the_author_meta**  utilisé pour récupérer le nom de l'auteur et son email

J'ai placé la fonction getArticles dans un fichier externe pour plus de lisibilité.
  
  
[integration du slider](../blob/master/documentation/slider.md)



