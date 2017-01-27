<?php //get_the_post_thumbnail(get_the_ID(), 'thumbnail'); ?>

<div class="card-row">
    <div class="card-row-inner">
        <div class="card-row-image" data-background-image="<?php the_post_thumbnail_url('thumbnail') ?>"
             style="background-image: url('<?php if (the_post_thumbnail_url('thumbnail'))
             ?>')">
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
                <dt><?php the_time('j F, Y');
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