<?php include ROOT . '/views/layouts/admin/header_admin.php' ?>
<div class="row">
    <?php if ($categories) : ?>
        <div class="col-12">
            <h3 class="text-center text-muted">Покачтоничего</h3>
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
                    <?php foreach ($categories as $category) : ?>
                        <tr>
                            <th scope="row"><?= $category['id'] ?></th>
                            <td><?= $category['name'] ?></td>
                            <td><?php if ($category['status']) echo 'Видна';
                                else echo 'Скрыта' ?></td>
                            <td>
                                <div class="row justify-content-between">
                                    <div class="col text-center p-0">
                                        <a href="/admin/category/update/<?= $category['id'] ?>" class="text-decoration-none settings_icon">
                                            <h3 class="my-line"><i class="fas fa-cog text-dark"></i></h3>
                                        </a>
                                    </div>
                                    <div class="col text-center p-0">
                                        <a href="/admin/category/delete/<?= $category['id'] ?>" class="text-decoration-none delete_icon">
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
        <h3 class="text-center w-100">Категорий нет</h3>
    <?php endif ?>
</div>




<?php include ROOT . '/views/layouts/admin/footer_admin.php' ?>