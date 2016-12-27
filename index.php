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

$actu = get_articles();
include('templates/_partials/_liste-articles.php');

?>



<?php get_footer(); ?>