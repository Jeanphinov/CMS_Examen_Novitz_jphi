<?php
/*
 * Template qui permet d'afficher un article ou un autre type de contenu
 */
setlocale(LC_TIME, 'fr');
get_header(); ?>

<?php while (have_posts()) :
    the_post();
    $image = get_the_post_thumbnail();

    ?>
    <div class="page-title">
        <h1><?php echo get_the_title(); ?></h1>
        <h2><?php echo get_field('sous_tire') ?></h2>
    </div>

    <div class="posts post-detail">
        <?php echo $image; ?>
        <div class="post-meta clearfix">
            <div class="post-content">
                <?php  echo get_the_content(); ?>
            </div>

        </div>
    </div>

    <?php
endwhile; ?>
<?php get_footer(); ?>
