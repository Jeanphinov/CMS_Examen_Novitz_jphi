<?php
/**
 * Template Name: Actu
 *
 */
get_header();
?>


<div class="main-inner"> <!-- cette partie revient à chaque fois -> la déplacer vers les header et footer -->
    <div class="container">
        <div class="content">
            <h2 class="page-title"> Notre Actualité </h2>


            <div class="cards-row">
                <?php
                $actu = get_articles(5);

                foreach ($actu as $article):
                    ?>
                    <div class="card-row">
                        <div class="card-row-inner">
                            <div class="card-row-image" data-background-image="assets/img/tmp/product-1.jpg"
                                 style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/tmp/product-1.jpg');">
                                <div class="card-row-label">
                                    <a href="listing-detail.html">Shop</a>
                                </div>
                            </div> <!-- card  row image  -->
                            <div class="card-row-body">
                                <h2 class="card-row-title">
                                    <a href="<?php echo $article['url'] ?>"><?php echo $article['titre'] ?></a>
                                </h2>
                                <div class="card-row-content">
                                    <p><?php echo $article['extrait'] ?></p>
                                </div>
                            </div>
                            <div class="card-row-properties">
                                <dl>
                                    <dd>Date</dd>
                                    <dt><?php echo $article['date'] ?></dt>
                                    <dd>Categorie</dd>
                                    <dt><?php foreach ($article['categories'] as $cat):
                                            echo $cat->name." ";
                                        endforeach; ?></dt>
                                    <dd>Location</dd>
                                    <dt>New York / Village</dt>
                                    <dd>Rating</dd>
                                    <dt>
                                </dl>
                            </div>

                        </div> <!-- card  inner  -->

                    </div> <!-- card row -->
                <?php endforeach; ?>

            </div> <!-- cards-row -->
        </div><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.main-inner -->

<?php

get_footer();
?>
