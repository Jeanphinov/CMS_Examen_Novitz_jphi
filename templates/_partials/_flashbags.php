<?php


/*
* partie qui montre les messages par rapport au formulaire
*/
if (isset($_GET['succes'])) {
    ?>
    <div class="alert alert-icon alert-success" role="alert">
        <?php echo $_GET['succes'] ?>
    </div>
<?php }
if (isset($_GET['erreur'])) {
    ?>
    <div class="alert alert-icon alert-danger" role="alert">
        <?php echo $_GET['erreur'] ?>
    </div>
<?php }
/*
 * fin message formulaire
 */