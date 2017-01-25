<?php
/**
 * Template Name: Accueil
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
// Je récupère les images pour mon slider
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
$query = new WP_Query();
query_posts($query);
?>


    <div c lass="cards-row">


        <?php if (have_posts()):
            while (have_posts()) :
                the_post();
                get_the_post_thumbnail(get_the_ID(), 'thumbnail'); ?>
                <div class="card-row">
                    <div class="card-row-inner">
                        <div class="card-row-image" data-background-image="<?php the_post_thumbnail_url(); ?>"
                             style="background-image: url('<?php if (the_post_thumbnail_url('thumbnail'))
                             ?>');">
                            <div class="card-row-label">
                                <a href="listing-detail.html"></a>
                            </div>
                        </div> <!--card  row image-->


                        <div class="card-row-body">
                            <h2 class="card-row-title">
                                <a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="card-row-content">
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        </div>
                        <div class="card-row-properties">
                            <dl>
                                <dd>Date</dd>
                                <dt><?php the_date();
                                    echo '<br />' ?></dt>
                                <dd>Categorie</dd>
                                <dt><?php foreach ((get_the_category()) as $cat) {
                                        echo $cat->cat_name . ' ';
                                    } ?></dt>
                                <dd>Auteur</dd>
                                <dt><a href=" <?php echo get_the_author_link(); ?>">
                                        <?php echo get_the_author(); ?>
                                    </a></dt>
                                <dd></dd>
                                <dt>
                            </dl>
                        </div>

                    </div> <!-- card  inner  -->

                </div> <!-- card row -->
                <?php
            endwhile;
        endif; ?>

    </div> <!-- cards-row -->
<?php echo get_next_posts_link('Go to next page'); ?>

<?php get_footer(); ?>