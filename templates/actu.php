<?php
/**
 * Template Name: Actu
 *
 */
get_header();


?>

<div class="document-title">
    <h1> <?php _e('Notre Actualité', 'wp-theme-base-translate'); ?></h1>
    <ul class="breadcrumb">
</div>
<h2 class="page-title">  <?php _e('Cinq derniers articles', 'wp-theme-base-translate'); ?></h2>


<?php


$actu = get_articles(5);

include('_partials/_liste-articles.php');

?>


<?php

get_footer();
?>
