<?php
require "../includes/db.php";
include "../includes/diff.php";

$sort = $_GET['sort'];
// запросы пегинации
$per_page = 20;
$page = 1;

if (isset($_GET['page'])) {
    $page = (int) $_GET['page'];
}

$total_count = R::count('questions');

$total_pages = ceil($total_count / $per_page);

if ($page < 1 || $page > $total_pages) {
    $page = 1;
}

$offset = ($per_page * $page) - $per_page;

// sort
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
        $sort = 'id DESC';
        break;
}
// /sort

$questions = $questions = R::findAll('questions', "ORDER BY " . $sort . " LIMIT $offset, $per_page");
$questions_exist = true;
// /запросы пегинации
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
                <h6 class="pb-2 mb-0">Вопросы пользоателей</h6>
                <!-- Сортировка -->
                <div class="row justify-content-center">
                    <div class="col-xs-12 col-md">
                        <a class="btn btn-light btn-sm btn-block" href="/pages/questions.php?id=<?php echo $question->id ?>&sort=new" role="button">Новые</a>
                    </div>
                    <div class="col-xs-12 col-md">
                        <a class="btn btn-light btn-sm btn-block" href="/pages/questions.php?id=<?php echo $question->id ?>&sort=old" role="button">Старые</a>
                    </div>
                    <div class="col-xs-12 col-md">
                        <a class="btn btn-light btn-sm btn-block" href="/pages/questions.php?id=<?php echo $question->id ?>&sort=rep" role="button">Рейтинг</a>
                    </div>
                </div>
                <div class="border-bottom border-gray pt-2 pb-2 mb-0"></div>
                <!-- Блок вопроса -->
                <?php
                foreach ($questions as $question) {
                    // rep
                    $rep = $question->rep;
                    // answersCount
                    $answersCount = R::count('answers', 'question_id = ?', array($question->id));
                    // views
                    $views = $question->views;
                    ?>
                    <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-lg-3">
                                        <div class="row">
                                            <div class="col-4 p-1"><a class="btn btn-light btn-sm btn-block" href="#" role="button">
                                                    <span class="badge badge-light"><?php echo $rep ?></span>голоса</a>
                                            </div>
                                            <div class="col-4 p-1"><a class="btn btn-light btn-sm btn-block" href="#" role="button">
                                                    <span class="badge badge-light"><?php echo $answersCount ?></span>ответа</a></div>
                                            <div class="col-4 p-1"><a class="btn btn-light btn-sm btn-block" href="#" role="button">
                                                    <span class="badge badge-light"><?php echo $views ?></span>показа</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="pages/question.php?id=<?php echo $question->id ?>">
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
                                                <?php
                                                if ($answersCount == 0) {
                                                    $time = 'Добавлен ' . diffphp($question->date) . ' назад';
                                                } else if ($answersCount > 0) {
                                                    $lastAnswer = R::getCol("SELECT `date` FROM `answers` WHERE `question_id` = $question->id  ORDER BY `id` DESC LIMIT 1");
                                                    $time = 'Последний ответ дан ' . diffphp($lastAnswer[0]) . ' назад';
                                                }
                                                ?>
                                                <a href="#" title="08-06-19 16:29"><span> <?php echo $time ?></span></a>
                                                <?php $user = R::load('users', $question->users_id); ?>
                                                <a href="/pages/user/profile.php?id=<?php echo $user->id ?>"><span>
                                                        <?php
                                                        echo $user->login;
                                                        ?>
                                                    </span></a>
                                                <?php
                                                if ($user->rep > 1000) {
                                                    $user_rep = ($user->rep / 1000) . 'k';
                                                    if ($user->rep > 1000000) {
                                                        $user_rep = ($user->rep / 1000000) . 'm';
                                                    }
                                                }
                                                ?>
                                                <span class="text-muted" title="уровень репутации"><?php echo $user_rep ?></span>
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
                <small class="d-block text-right mt-3">
                    <a class="btn btn-primary" href="/pages/questions.php" role="button">Больше вопросов</a>
                </small>
            </div>
            <!-- Конец блока вопроса -->
    </div>
    <!-- Пегинация -->
    <div class="col-12">
        <?php
        if ($total_pages <= 4) {
            $page_left = 1;
            $page_right = $total_pages;
        } else {
            $page_show = 2;
            $page_left = $page - $page_show;
            $page_right = $page + $page_show;
            if ($page_left < 1) {
                $page_left = 1;
            }
            if ($page_right > $total_pages) {
                $page_right = $total_pages;
            };
            if ($page == 2) {
                $page_right = 5;
            }
            if ($page == 1) {
                $page_right = 5;
            }
            if ($page == $total_pages - 1) {
                $page_left = $total_pages - 4;
            }
            if ($page == $total_pages) {
                $page_left = $total_pages - 4;
            }
        }
        if ($questions_exist) {
            ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center ">
                    <li class="page-item shadow <?php if ($page <= 1) echo 'disabled'; ?> "><a class="page-link" href="/pages/questions.php?page=<?php echo 1; ?>">Первая</a></li>
                    <li class="page-item shadow <?php if ($page <= 1) echo 'disabled'; ?> "><a class="page-link" href="/pages/questions.php?page=<?php echo ($page - 1); ?>">Назад</a></li>
                    <li class="page-item shadow <?php if ($page >= $total_pages) echo 'disabled'; ?> "><a class="page-link" href="/pages/questions.php?page=<?php echo ($page + 1); ?>">Вперёд</a></li>
                    <li class="page-item shadow <?php if ($page >= $total_pages) echo 'disabled'; ?> "><a class="page-link" href="/pages/questions.php?page=<?php echo $total_pages; ?>">Последняя</a></li>
                </ul>
                <ul class="pagination justify-content-center ">
                    <li class="page-item shadow <?php if ($page - 3 < 1) echo 'disabled'; ?>"><a class="page-link" href="/pages/questions.php?page=<?php echo ($page - 3); ?>">...</a></li>
                    <?php
                    for ($i = $page_left; $i <= $page_right; $i++) {
                        ?>
                        <li class="page-item shadow <?php if ($i == $page) echo 'disabled'; ?>"><a class="page-link" href="/pages/questions.php?page=<?php echo $i; ?>"><?php echo $i ?></a></li>
                    <?php
                    }
                    ?>
                    <li class="page-item shadow <?php if ($page + 3 > $total_pages) echo 'disabled'; ?>"><a class="page-link" href="/pages/questions.php?page=<?php echo ($page + 3); ?>">...</a></li>
                </ul>

            </nav>
        <?php
        }
        ?>
    </div>
    <!-- Конец пегинации -->
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
    <!-- Latest compiled and minified JavaScript -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script> -->
    <script src="/style/my.js"></script>
    <script src="/style/particles/particles.js"></script>
    <script src="/style/particles/my.js"></script>
</body>

</html>