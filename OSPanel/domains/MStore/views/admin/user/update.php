<?php include ROOT . '/views/layouts/admin/header_admin.php' ?>

<div class="row">
    <?php if ($user) : ?>
        <div class="col-12 px-5 py-3">
            <form action="" method="POST" class="needs-validation" novalidate>
                <div class="form-group row">
                    <label for="email" class="col-1 col-form-label">Email</label>
                    <div class="col-4">
                        <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Введите email" value="<?= $user->email ?>" required>
                        <div class="valid-feedback">
                            Выглядит отлично!
                        </div>
                        <div class="invalid-feedback">
                            Пожалуйста, введите Email.
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-1 col-form-label">Имя</label>
                    <div class="col-4">
                        <input type="text" name="name" class="form-control" placeholder="Введите имя" value="<?= $user->name ?>" required>
                        <div class="valid-feedback">
                            Выглядит отлично!
                        </div>
                        <div class="invalid-feedback">
                            Пожалуйста, введите Ваше имя.
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-1 col-form-label">Пароль</label>
                    <div class="col-4">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль пользователя" data-toggle="tooltip" data-placement="right" title="Для сохранения настроек, пароль пользователя не нужен.">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="role" class="col-1 col-form-label">Роль</label>
                    <div class="col-2">
                        <select class="form-control" name="role">
                            <option value="1" <?php if ($user->role == 'user') echo 'selected="selected"' ?>>Пользователь</option>
                            <option value="0" <?php if ($user->role == 'admin') echo 'selected="selected"' ?>>Администратор</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="submit" class="myB btn btn-warning rounded-0">Сохранить</button>
            </form>
        </div>
    <?php else : ?>
        <h3 class="text-center w-100">Категория не найдена</h3>
    <?php endif ?>
</div>


<?php include ROOT . '/views/layouts/admin/footer_admin.php' ?>