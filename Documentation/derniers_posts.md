Récupérer les x derniers posts
------------------------------  

sur page d'accueil
------------------
```
$paged = (get_query_var('page')) ? get_query_var('page') : 1;
$original_query = $wp_query;
$wp_query = null;
$args = array('posts_per_page' => 5, 'paged' => $paged);
$wp_query = new WP_Query($args);
```

Récupèrec la les posts en utlisant la $wp_query, petit hack pour ne pas avoirs de problèmes avec la pagination.
  
```
$args = array('posts_per_page' => 5, 'paged' => $paged);
$wp_query = new WP_Query($args);
```
Fixe la limite à cinq pages à récupérer  à la fois.
$paged est utile pour la pagination.

Dans ma booucle while ```while (have_posts()) : the_post();```
J'intègre deux élément extérieurs.  
  
```include('_partials/_card-row.php'); ``` qui est la mise en forme en 'card' de chaque élément du résultat  
 ```` include('_partials/_nav.php'); ``` qui est la navigation.  
    
Actu : récupérer seulement les cinq derniers articles
-----------------------------------------------------  
  
 J'ai adapté la page accueil en modifiant:  
 ```
 $args = ['posts_per_page' => 5,
         'no_found_rows' => true];
 $wp_query = new WP_Query($args);
 ```
   
 Ce changement est nécéssaire.  WP récupère cinq posts par page mais 'no_found_rows' à true
 fait qu'il arrête de chercher.  Je n'affiche que cinq post et mon résultat ne compte que cinq posts.