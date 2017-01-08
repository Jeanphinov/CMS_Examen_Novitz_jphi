<div style="background-color:#1DA1F2; color:#F5F8FA !important;">
    <h2 style="color:#F5F8FA">Twitter</h2>
    <div class="row">

        <div class="col-sm-12 col-md-4 col-lg-2">
            <p><img src="<?php echo $infoTweeter['photo_profil'] ?>"/></p>
            <p>
                <strong><?php echo $infoTweeter['screen_name'] ?></strong>
                <br/><?php echo $infoTweeter['location'] ?>
            </p>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-10">
            <h3>Cinq derniers tweets:</h3>
            <ul>
                <?php
                foreach ($infoTweeter['tweets'] as $t):
                    echo "<li>".$t."</li>";
                endforeach;
                ?>
            </ul>
        </div>

    </div>
</div>