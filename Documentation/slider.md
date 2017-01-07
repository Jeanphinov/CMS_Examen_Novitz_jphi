SLIDER
======

Le but est d'intégrer un slider bootstrap sur ma page d'accueil.

1. J'ai créé un template dédié à ma page index.  

2. j'ai installé l'extention [Advanced Custom Fields](https://www.advancedcustomfields.com/)

3. j'ai créé un groupe de champs, en fait quatre champs images qui correpondent aux 4 images de mon slider
Lors de j'ajout d'images, il y aura des champs tels alt, description ou title je me servirais de ces champs pour 
afficher des informations sur mon slider.

4. Sur la page edition de la page index les quatre champs images apparaissent, l'ajout est des images est classique 
comme on le ferait pour n'importe quel article wordpress. 

5. intégration dans mon template.  
Les slider est composé d'un grand div avec une class="carousel" qui indique qu'il s'agit d'un slider/carousel.  
A l'intérieur de ces balise il y d'autres balise qui contiennent les image, le titre etc. 
 
Dans sa version pure html les balises de chaque image se répeten, il y en a autant qu'il y a d'images (ca peut faire 
beaucoup de code répliqué).

Chaque photo élément a la classe "item", la photo active est celle qui a en plus la class "active".  

Ce que le jQuery fait c'est de passer chaque item en revue,  passant la classe active   

Je travaille en php je n'ai donc placé qu'un seul item dans mon slider avec des echo $variable pour chaque élément.  
J'ai ajouté une condition pour savoir si on l'element est le premier si oui je lui ajoute d'office la classe 'active' et
il sera le départ de mon slider.
```php
 <?php if ($key == 0): ?>
         <div class="item active">
         <?php else:  ?>
               <div class="item">
  <?php endif; ?>
```



Adaptation à Wordpress
-----------------------

J'ai utilisé la fonction wp [$post->ID;](https://codex.wordpress.org/Function_Reference/the_ID) pour obtenir l'id de
ma page.  
  
Utilisation de la fonction [get_fields](https://www.advancedcustomfields.com/resources/get_fields/)  
  
  ```php  
  array (size=4)
    'image_1' => 
      array (size=10)
        'id' => int 45
        'alt' => string 'image de petit chat' (length=19)
        'title' => string 'Mon image 1' (length=11)
        'caption' => string 'Image 1 pour le Slider' (length=22)
        'description' => string 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.' (length=109)
        'mime_type' => string 'image/jpeg' (length=10)
        'url' => string 'http://localhost/wordpress/wp_examen_jphi/wp-content/uploads/2016/12/450.jpg' (length=76)
        'width' => int 1140
        'height' => int 450
        'sizes' => 
          array (size=12)
            'thumbnail' => string 'http://localhost/wordpress/wp_examen_jphi/wp-content/uploads/2016/12/450-150x150.jpg' (length=84)
            'thumbnail-width' => int 150
            'thumbnail-height' => int 150
            'medium' => string 'http://localhost/wordpress/wp_examen_jphi/wp-content/uploads/2016/12/450-300x118.jpg' (length=84)
            'medium-width' => int 300
            'medium-height' => int 118
            'medium_large' => string 'http://localhost/wordpress/wp_examen_jphi/wp-content/uploads/2016/12/450-768x303.jpg' (length=84)
            'medium_large-width' => int 768
            'medium_large-height' => int 303
            'large' => string 'http://localhost/wordpress/wp_examen_jphi/wp-content/uploads/2016/12/450-1024x404.jpg' (length=85)
            'large-width' => int 1024
            'large-height' => int 404
  ```


la fonction get_fields fournit un tableaux avec chaque image et tous les champs disponibles tels que  
* url
* url en plusieures tailles
* title
* caption
* description
* ...

En choissant url, alt, caption, title et descriptiopn j'ai plus d'infos que nécéssaires pour competer mon slider.
je récupère mes élément dans une boucle foreach.  
J'ai décidé d'utiliser un tableau a deux dimensions, la première me servira à savoir si je suis à la première image.

```php
$i = 0;
foreach (get_fields($id) as $field):
    if ($field):

        $slider[$i]['url'] = $field['url'];
        $slider[$i]['alt'] = $field['alt'];
        $slider[$i]['caption'] = $field['caption'];
        $slider[$i]['title'] = $field['title'];
        $slider[$i]['description'] = $field['description'];
        $i++;
    endif;
endforeach;

```

Enfin j'ai placé mon template "accueil" 
* je crée le tableau slider via ```$slider = getImageForSlider();```
* j'appelle la vue /partials/_slider.php  




[Novitz Jean-Philippe](https://github.com/Jeanphinov) 
