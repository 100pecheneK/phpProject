<?php
require "../includes/db.php";
include "../includes/diff.php";

$id = $_GET['id'];
$data = $_POST;
$sort = $_GET['sort'];
$question = R::findOne('questions', "`id` = ?", array($id));
$user = R::findOne('users', "`id` = ?", array($question->users_id));
if ($question == Null) {
    header('Location: /');
}
$question->views++;
R::store($question);

if (isset($data['do_create_answer'])) {

    $answer = R::dispense('answers');
    $answer->text = $data['text'];
    $answer->user_id = $_SESSION['logged_user']['id'];
    $answer->question_id = $id;
    $answer->is_answer = 0;
    R::store($answer);
    header('Location: /pages/question.php?id=' . $id);
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
    <link rel="stylesheet" href="/style/bootstrap-select-1.13.9/dist/css/bootstrap-select.css">

    <link rel="stylesheet" href="/style/my.css">
    <link rel="stylesheet" href="/style/particles/particles.css">

    <title>Создать вопрос</title>

    <style>

    </style>
</head>

<body class="bg-<?php if (5 < date('G') && date('G') < 20) echo 'light';
                else echo 'dark' ?>">
    <!-- Партиклы -->
    <div id="particles-js"></div>
    <div id="page-wrapper">
        <!-- Навбар -->
        <?php include "../includes/nav.php" ?>
        <!-- /Навбар -->
        <!-- Главный блок -->
        <main role="main" class="container mt-4">
            <div class="shadow p-3 mb-5 bg-white rounded">
                <h6 class="pb-2 mb-0">Вопрос пользоателя - <a href="/pages/user/profile.php?id=<?php echo $user->id ?>"><?php echo $user->login ?></a></h6>
                <!-- Вопрос -->
                <div class="row">
                    <div class="col">
                        <div class="jumbotron jumbotron-fluid shadow pt-3 pb-3 p-md-3 bg-primary text-white rounded">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <h1 class="text-break pb-2 mb-0"><?php echo $question->title ?></h1>
                                        <h3 class="text-break"><?php echo $question->text ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Дать ответ -->
                <div class="row">
                    <div class="col">
                        <div class="jumbotron jumbotron-fluid shadow p-3 p-3 p-md-3 bg-while rounded">
                            <?php
                            if ($_SESSION['logged_user'] != Null) { ?>
                                <form action="question.php?id=<?php echo $question->id ?>" method="POST">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Ответить на вопрос</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='text' required></textarea>
                                        <div class="invalid-feedback">
                                            Это поле обязательно
                                        </div>
                                    </div>
                                    <small class="d-block text-right mt-3">
                                        <button class="btn btn-primary" type="submit" name="do_create_answer">Ответить</button>
                                    </small>
                                </form>
                            <?php
                            } else { ?>
                                <div class="text-muted text-center">
                                    <h5 style="margin-bottom: 0px;">
                                        <?php echo 'Дать ответ могут только зарегистрированные пользователи' ?>
                                    </h5>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Сортировка -->

                <div class="row justify-content-center">
                    <div class="col-xs-12 col-md">
                        <a class="btn btn-light btn-sm btn-block" href="/pages/question.php?id=<?php echo $question->id ?>&sort=new" role="button">Новые</a>
                    </div>
                    <div class="col-xs-12 col-md">
                        <a class="btn btn-light btn-sm btn-block" href="/pages/question.php?id=<?php echo $question->id ?>&sort=old" role="button">Старые</a>
                    </div>
                    <div class="col-xs-12 col-md">
                        <a class="btn btn-light btn-sm btn-block" href="/pages/question.php?id=<?php echo $question->id ?>&sort=rep" role="button">Рейтинг</a>
                    </div>
                </div>

                <!-- Ответы -->
                <?php
                switch ($sort) {
                    case 'new':
                        $sort = 'id DESC';
                        break;
                    case 'old':
                        $sort = 'id';
                        break;
                    case 'rep':
                        $sort = 'rep DESC';
                        break;
                    default:
                        $sort = 'rep DESC';
                        break;
                }
                $answers = R::getAll('SELECT * FROM answers WHERE question_id = ? ORDER BY ' . $sort, array($id));
                $i = 1;
                $bgColor = 'dark';
                foreach ($answers as $answer) {
                    $user = R::findOne('users', "`id` = ?", array($answer['user_id']));
                    switch ($user->color) {
                        case 'primary':
                            $textColor = 'light';
                            $bgTextColor = 'dark';
                            break;
                        case 'secondary':
                            $textColor = 'light';
                            $bgTextColor = 'dark';
                            break;
                        case 'while':
                            $textColor = 'dark';
                            $bgTextColor = 'white';
                            break;
                        case 'dark':
                            $textColor = 'light';
                            $bgTextColor = 'dark';
                            break;
                        case 'info':
                            $textColor = 'light';
                            $bgTextColor = 'dark';
                            break;
                        case 'light':
                            $textColor = 'dark';
                            $bgTextColor = 'white';
                            break;
                    }
                    ?>
                    <div class="row align-items-center mt-3">
                        <div class="col">
                            <div class="jumbotron jumbotron-fluid text-<?php echo $textColor ?> shadow mb-0 p-3 bg-<?php echo $user->color ?> rounded">
                                <div class="container">
                                    <div class="row">
                                        <!-- Дата -->
                                        <?php

                                        $inter = diffphp($answer['date']);
                                        ?>
                                        <div class="col-12 p-0">
                                            <small class="d-block text-right "><?php echo 'ответ дан ' . $inter . ' назад' ?></small>
                                        </div>
                                        <!-- Пользователь -->
                                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-1 p-0 text-break">
                                            <a href="/pages/user/profile.php?id=<?php echo $user['id'] ?>" class="d-block btn btn-<?php echo $textColor ?> text-<?php echo $bgTextColor ?> m-0 p-0 rounded">
                                                <div class="col p-0">
                                                    <h6 class="badge text-center d-block m-0"><?php echo $i ?></h6>
                                                </div>
                                                <div class="col p-0">
                                                    <h6 href="/pages/user/profile.php?id=<?php echo $user['id'] ?>" class="d-block text-center m-0">
                                                        <?php echo  mb_substr($user['login'], 0, 10, 'utf-8');
                                                        if (iconv_strlen($user['login']) > 10) echo '...'; ?>
                                                    </h6>
                                                </div>
                                                <div class="col p-0">
                                                    <?php
                                                    if ($user->rep > 1000) {
                                                        $rep = ($user->rep / 1000) . 'k';
                                                        if ($user->rep > 1000000) {
                                                            $rep = ($user->rep / 1000000) . 'm';
                                                        }
                                                    }
                                                    ?>
                                                    <h6 class="d-block text-center badge m-0"><?php echo $rep ?></h6>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- Ответ -->
                                        <div class="col-xs-12 col-sm-8 col-md-9 col-xs-10">
                                            <h2 class="text-break m-0"><?php echo $answer['text'] ?></h2>
                                            <p><?php echo $answer['rep'] ?></p>
                                        </div>
                                        <!-- Лайк -->
                                        <div class="col-2">
                                            <?php
                                            $like_check = R::count('answerslikes', 'WHERE `answer_id` = ? AND `user_id` = ?', array($answer['id'], $_SESSION['logged_user']['id']));
                                            ?>
                                            <button class="like btn btn-secondary <?php if ($like_check == 1) echo 'active' ?>" data-ans="<?php echo $answer['id'] ?>" data-usr="<?php echo $_SESSION['logged_user']['id'] ?>">Лайк <div id="count_like"><?php $count = R::count('answerslikes', 'WHERE `answer_id` = ?', array($answer['id']));
                                                                    echo $count ?></div></button>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                }
                ?>




        </main>
        <!-- /Главный блок -->
        <!-- Футер -->
        <?php include "../includes/foot.php" ?>
        <!-- /Футер -->
        <!-- Партиклы -->
    </div>
    <!-- Bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="/style/js/bootstrap.min.js"></script>
    <script src="/style/my.js"></script>
    <script src="/style/js/jQuery.js"></script>
    <script src="/style/particles/particles.js"></script>
    <script src="/style/particles/my.js"></script>
    <script>
        $(document).ready(function() {
            $(".like").bind("click", function() {
                var link = $(this);
                var ans = link.data('ans');
                var usr = link.data('usr');

                $.ajax({
                    url: "/func/like.php",
                    type: "POST",
                    data: {
                        ans: ans,
                        usr: usr
                    },
                    dataType: "json",
                    success: function(result) {
                        if (result.isActive) {
                            link.addClass('active');
                        } else {
                            link.removeClass('active');
                        }
                        $('#count_like', link).html(result.count);
                    }
                });
            });
        });
    </script>

</body>

</html>