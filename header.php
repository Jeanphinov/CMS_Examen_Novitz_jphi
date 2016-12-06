<?php
/**
 * Header
 *
 * @package WordPress
 * @subpackage DecobootsTheme
 * @since Decoboots Theme 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>
<?php
$login_class = '';
if ( is_user_logged_in() ) {
    $login_class = 'logged_margin';
}
?>
<body <?php body_class(); ?>>
<nav class="navbar navbar-fixed-top navbar-inverse <?php echo $login_class ?>">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <?php
            //menu
            ?>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->