<?php
require "includes/db.php";

$questions = R::findAll('questions', "ORDER BY `id` DESC LIMIT 20");

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/particles/particles.css">
    <title>Мой Stack Overflow</title>
    <style>

    </style>
</head>

<body class="bg-light">
    <!-- Партиклы -->
    <div id="particles-js"></div>
    <div id="page-wrapper">
        <!-- Навбар -->
        <?php include "includes/nav.php" ?>
        <!-- /Навбар -->
        <!-- Главный блок -->
        <main role="main" class="container mt-4">

            <div class="shadow p-3 mb-5 bg-white rounded">
                <div class="coltainer">
                    <div class="row">
                        <div class="col-xs-12 col-lg-10">
                            <h3>Исследуйте вопросы сообщества</h3>
                        </div>
                        <div class="col-xs-12 col-lg-2">
                            <a class="btn btn-primary btn-block" href="pages/create_question.php">Задать вопрос</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow p-3 mb-5 bg-white rounded">
                <h6 class="border-bottom border-gray pb-2 mb-0">Новые вопросы</h6>
                <!-- Блок вопроса -->
                <?php
                foreach ($questions as $question) {
                    ?>
                    <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
                            <div class="container">


                                <div class="row">
                                    <div class="col-md-12 col-lg-3">
                                        <div class="row">
                                            <div class="col-4 p-1"><a class="btn btn-light btn-sm btn-block" href="#" role="button">
                                                    <span class="badge badge-light">4</span>голоса</a>
                                            </div>
                                            <div class="col-4 p-1"><a class="btn btn-light btn-sm btn-block" href="#" role="button">
                                                    <span class="badge badge-light">4</span>ответа</a></div>
                                            <div class="col-4 p-1"><a class="btn btn-light btn-sm btn-block" href="#" role="button">
                                                    <span class="badge badge-light">4</span>показа</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="#">
                                                    <!-- Превью текста не больше 250 символов(указывать в создании вопроса) -->
                                                    <h3 class="text-break"><?php echo $question->title ?></h3>
                                                </a>
                                            </div>
                                            <div class="w-100"></div>
                                            <div class="col-md-12 col-lg-6 text-left">
                                                <!-- Максимум 6 -->
                                                <?php
                                                $questions_tag = R::findCollection('questions_tags');

                                                $arrTag = array();

                                                while ($qt = $questions_tag->next()) {
                                                    if ($qt->questions_id == $question->id) {
                                                        $arrTag[] = $qt->tags_id;
                                                    }
                                                }

                                                $tags = R::loadAll('tags', $arrTag);

                                                foreach ($tags as $tag) {
                                                    ?>
                                                    <a class="badge badge-pill badge-light" href="#" role="button"><?php echo $tag->name; ?></a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col-md-12 col-lg-6 text-right">
                                                <a href="#" title="08-06-19 16:29"><span>изменён 6 минут назад</span></a>
                                                <?php $user = R::load('users', $question->users_id); ?>
                                                <a href="/pages/user/profile.php?id=<?php echo $user->id ?>"><span>
                                                        <?php
                                                        echo $user->login;
                                                        ?>
                                                    </span></a>
                                                <span class="text-muted" title="уровень репутации">200к</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- Конец блока вопроса -->

                <small class="d-block text-right mt-3">
                    <a class="btn btn-primary" href="#" role="button">Больше вопросов</a>
                </small>
        </main>
        <!-- /Главный бло -->
        <!-- Футер -->
        <?php include "includes/foot.php" ?>
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
    <script src="style/particles/particles.js"></script>
    <script src="style/particles/my.js"></script>

</body>

</html>