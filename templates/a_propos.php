<?php
/**
 * Template Name: A propos
 *
 */
get_header();
/*
 * dynamic_sidebar est la description su site éditable par le client
 * text-bloc-1 est l'id du widget
 */
dynamic_sidebar( 'text-bloc-2' );



?>


<div class="main-inner">
    <div class="container">
        <div class="content">


            <div class="mt-80">
                <div class="page-header">
                    <h1>A propos </h1>
                    <?php
                    if (have_posts()): while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                    endif;
                    ?>

                </div><!-- /.page-header -->
            </div><!-- /mt-80 -->


        </div><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.main-inner -->

<?php

get_footer();
?>
