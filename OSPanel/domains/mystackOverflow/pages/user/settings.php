<?php
require "../../includes/db.php";

$data = $_POST;
$id = $_GET['id'];
$user = R::findOne('users', "`id` = ?", array($id));
if ($user == Null) {
    header('Location: /');
}
// do_save_login
if (isset($data['do_save_login'])) {
    $do_save_login_error = '';
    if (iconv_strlen($data['login']) > 100) {
        $do_save_login_error = 'maxLen';
    } else if ($data['login'] != '') {
        $user->login = strip_tags($data['login']);
        R::store($user);
        $_SESSION['logged_user'] = $user;
        $do_save_login_error = 'no';
        header('Location: /pages/user/settings.php?id=' . $id);
    } else {
        $do_save_login_error = 'yes';
    }
}

// do_upload_img

// do_save_password
//      password_old
//      password_new
if (isset($data['do_save_password'])) {
    $do_save_password_error = '';
    if (password_verify($data['password_old'], $user->password)) {
        $user->password = password_hash($data['password_new'], PASSWORD_DEFAULT);
        R::store($user);
        $do_save_password_error = 'no';
        header('Location: /pages/user/settings.php?id=' . $id);
    } else {
        $do_save_password_error = 'yes';
    }
}
// do_save_email
if (isset($data['do_save_email'])) {
    $do_save_email_error = '';

    // $email = R::findOne('users', 'email', array($data['email']));
    $email = R::findLike('users', array('email' => array($data['email'])));
    if ($email != Null) {
        $do_save_email_error = 'yes';
    } else {
        $user->email = strip_tags($data['email']);
        R::store($user);
        $do_save_email_errors[] = 'no';
        header('Location: /pages/user/settings.php?id=' . $id);
    }
}

// do_save_about
if (isset($data['do_save_about'])) {
    $do_save_about_error = '';
    if (iconv_strlen($data['login']) > 1000) {
        $do_save_about_error = 'maxLen';
    } else {
        $user->about = strip_tags($data['about']);
        R::store($user);
        $do_save_about_error = 'no';
        header('Location: /pages/user/settings.php?id=' . $id);
    }
}
// do_save_color

if (isset($data['do_save_color'])) {
    $user = R::findOne('users', "`id` = ?", array($id));
    $do_save_color = '';
    switch ($data['color']) {
        case '1':
            $user->color = 'primary';
            $color = 'primary';
            $do_save_color = 'no';
            break;
        case '2':
            $user->color = 'secondary';
            $color = 'secondary';
            $do_save_color = 'no';
            break;
        case '3':
            $user->color = 'while';
            $color = 'while';
            $do_save_color = 'no';
            break;
        case '4':
            $user->color = 'dark';
            $color = 'dark';
            $do_save_color = 'no';
            break;
        case '5':
            $user->color = 'info';
            $color = 'info';
            $do_save_color = 'no';
            break;
        case '6':
            $user->color = 'light';
            $color = 'light';
            $do_save_color = 'no';
            break;
        default:
            $user->color = 'primary';
            $color = 'primary';
            $do_save_color = 'no';
            break;
    }
    header('Location: /pages/user/settings.php?id=' . $id);
    R::store($user);
}

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="/style/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="/style/css/my.css">
    <link rel="stylesheet" href="/style/particles/particles.css">
    <title>Настройки</title>

</head>

