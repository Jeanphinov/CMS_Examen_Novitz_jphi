<?php
/**
 * Template Name: Accueil
 *
 */
get_header();


// Je récupère les images pour mon slider
$slider = getImageForSlider(); ?>

    <div class="document-title">
        <h1> <?php _e('Accueil', 'wp-theme-base-translate'); ?></h1>
        <ul class="breadcrumb">
    </div>
<?php include('_partials/_flashbags.php') // affiche soit un message succes soit message erreurs ?>
    <div class="row detail-content">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <?php
            /* widget */
            dynamic_sidebar('edito');
            ?>

        </div>
    </div>
<?php
include('_partials/_slider.php');


$paged = (get_query_var('page')) ? get_query_var('page') : 1;
$original_query = $wp_query;
$wp_query = null;
$args = array('posts_per_page' => 5, 'paged' => $paged);
$wp_query = new WP_Query($args);
?>

    <div class="cards-row">


        <?php if (have_posts()):
            while (have_posts()) : the_post();

                include('_partials/_card-row.php');
                // ma vue est séparée pour etre réutilisée
            endwhile;
            include('_partials/_nav.php');
        endif; ?>

    </div> <!-- cards-row -->


<?php
wp_reset_postdata();
get_footer(); ?>