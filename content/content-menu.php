<ul class="<?php echo $class; ?>">  <!-- je récupere la classe fournie lors de l'appel de la methode get_menu -->

    <?php
    foreach ($menu_items as $item) :

    ?>
    <li><a href="<?php echo $item->url ?>">
            <?php echo $item->title; ?>
        </a>

        <?php
        endforeach;

        ?>
</ul>

<?php


?>