<?php
/**
 * Template Name: A propos
 *
 */
get_header();
$connecte = new Tweets();
$infoTweeter = $connecte->getUserTimeline();


?>


<div class="main-inner">
    <div class="container">
        <div class="content">
           <?php include_once ('_partials/_tweets.php')?>


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
