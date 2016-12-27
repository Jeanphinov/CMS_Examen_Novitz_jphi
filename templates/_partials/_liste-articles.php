<div class="cards-row">
    <?php

    foreach ($actu as $article):
        if (empty($article['src'])) $article['src']=get_stylesheet_directory_uri()."/assets/img/tmp/product-1.jpg";
        ?>
        <div class="card-row">
            <div class="card-row-inner">
                <div class="card-row-image" data-background-image="<?php echo $article['src'] ?>"
                     style="background-image: url('<?php echo $article['src'] ?>');">
                    <div class="card-row-label">
                        <a href="listing-detail.html"></a>
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
                                echo $cat->name . " ";
                            endforeach; ?></dt>
                        <dd>Auteur</dd>
                        <dt><a href="mailto:<?php echo $article['email'] ?>">
                                <?php echo $article['auteur'] ?>
                            </a></dt>
                        <dd></dd>
                        <dt>
                    </dl>
                </div>

            </div> <!-- card  inner  -->

        </div> <!-- card row -->
    <?php endforeach; ?>

</div> <!-- cards-row -->