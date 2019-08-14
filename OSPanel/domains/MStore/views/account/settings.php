<?php include ROOT . '/views/layouts/header.php' ?>

<div class="container mt-lg-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6 col-xl-4">
            <div class="card border-0">
                <div class="card-body">
                    <h5 class="card-title text-center">Настройки</h5>
                    <?php if ($result): ?>
                    <div class="text-success"><i class="fas fa-check"></i> Сохранено!</div>
                    <?php elseif (isset($errors) && is_array($errors)) : ?>
                        <dl>
                            <?php foreach ($errors as $error) : ?>
                                <dd class="text-danger"><i class="fas fa-exclamation"></i> <?= $error ?></dd>
                            <?php endforeach ?>
                        </dl>
                    <?php endif ?>
                    <form action="" method="POST" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Введите email" value="<?= $user->email ?>" required>
                            <div class="valid-feedback">
                                Выглядит отлично!
                            </div>
                            <div class="invalid-feedback">
                                Пожалуйста, введите Email.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" name="name" class="form-control" aria-describedby="emailHelp" placeholder="Введите name" value="<?= $user->name ?>" required>
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
                        <button type="submit" name="submit" class="btn myB btn-warning btn-block">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php' ?>