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

**notes**
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
