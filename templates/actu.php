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


$original_query = $wp_query;
$wp_query = null;
$args = ['posts_per_page' => 5,
        'no_found_rows' => true];
$wp_query = new WP_Query($args);
?>

<div class="cards-row">


    <?php if (have_posts()):
        while (have_posts()) : the_post();

            include('_partials/_card-row.php');
            // ma vue est séparée pour etre réutilisée
        endwhile;
    endif; ?>

</div> <!-- cards-row -->


<?php
wp_reset_postdata();
get_footer(); ?>
