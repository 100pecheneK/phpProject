<?php
require "../includes/config.php";
?>
<?php
$user = mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = " . (int)$_GET['id']);
$user = mysqli_fetch_assoc($user);
$redirect = $_SESSION['logged_user']['id'];
$data = $_POST;
if (isset($data['do_save_login'])) {
    mysqli_query($connection, "UPDATE `users` SET `login`= '" . $data['login'] . "' WHERE `id` = " . (int)$user['id']);
    header("Location: user_profile.php?id=$redirect");
}
if (isset($data['do_save_password'])) {
    $error = "";
    if (password_verify($data['password_old'], $user['password'])) {
        $password = password_hash($data['password_new'], PASSWORD_DEFAULT);
        mysqli_query($connection, "UPDATE `users` SET `password`= '" . $password . "' WHERE `id` = " . (int)$user['id']);
        $error = 'NOT';
    } else {
        $error = 'Старый пароль введён неверно!';
    }
}
if (isset($data['do_save_email'])) {
    $error_email = '';
    if ($data['email'] == $_SESSION['logged_user']['email']) {
        $error_email = 'Это и так ваш Email';
    } else {
        $users_q = mysqli_query($connection, "SELECT * FROM `users`");
        $users = array();
        while ($us = mysqli_fetch_assoc($users_q)) {
            if ($us['email'] == $data['email']) {
                $error_email = 'Пользователь с таким Email уже существует';
                break;
            }
        }
    }
    if ($error_email == '') {
        mysqli_query($connection, "UPDATE `users` SET `email`= '" . $data['email'] . "' WHERE `id` = " . (int)$user['id']);
        header("Location: user_profile.php?id=$redirect");
    }
}
if (isset($data['do_save_about'])) {
    mysqli_query($connection, "UPDATE `users` SET `about`= '" . $data['about'] . "' WHERE `id` = " . (int)$user['id']);
    header("Location: user_profile.php?id=$redirect");
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="../style/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/css/my.css">
    <title>Document</title>




</head>

<body>
    <!-- Навбар -->

    <?php include "../includes/nav.php" ?>
    <!-- Конец навбара -->
    <main role="main" class="container" style="margin-top: 7rem;">
        <div class="shadow p-3 mb-5 bg-white rounded">
            <div class="coltainer">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" href="user_profile.php?id=<?php echo $user['id'] ?>" aria-selected="false">Профиль</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_activ.php?id=<?php echo $user['id'] ?>" aria-selected="false">Активность</a>
                    </li>
                    <?php
                    if ($_SESSION['logged_user']['id'] == $_GET['id']) {
                        ?><li class="nav-item">
                            <a class="nav-link active" id="settings-tab" data-toggle="tab" href="" role="tab" aria-controls="settings" aria-selected="true">Настройки</a>
                        </li>
                    <?php
                }
                ?>
                    <?php
                    if ($_SESSION['logged_user']['id'] == $_GET['id']) {
                        ?>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- --------------------------Настройки-------------------------- -->
                        <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <div class="container-fluid">
                                <div class="row pb-3">
                                    <div class="col-md-12 col-lg-6">
                                        <div class="card mt-3 shadow p-3 bg-while rounded">
                                            <div class="card-body">
                                                <form action="user_settings.php?id=<?php echo $user['id'] ?>" method="POST">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Отображаемое имя</label>
                                                        <input type="text" class="form-control" name="login" id="text" value="<?php echo $user['login']; ?>">
                                                    </div>
                                                    <button class="btn btn-primary btn-block" type="submit" name="do_save_login">Сохранить</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card mt-3 shadow p-3 bg-while rounded">
                                            <div class="card-body">
                                                <label for="exampleFormControlTextarea1">Аватар</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" lang="ru">
                                                    <label class="custom-file-label" for="customFile">Выберите изображение</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mt-3 shadow p-3 bg-while rounded">
                                            <div class="card-body">
                                                <form action="user_settings.php?id=<?php echo $user['id'] ?>" method="POST" class="needs-validation" novalidate>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Старый пароль</label>
                                                        <input type="text" class="form-control" name="password_old" id="text" required>
                                                        <div class="invalid-feedback">
                                                            Введите старый пароль.
                                                        </div>
                                                        <label for="exampleFormControlTextarea1">Новый пароль</label>
                                                        <input type="text" class="form-control" name="password_new" id="text" required>
                                                        <div class="invalid-feedback">
                                                            Введите новый пароль.
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary btn-block" type="submit" name="do_save_password">Сохранить</button>
                                                    <?php
                                                    if ($error == 'NOT') {
                                                        ?>
                                                        <div class="text-success text-center mt-2">
                                                            <h5 style="margin-bottom: 0px;">
                                                                <?php echo 'Паполь успешно изменён!' ?>
                                                            </h5>
                                                        </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                        <div class="text-danger text-center mt-2">
                                                            <h5 style="margin-bottom: 0px;">
                                                                <?php echo $error ?>
                                                            </h5>
                                                        </div>
                                                    <?php
                                                }
                                                ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6">
                                        <div class="card mt-3 shadow p-3 bg-while rounded">
                                            <div class="card-body">
                                                <form action="user_settings.php?id=<?php echo $user['id'] ?>" method="POST" class="needs-validation" novalidate>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Email</label>
                                                        <input name="email" type="email" value="<?php echo $user['email']; ?>" class="form-control" id="regInputEmail" placeholder="Ваш Email" required>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Введите Email
                                                    </div>
                                                    <button class="btn btn-primary btn-block" type="submit" name="do_save_email">Сохранить</button>
                                                    <?php
                                                if ($error_email != '') {
                                                    ?>
                                                        <div class="text-danger text-center mt-2">
                                                            <h5 style="margin-bottom: 0px;">
                                                                <?php echo $error_email ?>
                                                            </h5>
                                                        </div>
                                                    <?php
                                                }
                                                ?>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card mt-3 shadow p-3 bg-while rounded">
                                            <div class="card-body">
                                                <form action="user_settings.php?id=<?php echo $user['id'] ?>" method="POST">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">О себе</label>
                                                        <textarea class="form-control" name="about" id="exampleFormControlTextarea1" rows="3"><?php echo $user['about']; ?></textarea>
                                                    </div>
                                                    <button class="btn btn-primary btn-block" type="submit" name="do_save_about">Сохранить</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    <?php
                }
                ?>
                </div>
            </div>
        </div>
    </main>

    <?php include "../includes/foot.php" ?>


    <!-- Конец футера -->
    <a name="te"></a>
    <!-- Bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../style/js/bootstrap.min.js"></script>
    <script src="../style/js/my.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>