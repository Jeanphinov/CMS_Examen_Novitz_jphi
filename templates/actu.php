<?php
/**
 * Template Name: Actu
 *
 */
get_header();


?>


<h2 class="page-title"> Notre Actualité </h2>


<?php

$actu = get_articles(5);

include('_partials/_liste-articles.php');

?>


<?php

get_footer();
?>
