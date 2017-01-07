<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 *  Cette page recupere tous les articles (je n'ai fourni le nombre) et appele le template pour affichage.
 */
get_header();

$id = get_the_ID(); // j'ai récupéré l'id de l'article
global $post;
var_dump($post->ID);

$slider=getImageForSlider($id);

?>


<?php
$actu = get_articles();
include('templates/_partials/_slider.php');
include('templates/_partials/_liste-articles.php');


/*

 'id' => int 45
      'alt' => string 'image de petit chat' (length=19)
      'title' => string 'Mon image 1' (length=11)
      'caption' => string 'Image 1 pour le Slider' (length=22)
      'description' => string 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.' (length=109)
      'mime_type' => string 'image/jpeg' (length=10)
      'url' => string 'http://localhost/wordpress/wp_examen_jphi/wp-content/uploads/2016/12/450.jpg'
*/
?>


<?php get_footer(); ?>