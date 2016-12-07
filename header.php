<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>
<?php
$login_class = '';
if (is_user_logged_in()) {
    $login_class = 'logged_margin';
}
?>
<body <?php body_class(); ?>>
<?php


?>
<div class="page-wrapper">

    <header class="header">
        <div class="header-wrapper">
            <div class="container">
                <div class="header-inner">
                    <div class="header-logo">
                        <a href="index.html">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png" alt="Logo">
                            <span>Theme by Jphi</span>
                        </a>
                    </div><!-- /.header-logo -->

                    <div class="header-content">
                        <div class="header-bottom">
                            <div class="header-action">
                                <a href="listing-submit.html" class="header-action-inner" title="Add Listing"
                                   data-toggle="tooltip" data-placement="bottom">
                                    <i class="fa fa-plus"></i>
                                </a><!-- /.header-action-inner -->
                            </div><!-- /.header-action -->
                            <!--
                            * menu statique pour installer la base du theme
                            * j'ai mis items-1 items-2 etc pour avoir des points de repere
                            * etape suivante : dynamiser
                            -->
                            <ul class="header-nav-primary nav nav-pills collapse navbar-collapse">
                                <li class="active">
                                    <a href="#">Menu-item 1 <i class="fa fa-chevron-down"></i></a>

                                    <ul class="sub-menu">
                                        <li><a href="index-video.html">Sous-menu</a></li>

                                    </ul>
                                </li>

                                <li>
                                    <a href="#">Menu-item 2 <i class="fa fa-chevron-down"></i></a>

                                    <ul class="sub-menu">
                                        <li><a href="listing-detail.html">Sous-menu</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#">Menu-item 3<i class="fa fa-chevron-down"></i></a>

                                    <ul class="sub-menu">
                                        <li><a href="listing-detail.html">Sous-menu</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#">Contact <i class="fa fa-chevron-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="contact-1.html">Contact v1</a></li>

                                    </ul>
                                </li>
                            </ul>

                            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse"
                                    data-target=".header-nav-primary">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div><!-- /.header-bottom -->
                    </div><!-- /.header-content -->
                </div><!-- /.header-inner -->
            </div><!-- /.container -->
        </div><!-- /.header-wrapper -->
    </header><!-- /.header -->