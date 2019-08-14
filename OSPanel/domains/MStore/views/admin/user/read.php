<?php include ROOT . '/views/layouts/admin/header_admin.php' ?>
<div class="row">
    <?php if ($users) : ?>
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
                                    <a href="/admin/user/id/ASC" class="text-decoration-none text-dark">id</a></div>
                                <div class="col-12">
                                    <a href="/admin/user/id/ASC" class="text-dark"><i class="fas fa-sort-amount-down-alt"></i></a>
                                    <a href="/admin/user/id/DESC" class="text-dark"><i class="fas fa-sort-amount-down"></i></a>
                                </div>
                            </div>
                        </th>
                        <th scope="col">
                            <div class="row">
                                <div class="col-12">
                                    <a href="/admin/user/name/ASC" class="text-decoration-none text-dark">Имя </a></div>
                                <div class="col-12">
                                    <a href="/admin/user/name/ASC" class="text-dark"><i class="fas fa-sort-amount-down-alt"></i></a>
                                    <a href="/admin/user/name/DESC" class="text-dark"><i class="fas fa-sort-amount-down"></i></a>
                                </div>
                            </div>
                        </th>
                        <th scope="col">
                            <div class="row">
                                <div class="col-12">
                                    <a href="/admin/user/email/ASC" class="text-decoration-none text-dark">Email </a></div>
                                <div class="col-12">
                                    <a href="/admin/user/email/ASC" class="text-dark"><i class="fas fa-sort-amount-down-alt"></i></a>
                                    <a href="/admin/user/email/DESC" class="text-dark"><i class="fas fa-sort-amount-down"></i></a>
                                </div>
                            </div>
                        </th>
                        <th scope="col">
                            <div class="row">
                                <div class="col-12">
                                    <a href="/admin/user/role/ASC" class="text-decoration-none text-dark">Роль </a></div>
                                <div class="col-12">
                                    <a href="/admin/user/role/ASC" class="text-dark"><i class="fas fa-sort-amount-down-alt"></i></a>
                                    <a href="/admin/user/role/DESC" class="text-dark"><i class="fas fa-sort-amount-down"></i></a>
                                </div>
                            </div>
                        </th>
                        <th scope="col" class="align-top">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <th scope="row"><?= $user['id'] ?></th>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?php User::getUserRole($user['role']) ?></td>
                            <td>
                                <div class="row justify-content-between">
                                    <div class="col text-center p-0">
                                        <a href="/admin/user/update/<?= $user['id'] ?>" class="text-decoration-none settings_icon">
                                            <h3 class="my-line"><i class="fas fa-cog text-dark"></i></h3>
                                        </a>
                                    </div>
                                    <div class="col text-center p-0">
                                        <a href="/admin/user/delete/<?= $user['id'] ?>" class="text-decoration-none delete_icon">
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