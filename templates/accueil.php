<?php
/**
 * Template Name: Accueil
 *
 */
get_header();

$actu = get_articles();
$slider = getImageForSlider();

include('_partials/_slider.php');
include('_partials/_liste-articles.php');


get_footer(); ?>