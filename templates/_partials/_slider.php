<?php

?>

<div class="mb80">
    <div class="hero-slider">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner" role="listbox">
                <?php foreach ($slider as $key => $item): ?>

                <?php if ($key == 0): ?>
                <div class="item active">
                    <?php else:  ?>
                    <div class="item">
                        <?php endif; ?>
                        <div class="item-bg"
                             style="background-image: url('<?php echo $item['url'] ?>')"></div>
                        <img src="<?php echo $item['url'] ?>" alt="image.nom">

                        <div class="carousel-caption">
                            <div class="hero-slider-content">
                                <h1><?php echo $item['title'] ?></h1>
                                <p><?php echo $item['description'] ?></p>

                            </div><!-- /.hero-slider-content -->

                            <div class="hero-slider-actions">
                                <a href="#"><i class="fa fa-heart-o"></i></a>
                                <a href="listing-detail.html"><i class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-bookmark-o"></i></a>
                            </div><!-- /.hero-slider-actions -->
                        </div><!-- /.carousel-caption -->
                    </div><!-- /.item -->

                    <?php endforeach; ?>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <i class="fa fa-long-arrow-left"></i>
                </a>

                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <i class="fa fa-long-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>