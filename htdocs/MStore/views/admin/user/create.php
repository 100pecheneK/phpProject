<?php include ROOT . '/views/layouts/admin/header_admin.php' ?>
<div class="row">
    <div class="col-12 px-5 py-3">
        <?php if (isset($errors) && is_array($errors)) : ?>
            <dl>
                <?php foreach ($errors as $error) : ?>
                    <dd class="text-danger"><i class="fas fa-exclamation"></i> <?= $error ?></dd>
                <?php endforeach ?>
            </dl>
        <?php endif ?>
        <form action="" method="POST" class="needs-validation" novalidate>
            <div class="form-group row">
                <label for="email" class="col-1 col-form-label">Email</label>
                <div class="col-4">
                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Введите email" required>
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
                    <input type="text" name="name" class="form-control" aria-describedby="emailHelp" placeholder="Введите имя" required>
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
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль" required>
                    <div class="valid-feedback">
                        Выглядит отлично!
                    </div>
                    <div class="invalid-feedback">
                        Пожалуйста, введите Ваш пароль.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="role" class="col-1 col-form-label">Роль</label>
                <div class="col-2">
                    <select class="form-control" name="role">
                        <option value="1" selected="selected">Пользователь</option>
                        <option value="0">Администратор</option>
                    </select>
                </div>
            </div>
            <button type="submit" name="submit" class="myB btn btn-warning rounded-0">Создать</button>
        </form>
    </div>


    <?php include ROOT . '/views/layouts/admin/footer_admin.php' ?>