<body class="bg-<?php if (5 < date('G') && date('G') < 20) echo 'light';
                else echo 'dark' ?>">
    <!-- Партиклы -->
    <div id="particles-js"></div>
    <div id="page-wrapper">
        <!-- Навбар -->
        <?php include "../../includes/nav.php" ?>
        <!-- /Навбар -->

        <main role="main" class="container mt-sm-3 mt-md-5 p-0 p-md-2">
            <div class="shadow p-3 mb-5 bg-white rounded">
                <div class="container pl-0 pr-0">
                    <div class="row">
                        <div class="col">
                            <nav class="navbar navbar-light p-0">
                                <div class="navbar-collapse">
                                    <div class="container p-0">
                                        <div class="row">
                                            <div class="col">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <div class="col-sm-4 col-md p-0">
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="profile.php?id=<?php echo $id ?>" aria-selected="false">Профиль</a>
                                                        </li>
                                                    </div>
                                                    <div class="col-sm-4 col-md p-0">
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="activity.php?id=<?php echo $id ?>" aria-selected="false">Активность</a>
                                                        </li>
                                                    </div>
                                                    <?php
                                                    if ($_SESSION['logged_user']['id'] == $id) {
                                                        ?>
                                                        <div class="col-sm-4 col-md p-0">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="settings-tab" data-toggle="tab" href="" role="tab" aria-controls="settings" aria-selected="true">Настройки</a>
                                                            </li>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="col-sm-0 col-md-4"></div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">
                    <!-- --------------------------Настройки-------------------------- -->
                    <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <div class="container-fluid">
                            <div class="row pb-3">
                                <div class="col-md-12 col-lg-6 pl-lg-0 pl-0 pr-lg-2 pr-0">
                                    <div class="card mt-3 shadow p-3 bg-while rounded">
                                        <div class="card-body">
                                            <form action="settings.php?id=<?php echo $_SESSION['logged_user']['id'] ?>" method="POST">
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Отображаемое имя</label>
                                                    <input type="text" class="form-control" name="login" id="text" value="<?php echo $user->login ?>">
                                                </div>
                                                <button class="btn btn-primary btn-block" type="submit" name="do_save_login">Сохранить</button>
                                                <?php
                                                if ($do_save_login_error == 'no') {
                                                    ?>
                                                    <div class="text-success text-center mt-2">
                                                        <h5 style="margin-bottom: 0px;">
                                                            Логин изменён
                                                        </h5>
                                                    </div>
                                                <?php
                                                } else if ($do_save_login_error == 'yes') { ?>
                                                    <div class="text-danger text-center mt-2">
                                                        <h5 style="margin-bottom: 0px;">
                                                            Логин не может быть пустым
                                                        </h5>
                                                    </div>
                                                <?php
                                                } else if ($do_save_login_error == 'maxLen') { ?>
                                                    <div class="text-danger text-center mt-2">
                                                        <h5 style="margin-bottom: 0px;">
                                                            Логин слишком длинный (больше 100 символов)
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
                                            <form action="settings.php?id=<?php echo $_SESSION['logged_user']['id'] ?>" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Аватар</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" name="image">
                                                        <option value="1">Аватар 1</option>
                                                        <option value="2">Аватар 2</option>
                                                        <option value="3">Аватар 3</option>
                                                        <option value="4">Аватар 4</option>
                                                        <option value="5">Аватар 5</option>
                                                        <option value="6">Аватар 6</option>
                                                        <option value="7">Аватар 7</option>
                                                    </select>
                                                </div>
                                                <button class="btn btn-primary btn-block" type="submit" name="do_upload_img">Сохранить</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card mt-3 shadow p-3 bg-while rounded">
                                        <div class="card-body">
                                            <form action="settings.php?id=<?php echo $_SESSION['logged_user']['id'] ?>" method="POST" class="needs-validation" novalidate>
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
                                                if ($do_save_password_error == 'no') {
                                                    ?>
                                                    <div class="text-success text-center mt-2">
                                                        <h5 style="margin-bottom: 0px;">
                                                            Паоль изменён
                                                        </h5>
                                                    </div>
                                                <?php
                                                } else if ($do_save_password_error == 'yes') { ?>
                                                    <div class="text-danger text-center mt-2">
                                                        <h5 style="margin-bottom: 0px;">
                                                            Старый пароль введён неверно
                                                        </h5>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 pl-lg-2 pl-0 pr-lg-0 pr-0">
                                    <div class="card mt-3 shadow p-3 bg-while rounded">
                                        <div class="card-body">
                                            <form action="settings.php?id=<?php echo $_SESSION['logged_user']['id'] ?>" method="POST" class="needs-validation" novalidate>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Email</label>
                                                    <input name="email" type="email" value="<?php echo $user->email ?>" class="form-control" id="regInputEmail" placeholder="Ваш Email" required>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Введите Email
                                                </div>
                                                <button class="btn btn-primary btn-block" type="submit" name="do_save_email">Сохранить</button>
                                                <?php
                                                if ($do_save_email_error == 'no') {
                                                    ?>
                                                    <div class="text-success text-center mt-2">
                                                        <h5 style="margin-bottom: 0px;">
                                                            Email изменён
                                                        </h5>
                                                    </div>
                                                <?php
                                                } else if ($do_save_email_error == 'yes') { ?>
                                                    <div class="text-danger text-center mt-2">
                                                        <h5 style="margin-bottom: 0px;">
                                                            Email занят
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
                                            <form action="settings.php?id=<?php echo $_SESSION['logged_user']['id'] ?>" method="POST">
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">О себе</label>
                                                    <textarea class="form-control" name="about" id="exampleFormControlTextarea1" rows="3"><?php echo $user->about ?></textarea>
                                                </div>
                                                <button class="btn btn-primary btn-block" type="submit" name="do_save_about">Сохранить</button>
                                                <?php
                                                if ($do_save_about_error == 'no') {
                                                    ?>
                                                    <div class="text-success text-center mt-2">
                                                        <h5 style="margin-bottom: 0px;">
                                                            Информация о вас изменена
                                                        </h5>
                                                    </div>
                                                <?php
                                                } else if ($do_save_about_error == 'maxLen') { ?>
                                                    <div class="text-danger text-center mt-2">
                                                        <h5 style="margin-bottom: 0px;">
                                                            Информации о вас слишком много (больше 1000 символов)
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
                                            <form action="settings.php?id=<?php echo $_SESSION['logged_user']['id'] ?>" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Цвет</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" name="color">
                                                        <!-- selected -->
                                                        <option class="bg-primary text-white" value="1" <?php echo $user->color == 'primary' ? 'selected' : '' ?>>primary</option>
                                                        <option class="bg-secondary text-white" value="2" <?php echo $user->color == 'secondary' ? 'selected' : '' ?>>secondary</option>
                                                        <option class="bg-while text-dark" value="3" <?php echo $user->color == 'while' ? 'selected' : '' ?>>while</option>
                                                        <option class="bg-dark text-white" value="4" <?php echo $user->color == 'dark' ? 'selected' : '' ?>>dark</option>
                                                        <option class="bg-info text-white" value="5" <?php echo $user->color == 'info' ? 'selected' : '' ?>>info</option>
                                                        <option class="bg-light text-dark" value="6" <?php echo $user->color == 'light' ? 'selected' : '' ?>>light</option>
                                                    </select>
                                                </div>
                                                <button class="btn btn-primary btn-block" type="submit" name="do_save_color">Сохранить</button>
                                                <?php
                                                if ($do_save_color == 'no') {
                                                    ?>
                                                    <div class="text-success text-center mt-2">
                                                        <h5 style="margin-bottom: 0px;">
                                                            Установлен цвет <?php echo $color ?>
                                                        </h5>
                                                    </div>
                                                <?php
                                                } ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Футер -->
        <?php include "../../includes/foot.php" ?>
        <!-- /Футер -->
    </div>
    <!-- /Партиклы -->

    <!-- Bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/style/js/bootstrap.min.js"></script>
    <script src="/style/js/my.js"></script>
    <script src="/style/js/jQuery.js"></script>
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
    <script src="/style/particles/particles.js"></script>
    <script src="/style/particles/my.js"></script>
</body>

</html>