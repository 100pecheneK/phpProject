<?php include ROOT . '/views/layouts/header.php' ?>



<div class="container p-0 p-md-3">
    <div class="my-0 my-sm-3 bg-white shadow-sm">

        <div class="row">
            <?php if ($productsInCart) : ?>
            <div class="col-12 pt-3 mt-0 table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr class="bg-warning">
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Стоимость</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $key => $product) : ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td>

                                <?= $product['name'] ?>
                            </td>
                            <td><?= $productsInCart[$product['id']] ?></td>
                            <td>
                                <div class="row justify-content-between">
                                    <div class="col"><?= $product['price'] * $productsInCart[$product['id']] ?> &#x20bd;
                                    </div>
                                    <div class="col text-center">
                                        <a href="/cart/del/<?= $product['id'] ?>" class="delete_icon text-dark">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="col-12 mb-3">
                <a href="#" class="myB btn btn-block btn-warning rounded-0">К оплате: <span class="font-weight-bold"><?= $totalPrice ?> &#x20bd;</span></a>
            </div>
            <?php else : ?>
            <h3 class="text-center w-100">У вас нет товаров в корзине</h3>
            <?php endif ?>
        </div>
    </div>

</div>

<?php include ROOT . '/views/layouts/footer.php' ?>