<?php
/**
 * Template Name: Contact
 *
 */
get_header();
?>


<div class="main-inner">
    <div class="container">
        <div class="content">


            <div class="mt-80">
                <div class="page-header">
                    <h1>Contactez-nous </h1>

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
