<?php
/**
 * Template Name: Accueil Custom
 *
 */
get_header();
if (isset($_GET['succes'])) {
    ?>
    <div class="alert alert-icon alert-success" role="alert">
        <?php echo $_GET['succes'] ?>
    </div>
<?php }
if (isset($_GET['erreur'])) {
    ?>
    <div class="alert alert-icon alert-danger" role="alert">
        <?php echo $_GET['erreur'] ?>
    </div>
<?php }

$actu = get_articles(null, 5, $offset);
$slider = getImageForSlider(); ?>
    <div class="document-title">
        <h1> <?php _e('Accueil', 'wp-theme-base-translate'); ?></h1>
        <ul class="breadcrumb">
    </div>
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
include('_partials/_liste-articles.php');
include('_partials/_nav.php');
?>

<?php get_footer(); ?>