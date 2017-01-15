<?php
/* Bloc/temptate pour la création d'un article
   Ce bloc reçoit un tableau de donnée qui contient les infos de twitter
   retourne une vue pour inserer proprement dans l'article */

function format_post($article)
{
$madate=la_date();

    $content = "
    <div class='mt-80'>
    <div class='page-header'>
        <h1>Derniers tweets</h1>
        <p> Un petit aperçu de mes derniers tweets en date du ".$madate."</p>
    </div><!-- /.page-header -->

    <div class='row'>";

    foreach ($article['tweets'] as $tweet):
        $content = $content . " <div class='col-sm-6'>
                <div class='testimonial'>
                    <div class='testimonial-image'>
                        <img src='".$article['photo_profil']."' alt=''>
                    </div><!-- /.testimonial-image -->

                    <div class='testimonial-inner'>
                        <div class='testimonial-title'>
                            <h2></h2>" . $tweet . "
 </div><!-- /.testimonial-title -->


                        <div class='testimonial-sign'>" . $article['screen_name'] . "</div><!-- /.testimonial-sign -->
                    </div><!-- /.testimonial-inner -->
                </div><!-- /.testimonial -->


            </div><!-- /.col-* -->";

    endforeach;
    $content = $content . "</div> <!-- /.row -->
    </div> <!-- /.mt 80 -->";

    return $content;
}

