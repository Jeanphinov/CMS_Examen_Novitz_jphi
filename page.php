<?php

get_header(); ?>

<?php while (have_posts()) :
    the_post();

                echo get_the_content();
                ?>

    <?php
endwhile; ?>
<?php get_footer(); ?>