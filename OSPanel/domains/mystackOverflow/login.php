<?php
require "includes/config.php";

$data = $_POST;

if (isset($data['do_login'])) {
    $errors = array();

    $email = $data['email'];
    $password = $data['password'];

    $users_q = mysqli_query($connection, "SELECT * FROM `users` WHERE `email` = '$email'");
    if (mysqli_num_rows($users_q) <= 0) {
        $errors[] = 'Такого пользователя нет';
    } else {
        $user = mysqli_fetch_assoc($users_q);
        if (password_verify($password, $user['password'])) {
            $_SESSION['logged_user'] = $user;

            header('Location: /');
        } else {
            $errors[] = 'Пароль не верный!';
        }
    }
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
    <?php include "includes/nav.php" ?>
    <main role="main" class="container" style="margin-top: 7rem;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xs-10" style="width: 20rem">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <form action="/login.php" method="POST" class="needs-validation" novalidate>
                                <div class="form-group">
                                    <label for="exampleInputEmail">Email</label>
                                    <input name="email" type="email" value="<?php echo @$data['email'] ?>" class="form-control" id="regInputEmail" placeholder="Ваш Email" required>
                                    <div class="invalid-feedback">
                                        Введите Email.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPass">Пароль</label>
                                    <input type="password" class="form-control" name="password" id="regInputPass" placeholder="Ваш пароль" required>
                                    <div class="invalid-feedback">
                                        Введите пароль.
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit" name="do_login">Войти</button>

                                <?php

                                if (!empty($errors)) {
                                    ?>
                                    <div class="text-danger text-center mt-2">
                                        <h5>
                                            <?php echo array_shift($errors) ?>
                                        </h5>
                                    </div>
                                <?php
                            }
                            ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



    <?php include "includes/foot.php" ?>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../style/js/bootstrap.min.js"></script>
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