<?php include ROOT . '/views/layouts/header.php' ?>

<main role="main" class="flex-shrink-0">
    <!-- Игра -->
    <div class="container p-0 p-md-3">
        <div class="my-0 my-sm-3 bg-white shadow-sm">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-9 px-0 py-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-lg-5">
                                    <img class="img-fluid mx-auto d-block" src="/template/images/small/<?= $product->image ?>" alt="">
                                </div>
                                <div class="col-sm-12 col-lg-7 pt-sm-3">
                                    <h4 class="font-weight-bold"><?= $product->name ?></h4>
                                    <p><?= $product->description ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 bg-light p-2">
                        <div class="container h-100">
                            <div class="row h-100">
                                <div class="col-12 text-center">
                                    <h3 class="border border-warning p-1">
                                        <?php if ($product->sale) : ?>
                                            <span class="old-price font-weight-light m-0"><?= $product->old_price ?>&#x20bd;</span>
                                        <?php endif ?>
                                        <span class="font-weight-bold m-0"><?= $product->price ?>&#x20bd;</span>
                                    </h3>
                                    <?php if ($product->availability) : ?>
                                        <h4 class="text-success">В наличии</h4>
                                    <?php else : ?>
                                        <h4 class="text-danger">Нет в наличии</h4>
                                    <?php endif ?>
                                </div>
                                <div class="col-12 align-self-lg-end mb-2">
                                    <a href="#" class="myB btn btn-warning btn-block rounded-0">Купить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <!-- / Игра -->
    <!-- Популярные игры -->
    <div class="container-fluid p-0">
        <div class="p-2 bg-white">
            <h4 class="text-center">Покупайте так же</h4>
            <?php include ROOT . '/views/layouts/productCarusel.php' ?>
            <?php include ROOT . '/views/layouts/products.php' ?>
            <!-- / Популярные игры -->
        </div>
    </div>
</main>
<?php include ROOT . '/views/layouts/footer.php' ?>