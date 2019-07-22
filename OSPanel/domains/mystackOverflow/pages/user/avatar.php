<?php
require "../../includes/db.php";

$data = $_POST;
$id = $_GET['id'];
$user = R::findOne('users', "`id` = ?", array($id));
if ($user == Null) {
    header('Location: /');
}

if (isset($data['do_upload_img_1'])) {
    $user->image = '1.jpg';
    R::store($user);
    header('Location: /pages/user/settings.php?id=' . $id);
}
if (isset($data['do_upload_img_2'])) {
    $user->image = '2.jpg';
    R::store($user);
    header('Location: /pages/user/settings.php?id=' . $id);
}
if (isset($data['do_upload_img_3'])) {
    $user->image = '3.jpg';
    R::store($user);
    header('Location: /pages/user/settings.php?id=' . $id);
}
if (isset($data['do_upload_img_4'])) {
    $user->image = '4.jpg';
    R::store($user);
    header('Location: /pages/user/settings.php?id=' . $id);
}
if (isset($data['do_upload_img_5'])) {
    $user->image = '5.jpg';
    R::store($user);
    header('Location: /pages/user/settings.php?id=' . $id);
}
if (isset($data['do_upload_img_6'])) {
    $user->image = '6.jpg';
    R::store($user);
    header('Location: /pages/user/settings.php?id=' . $id);
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
    <title>Активность</title>


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
                                                        <a class="nav-link" href="profile.php?id=<?php echo $id ?>"
                                                           aria-selected="false">Профиль</a>
                                                    </li>
                                                </div>
                                                <div class="col-sm-4 col-md p-0">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="activity.php?id=<?php echo $id ?>"
                                                           aria-selected="false">Активность</a>
                                                    </li>
                                                </div>
                                                <?php
                                                if ($_SESSION['logged_user']['id'] == $id) {
                                                    ?>
                                                    <div class="col-sm-4 col-md p-0">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="settings-tab"
                                                               data-toggle="tab" href="" role="tab"
                                                               aria-controls="settings"
                                                               aria-selected="true">Настройки</a>
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
                <div class="row">
                    <div class="col-4 pt-3">
                        <form action="avatar.php?id=<?php echo $_SESSION['logged_user']['id'] ?>" method="POST"
                              enctype="multipart/form-data">
                            <div class="form-group">
                                <img class="rounded mx-auto d-block" src="/images/users/1.jpg" alt="">
                            </div>
                            <button class="btn btn-primary btn-block" type="submit" name="do_upload_img_1">Сохранить
                            </button>
                        </form>
                    </div>
                    <div class="col-4 pt-3">
                        <form action="avatar.php?id=<?php echo $_SESSION['logged_user']['id'] ?>" method="POST"
                              enctype="multipart/form-data">
                            <div class="form-group">
                                <img class="rounded mx-auto d-block" src="/images/users/2.jpg" alt="">
                            </div>
                            <button class="btn btn-primary btn-block" type="submit" name="do_upload_img_2">Сохранить
                            </button>
                        </form>
                    </div>
                    <div class="col-4 pt-3">
                        <form action="avatar.php?id=<?php echo $_SESSION['logged_user']['id'] ?>" method="POST"
                              enctype="multipart/form-data">
                            <div class="form-group">
                                <img class="rounded mx-auto d-block" src="/images/users/3.jpg" alt="">
                            </div>
                            <button class="btn btn-primary btn-block" type="submit" name="do_upload_img_3">Сохранить
                            </button>
                        </form>
                    </div>
                    <div class="col-4 pt-3">
                        <form action="avatar.php?id=<?php echo $_SESSION['logged_user']['id'] ?>" method="POST"
                              enctype="multipart/form-data">
                            <div class="form-group">
                                <img class="rounded mx-auto d-block" src="/images/users/4.jpg" alt="">
                            </div>
                            <button class="btn btn-primary btn-block" type="submit" name="do_upload_img_4">Сохранить
                            </button>
                        </form>
                    </div>
                    <div class="col-4 pt-3">
                        <form action="avatar.php?id=<?php echo $_SESSION['logged_user']['id'] ?>" method="POST"
                              enctype="multipart/form-data">
                            <div class="form-group">
                                <img class="rounded mx-auto d-block" src="/images/users/5.jpg" alt="">
                            </div>
                            <button class="btn btn-primary btn-block" type="submit" name="do_upload_img_5">Сохранить
                            </button>
                        </form>
                    </div>
                    <div class="col-4 pt-3">
                        <form action="avatar.php?id=<?php echo $_SESSION['logged_user']['id'] ?>" method="POST"
                              enctype="multipart/form-data">
                            <div class="form-group">
                                <img class="rounded mx-auto d-block" src="/images/users/6.jpg" alt="">
                            </div>
                            <button class="btn btn-primary btn-block" type="submit" name="do_upload_img_6">Сохранить
                            </button>
                        </form>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="/style/js/bootstrap.min.js"></script>
<script src="/style/js/my.js"></script>
<script src="/style/js/jQuery.js"></script>
<script src="/style/particles/particles.js"></script>
<script src="/style/particles/my.js"></script>
</body>

</html>