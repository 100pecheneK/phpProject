<?php
require "../includes/config.php";

$user = mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = " . (int)$_GET['id']);
$user = mysqli_fetch_assoc($user);
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
                                                        <a class="nav-link" href="user_profile.php?id=<?php echo $user['id'] ?>" aria-selected="false">Профиль</a>
                                                    </li>
                                                </div>
                                                <div class="col-sm-4 col-md p-0">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="" aria-selected="true">Активность</a>
                                                    </li>
                                                </div>
                                                <?php
                                                if ($_SESSION['logged_user']['id'] == $_GET['id']) {
                                                    ?><div class="col-sm-4 col-md p-0">
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="user_settings.php?id=<?php echo $_SESSION['logged_user']['id'] ?>" aria-selected="false">Настройки</a>
                                                        </li>
                                                    </div>
                                                <?php
                                            }
                                            ?>
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
                <!-- -------------------------Активность------------------------- -->
                <div class="tab-pane fade show active" id="activ" role="tabpanel" aria-labelledby="activ-tab">
                    <div class="container-fluid">
                        <div class="row pb-3">
                            <div class="col-md-12 col-lg-6 pl-lg-0 pl-0 pr-lg-2 pr-0">
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
                            <div class="col-md-12 col-lg-6 pl-lg-2 pl-0 pr-lg-0 pr-0">
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
</body>

</html>