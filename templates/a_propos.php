<?php
/**
 * Template Name: A propos
 *
 */
get_header();

?>
<div class="document-title">
    <h1> <?php _e('A propos', 'wp-theme-base-translate'); ?></h1>
    <ul class="breadcrumb">
</div>

<div class="main-inner">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-lg-2">
            </div>
            <div class="col-sm-6 col-lg-8">

                <div class="content">


                    <div class="mt-80">
                        <div class="page-header">

                            <?php
                            /*
                             * dynamic_sidebar est la description su site éditable par le client
                             * "a-propos" est l'id du widget
                             * C'est ici dans le theme que je met le style
                             */
                            dynamic_sidebar('a-propos');

                            ?>

                        </div><!-- /.page-header -->
                    </div><!-- /mt-80 -->


                </div><!-- /.content -->
                <div class="col-sm-3 col-lg-2">
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.main-inner -->

<?php

get_footer();
?>
