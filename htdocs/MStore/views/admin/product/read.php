<?php include ROOT . '/views/layouts/admin/header_admin.php' ?>




    <div class="row">
        <?php if ($products) : ?>
            <div class="col-12">
                <h3 class="text-center text-muted"><?= Sort::getSortStatus($order, $sort) ?></h3>
            </div>
            <div class="col-12 table-responsive">
                <table class="table table-hover table-bordered table-sm mb-0">
                    <thead>
                        <tr>
                            <th scope="col">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="/admin/product/id/ASC" class="text-decoration-none text-dark">id</a></div>
                                    <div class="col-12">
                                        <a href="/admin/product/id/ASC" class="text-dark"><i class="fas fa-sort-amount-down-alt"></i></a>
                                        <a href="/admin/product/id/DESC" class="text-dark"><i class="fas fa-sort-amount-down"></i></a>
                                    </div>
                                </div>
                            </th>
                            <th scope="col">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="/admin/product/code/ASC" class="text-decoration-none text-dark">Код </a></div>
                                    <div class="col-12">
                                        <a href="/admin/product/code/ASC" class="text-dark"><i class="fas fa-sort-amount-down-alt"></i></a>
                                        <a href="/admin/product/code/DESC" class="text-dark"><i class="fas fa-sort-amount-down"></i></a>
                                    </div>
                                </div>
                            </th>
                            <th scope="col">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="/admin/product/name/ASC" class="text-decoration-none text-dark">Название </a></div>
                                    <div class="col-12">
                                        <a href="/admin/product/name/ASC" class="text-dark"><i class="fas fa-sort-amount-down-alt"></i></a>
                                        <a href="/admin/product/name/DESC" class="text-dark"><i class="fas fa-sort-amount-down"></i></a>
                                    </div>
                                </div>
                            </th>
                            <th scope="col">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="/admin/product/price/ASC" class="text-decoration-none text-dark">Цена &#x20bd; </a></div>
                                    <div class="col-12">
                                        <a href="/admin/product/price/ASC" class="text-dark"><i class="fas fa-sort-amount-down-alt"></i></a>
                                        <a href="/admin/product/price/DESC" class="text-dark"><i class="fas fa-sort-amount-down"></i></a>
                                    </div>
                                </div>
                            </th>
                            <th scope="col">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="/admin/product/availability/ASC" class="text-decoration-none text-dark">Наличие </a></div>
                                    <div class="col-12">
                                        <a href="/admin/product/availability/ASC" class="text-dark"><i class="fas fa-sort-amount-down-alt"></i></a>
                                        <a href="/admin/product/availability/DESC" class="text-dark"><i class="fas fa-sort-amount-down"></i></a>
                                    </div>
                                </div>
                            </th>
                            <th scope="col">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="/admin/product/is_new/ASC" class="text-decoration-none text-dark">Новинка </a></div>
                                    <div class="col-12">
                                        <a href="/admin/product/is_new/ASC" class="text-dark"><i class="fas fa-sort-amount-down-alt"></i></a>
                                        <a href="/admin/product/is_new/DESC" class="text-dark"><i class="fas fa-sort-amount-down"></i></a>
                                    </div>
                                </div>
                            </th>
                            <th scope="col">

                                <div class="row">
                                    <div class="col-12">
                                        <a href="/admin/product/is_recommended/ASC" class="text-decoration-none text-dark">Рекомендуемый </a></div>
                                    <div class="col-12">
                                        <a href="/admin/product/is_recommended/ASC" class="text-dark"><i class="fas fa-sort-amount-down-alt"></i></a>
                                        <a href="/admin/product/is_recommended/DESC" class="text-dark"><i class="fas fa-sort-amount-down"></i></a>
                                    </div>
                                </div>
                            </th>
                            <th scope="col">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="/admin/product/status/ASC" class="text-decoration-none text-dark">Отображение </a></div>
                                    <div class="col-12">
                                        <a href="/admin/product/status/ASC" class="text-dark"><i class="fas fa-sort-amount-down-alt"></i></a>
                                        <a href="/admin/product/status/DESC" class="text-dark"><i class="fas fa-sort-amount-down"></i></a>
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="align-top">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <th scope="row"><?= $product['id'] ?></th>
                                <td><?= $product['code'] ?></td>
                                <td><?= $product['name'] ?></td>
                                <td><?= $product['price'] ?></td>
                                <td><?php if ($product['availability']) echo 'Да';
                                    else echo 'Нет' ?></td>
                                <td><?php if ($product['is_new']) echo 'Да';
                                    else echo 'Нет' ?></td>
                                <td><?php if ($product['is_recommended']) echo 'Да';
                                    else echo 'Нет' ?></td>
                                <td><?php if ($product['status']) echo 'Виден';
                                    else echo 'Скрыт' ?></td>
                                <td>
                                    <div class="row justify-content-between">
                                        <div class="col text-center p-0">
                                            <a href="/admin/product/update/<?= $product['id'] ?>" class="text-decoration-none settings_icon">
                                                <h3 class="my-line"><i class="fas fa-cog text-dark"></i></h3>
                                            </a>
                                        </div>
                                        <div class="col text-center p-0">
                                            <a href="/admin/product/delete/<?= $product['id'] ?>" class="text-decoration-none delete_icon">
                                                <h3 class="my-line"><i class="fas fa-trash-alt text-dark"></i></h3>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <h3 class="text-center w-100">Товаров нет</h3>
        <?php endif ?>
    </div>




<?php include ROOT . '/views/layouts/admin/footer_admin.php' ?>