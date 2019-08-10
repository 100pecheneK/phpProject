<?php include ROOT . '/views/layouts/header.php' ?>

<div class="container mt-lg-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Регистрация</h5>
                    <?php if (isset($errors) && is_array($errors)) : ?>
                        <dl>
                            <?php foreach ($errors as $error) : ?>
                                <dd class="text-danger"><i class="fas fa-exclamation"></i> <?= $error ?></dd>
                            <?php endforeach ?>
                        </dl>
                    <?php endif ?>
                    <form action="" method="POST" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Введите email" value="<?= $email ?>" required>
                            <div class="valid-feedback">
                                Выглядит отлично!
                            </div>
                            <div class="invalid-feedback">
                                Пожалуйста, введите Email.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" name="name" class="form-control" aria-describedby="emailHelp" placeholder="Введите имя" value="<?= $name ?>" required>
                            <div class="valid-feedback">
                                Выглядит отлично!
                            </div>
                            <div class="invalid-feedback">
                                Пожалуйста, введите Ваше имя.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль" required>
                            <div class="valid-feedback">
                                Выглядит отлично!
                            </div>
                            <div class="invalid-feedback">
                                Пожалуйста, введите Ваш пароль.
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-warning btn-block">Зарегистрироваться</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php' ?>