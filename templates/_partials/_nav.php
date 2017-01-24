<div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-1">
        <?php if ($offset > 0) { ?>
            <a href="<?php wp_get_referer() ?>?offset=<?php echo $offset - 5; ?>">
                <i style="font-size: 50px;" class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
        <?php } ?>
    </div>

    <div class="col-sm-2">
    </div>
    <div class="col-sm-1">
        <?php if ($offset < get_posts_count() + 5) { ?>
            <a href="<?php wp_get_referer() ?>?offset=<?php echo $offset + 5; ?>">
                <i style="font-size: 50px;" class="fa fa-arrow-right" aria-hidden="true"></i>
            </a>
        <?php } ?>
    </div>
</div>
<div class="col-sm-4">
</div>