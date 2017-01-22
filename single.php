<?php
/*
 * Template qui permet d'afficher un article ou un autre type de contenu
 */
setlocale(LC_TIME, 'fr');
get_header(); ?>

<?php while (have_posts()) :
    the_post();
    $image = get_field('cover');
    ?>

    <h1><?php the_post_thumbnail('large'); echo get_the_title(); ?> </h1>
    <h2><?php echo get_field('sous_titre') ?></h2>
    <?php  ?>

    <img src="<?php echo $image['sizes']['thumbnail']; ?>">
    <img src="<?php echo $image['sizes']['medium']; ?>">
    <img src="<?php echo $image['sizes']['medium-large']; ?>">
    <img src="<?php echo $image['sizes']['large']; ?>">
    <!-- <img src="<?php echo $image['url']; ?>"> -->
    <p class="lead">
        <?php
        echo get_the_content();
        ?>
    </p>

    <?php
endwhile; ?>
<?php get_footer(); ?>
