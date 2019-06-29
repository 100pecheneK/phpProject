<?php
require "../../includes/db.php";

$id = $_GET['id'];
if ($_SESSION['logged_user']['id'] != $id){
    header('Location: /');
}
$user = R::findOne('users', "`id` = ?", array($id));
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
    <title>Настройки</title>

</head>

<body>
    <!-- Навбар -->
    <?php include "../../includes/nav.php" ?>
    <!-- /Навбар -->

    <main role="main" class="container" style="margin-top: 7rem;">
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
                                        <form action="user_settings.php?id=" method="POST">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Отображаемое имя</label>
                                                <input type="text" class="form-control" name="login" id="text" value="Имя">
                                            </div>
                                            <button class="btn btn-primary btn-block" type="submit" name="do_save_login">Сохранить</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card mt-3 shadow p-3 bg-while rounded">
                                    <div class="card-body">
                                        <form action="user_settings.php?id=" method="POST" enctype="multipart/form-data">
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
                                        <form action="user_settings.php?id=" method="POST" class="needs-validation" novalidate>
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
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 pl-lg-2 pl-0 pr-lg-0 pr-0">
                                <div class="card mt-3 shadow p-3 bg-while rounded">
                                    <div class="card-body">
                                        <form action="user_settings.php?id=" method="POST" class="needs-validation" novalidate>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Email</label>
                                                <input name="email" type="email" value="имэил" class="form-control" id="regInputEmail" placeholder="Ваш Email" required>
                                            </div>
                                            <div class="invalid-feedback">
                                                Введите Email
                                            </div>
                                            <button class="btn btn-primary btn-block" type="submit" name="do_save_email">Сохранить</button>


                                        </form>
                                    </div>
                                </div>
                                <div class="card mt-3 shadow p-3 bg-while rounded">
                                    <div class="card-body">
                                        <form action="user_settings.php?id=" method="POST">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">О себе</label>
                                                <textarea class="form-control" name="about" id="exampleFormControlTextarea1" rows="3">Иоформация о себе</textarea>
                                            </div>
                                            <button class="btn btn-primary btn-block" type="submit" name="do_save_about">Сохранить</button>
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

    <!-- Bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../../style/js/bootstrap.min.js"></script>
    <script src="../../style/js/my.js"></script>
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