<?php
/**
 * Template Name: Contact
 *
 */
get_header();

?>
<div class="document-title">
    <h1><?php _e('Contactez-nous', 'wp-theme-base-translate'); ?></h1>
    <ul class="breadcrumb">
</div>

<div class="main-inner">
    <div class="container">
        <div class="content">

            <?php
            if (isset($_GET['erreur']))
            {
                ?>
                <div class="alert alert-icon alert-danger" role="alert">
                    <?php echo $_GET['erreur']?>
                </div>
            <?php }
            ?>
            <div class="mt-80">
                <div class="page-header">
                    <h2 class="page-title"> <?php _e('Formulaire de contact', 'wp-theme-base-translate'); ?></h2>
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-8">

                            <form action="" method="POST" class="form-horizontal">
                                <?php wp_nonce_field('contacter', 'form-jphi'); ?>
                                <div class="form-group">
                                    <label for="nom" class="col-sm-2 control-label">Nom</label>
                                    <div class="col-sm-10">
                                        <input id="nom" name="nom" class="form-control" placeholder="Indiquez votre nom"
                                               type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input id="email" name="email" class="form-control" placeholder="votre adresse email"
                                               type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message"  class="col-sm-2 control-label">Message</label>
                                    <div class="col-sm-10">
                                        <textarea id="message" name="message" class="form-control" rows="5" placeholder="Votre Message"></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit"  id="submit"  name="contact">
                                    <i class="fa fa-envelope"></i>
                                    Envoyer
                                </button>
                            </form>
                            <?php /*
                            if (have_posts()): while (have_posts()) : the_post();
                                the_content();
                            endwhile;
                            endif;*/
                            ?>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                </div><!-- /.page-header -->
            </div><!-- /mt-80 -->


        </div><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.main-inner -->

<?php

get_footer();
?>
