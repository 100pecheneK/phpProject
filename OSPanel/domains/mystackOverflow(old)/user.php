<?php
require "includes/config.php";
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="style/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/css/my.css">
    <title>Document</title>




</head>

<body>
    <!-- Навбар -->

    <?php include "includes/nav.php" ?>
    <!-- Конец навбара -->
    <?php
    $user = mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = " . (int)$_GET['id']);
    $user = mysqli_fetch_assoc($user);
    ?>
    <main role="main" class="container" style="margin-top: 7rem;">

        <div class="shadow p-3 mb-5 bg-white rounded">
            <div class="coltainer">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="pages/user.php?id=<?php echo $user['id'] ?>" aria-selected="true">Профиль</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/user_activ.php?id=<?php echo $user['id'] ?>" aria-selected="false">Активность</a>
                    </li>
                    <?php
                    if ($_SESSION['logged_user']['id'] == $_GET['id']) {
                        ?><li class="nav-item">
                            <a class="nav-link" href="pages/user_settings.php?id=<?php echo $_SESSION['logged_user']['id'] ?>" aria-selected="false">Настройки</a>
                        </li>
                    <?php
                }
                ?>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <!-- ---------------------------Профиль--------------------------- -->
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 col-lg-3 p-3">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col">
                                                <div class="card text-center mx-auto shadow p-3 bg-while rounded" style="width: 12rem;">
                                                    <img class="card-img-top mx-auto" src="img.jpg" alt="Card image cap" style="width: 10rem !important; height: 10rem !important; margin-top: 15px">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-12 mx-auto">
                                                                <h2><?php echo $user['rep'] ?></h2>
                                                            </div>
                                                            <div class="col-sm-12 mx-auto">
                                                                <small class="card-text">РЕПУТАЦИЯ</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mt-2">
                                            <div class="col">
                                                <div class="card text-center mx-auto shadow p-3 bg-while rounded" style="width: 12rem;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <small class="card-text font-weight-bold"><?php echo $user['answer'] ?></small>
                                                                <small class="card-text"> вопросов</small>
                                                            </div>
                                                            <div class="col">
                                                                <small class="card-text font-weight-bold"><?php echo $user['questions'] ?></small>
                                                                <small class="card-text"> ответов</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-9 p-3">
                                    <div class="jumbotron jumbotron-fluid shadow p-3 bg-while rounded">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <h1 class="display-4 border-bottom border-dark pb-2 mb-0"><?php echo $user['login']; ?></h1>
                                                    <h3 class="display-5">О себе</h3>
                                                    <p id="result" class="lead"><?php echo $user['about']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jumbotron jumbotron-fluid shadow p-3 bg-while rounded">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col text-left">
                                                    <p class="lead">Метки</p>
                                                    <a class="badge badge-pill badge-light" href="#" role="button">Овощи</a>
                                                    <a class="badge badge-pill badge-light" href="#" role="button">Картошка</a>
                                                    <a class="badge badge-pill badge-light" href="#" role="button">Падение</a>
                                                    <a class="badge badge-pill badge-light" href="#" role="button">Варка</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- -------------------------Активность------------------------- -->
                    <div class="tab-pane fade" id="activ" role="tabpanel" aria-labelledby="activ-tab">
                        <div class="container-fluid">
                            <div class="row p-3">
                                <div class="col-md-12 col-lg-6">
                                    <div class="card mt-3 shadow p-3 bg-while rounded">
                                        <div class="card-body p-0 text-center">
                                            <h3>Последние вопросы</h3>
                                        </div>
                                    </div>
                                    <div class="card mt-3 shadow p-3 bg-while rounded">
                                        <div class="card-body">
                                            This is some text within a card body.
                                        </div>
                                    </div>
                                    <div class="card mt-3 shadow p-3 bg-while rounded">
                                        <div class="card-body">
                                            This lorem is some text within a card body.
                                        </div>
                                    </div>
                                    <div class="card mt-3 shadow p-3 bg-while rounded">
                                        <div class="card-body">
                                            This is some text within a card body.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="card mt-3 shadow p-3 bg-while rounded">
                                        <div class="card-body p-0 text-center">
                                            <h3>Последние ответы</h3>
                                        </div>
                                    </div>
                                    <div class="card mt-3 shadow p-3 bg-while rounded">
                                        <div class="card-body">
                                            This is some text within a card body.
                                        </div>
                                    </div>
                                    <div class="card mt-3 shadow p-3 bg-while rounded">
                                        <div class="card-body">
                                            This is some text within a card body.
                                        </div>
                                    </div>
                                    <div class="card mt-3 shadow p-3 bg-while rounded">
                                        <div class="card-body">
                                            This is some text within a card body.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- --------------------------Настройки-------------------------- -->
                    <?php
                    if (isset($_POST['do_save'])) {
                        if (iconv_strlen($_POST['about']) < 255) {
                            mysqli_query($connection, "UPDATE `users` SET `about`= '" . $_POST['about'] . "' WHERE `id` = " . (int)$user['id']);
                        }
                    }
                    ?>
                    <?php
                    if ($_SESSION['logged_user']['id'] == $_GET['id']) {
                        ?>
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <form action="/user.php?id=<?php echo $user['id'] ?>" method="POST">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">О себе</label>
                                    <input type="text" class="form-control" name="about" id="text" value="<?php echo $user['about']; ?>">
                                </div>
                                <button class="btn btn-primary btn-block" type="submit" name="do_save">Сохранить</button>
                            </form>

                        </div>
                    <?php
                }
                ?>
                </div>
            </div>
        </div>
    </main>

    <?php include "includes/foot.php" ?>


    <!-- Конец футера -->
    <a name="te"></a>
    <!-- Bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="style/js/bootstrap.min.js"></script>
    <script src="style/js/my.js"></script>
</body>

</html>