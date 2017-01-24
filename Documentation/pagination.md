pagination
==========

Recupérer les le offset et ne nombre d'articles
-----------------------------------------------

j'ai ajouté une fonction 
```
function get_posts_count() {
    global $wp_query;
    return $wp_query->post_count;
}
```  
  
 
qui utilise la wp_query pour compter le nombre total d'articles  
  
    
En arrivant sur la page je teste si j'ai un offset  

```
if (isset($_GET['offset'])) {
    if ($_GET['offset'] < 0) $offset = $_GET['offset'];
    else $offset = $_GET['offset'];
}
```

* s'il est négatif il est egal à zero
  
__ le parametre dans le ``` actu = get_articles(null, 5, $offset);``` sert simplement à passer
 les variable à la fonction qui récupère les x posts.
 
 null et 5 sont les parametres par défaut je ne les modifie pas