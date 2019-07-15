<?php
require "../../includes/db.php";

$id = $_GET['id'];
$data = $_POST;
$user = R::findOne('users', "`id` = ?", array($id));
if ($user == Null) {
    header('Location: /');
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
    <title>Профиль</title>
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
                <div class="coltainer">
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
                                                            <a class="nav-link active" href="" aria-selected="true">Профиль</a>
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
                                                                <a class="nav-link" href="settings.php?id=<?php echo $id ?>" aria-selected="false">Настройки</a>
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
                    <!-- ---------------------------Профиль--------------------------- -->
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 col-lg-3 pl-lg-0 pl-0 pr-lg-2 pr-0 pt-3">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col">
                                                <div class="card text-center mx-auto shadow p-3 bg-while rounded" style="width: 12rem;">
                                                    <img class="card-img-top mx-auto " src="/images/users/<?php echo $user['image'] ?>" alt="Card image cap">
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
                                                                <small class="card-text font-weight-bold">
                                                                    222
                                                                </small>
                                                                <small class="card-text"> вопросов</small>
                                                            </div>
                                                            <div class="col">
                                                                <small class="card-text font-weight-bold">
                                                                    111
                                                                </small>
                                                                <small class="card-text"> ответов</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-9 pl-lg-2 pl-0 pr-lg-0 pr-0 pt-3">
                                    <div class="jumbotron jumbotron-fluid shadow p-3 bg-while rounded">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <h1 class="text-break display-4 border-bottom border-dark pb-2 mb-0"><?php echo $user->login ?></h1>
                                                    <h3 class="display-5">О себе</h3>
                                                    <p id="result" class="lead"><?php echo $user['about']; ?></p>
                                                </div>
                                            </div>
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
    <script src="/style/particles/particles.js"></script>
    <script src="/style/particles/my.js"></script>
</body>

</html>