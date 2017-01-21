<?php
/**
 * Template Name: Accueil
 *
 */
get_header();
if (isset($_GET['succes']))
{
    ?>
    <div class="alert alert-icon alert-success" role="alert">
        <?php echo $_GET['succes']?>
    </div>
<?php }
            if (isset($_GET['erreur']))
            {
                ?>
                <div class="alert alert-icon alert-danger" role="alert">
                    <?php echo $_GET['erreur']?>
                </div>
            <?php }

$actu = get_articles();
$slider = getImageForSlider();
dynamic_sidebar( 'text-bloc-1' );
include('_partials/_slider.php');
include('_partials/_liste-articles.php');


get_footer(); ?>