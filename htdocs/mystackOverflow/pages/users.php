<?php
require "../includes/db.php";


// запросы пегинации
$per_page = 18;
$page = 1;

if (isset($_GET['page'])) {
    $page = (int) $_GET['page'];
}

$total_count = R::count('users');

$total_pages = ceil($total_count / $per_page);

if ($page < 1 || $page > $total_pages) {
    $page = 1;
}

$offset = ($per_page * $page) - $per_page;

$users = $questions = R::findAll('users', "ORDER BY `rep` DESC LIMIT $offset, $per_page");
$users_exist = true;
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
                <h6 class="border-bottom border-gray pb-2 mb-0">Пользователи сообщества</h6>

                <div class="media text-muted pt-3">
                    <div class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
                        <div class="container">
                            <div class="row">
                                <?php
                                foreach ($users as $user) {
                                    ?>
                                    <div class="col-12 col-6 col-md-4 col-lg-3 col-xl-2">
                                        <div class="card mt-3 shadow p-0 bg-while rounded">
                                            <div class="card-body p-0">
                                                <img src="/images/users/<?php echo $user['image'] ?>" class="card-img-top" alt="...">
                                                <div class="card-body p-1">
                                                    <a href="/pages/user/profile.php?id=<?php echo $user['id'] ?>">
                                                        <p class="card-text text-center">
                                                            <?php echo  mb_substr($user['login'], 0, 10, 'utf-8');
                                                            if (iconv_strlen($user['login']) > 10) echo '...';  ?>
                                                        </p>
                                                    </a>
                                                    <p class="card-text text-center">
                                                        <?php echo  $user['rep']  ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

        </main>
        <!-- /Главный блок -->
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
            if ($users_exist) {
                ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center ">
                        <li class="page-item shadow <?php if ($page <= 1) echo 'disabled'; ?> "><a class="page-link" href="/pages/users.php?page=<?php echo 1; ?>">Первая</a></li>
                        <li class="page-item shadow <?php if ($page <= 1) echo 'disabled'; ?> "><a class="page-link" href="/pages/users.php?page=<?php echo ($page - 1); ?>">Назад</a></li>
                        <li class="page-item shadow <?php if ($page >= $total_pages) echo 'disabled'; ?> "><a class="page-link" href="/pages/users.php?page=<?php echo ($page + 1); ?>">Вперёд</a></li>
                        <li class="page-item shadow <?php if ($page >= $total_pages) echo 'disabled'; ?> "><a class="page-link" href="/pages/users.php?page=<?php echo $total_pages; ?>">Последняя</a></li>
                    </ul>
                    <ul class="pagination justify-content-center ">
                        <li class="page-item shadow <?php if ($page - 3 < 1) echo 'disabled'; ?>"><a class="page-link" href="/pages/users.php?page=<?php echo ($page - 3); ?>">...</a></li>
                        <?php
                        for ($i = $page_left; $i <= $page_right; $i++) {
                            ?>
                            <li class="page-item shadow <?php if ($i == $page) echo 'disabled'; ?>"><a class="page-link" href="/pages/users.php?page=<?php echo $i; ?>"><?php echo $i ?></a></li>
                        <?php
                        }
                        ?>
                        <li class="page-item shadow <?php if ($page + 3 > $total_pages) echo 'disabled'; ?>"><a class="page-link" href="/pages/users.php?page=<?php echo ($page + 3); ?>">...</a></li>
                    </ul>

                </nav>
            <?php
            }
            ?>
        </div>
        <!-- Конец пегинации -->
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