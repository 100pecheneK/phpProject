<div class="container">
    <div class="row">
        <div class="col-12 mb-4">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php foreach ($caruselProducts as $i => $cP) : ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="<?php if ($i == 0) echo 'active' ?>"></li>
                    <?php endforeach ?>
                </ol>
                <div class="carousel-inner">
                    <?php foreach ($caruselProducts as $i => $cP) : ?>
                        <div class="carousel-item <?php if (($i + 1) == 1) echo 'active' ?>">
                            <a href="/product/<?= $cP['id'] ?>">
                                <img src="<?= Product::getBigImage($cP['id']) ?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-md-block justify-content-center text-warning">
                                    <span class="border border-warning p-1 text-center bg-dark-trans">

                                        <?php if ($cP['sale']) : ?>
                                            <span class="old-price font-weight-light m-0"><?= $cP['old_price'] ?> &#x20bd;</span>
                                        <?php endif ?>
                                        <span class="font-weight-bold m-0"><?= $cP['price'] ?> &#x20bd;</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>