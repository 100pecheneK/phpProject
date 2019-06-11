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
    <?php
    include "includes/nav.php";
    ?>
    <!-- Конец навбара -->

    <main role="main" class="container" style="margin-top: 7rem;">

        <div class="shadow p-3 mb-5 bg-white rounded">
            <div class="coltainer">
                <div class="row" style="margin-bottom: 15px;">
                    <div class="col-xs-12 col-lg-10">
                        <h3>Исследуйте вопросы сообщества</h3>
                    </div>
                    <div class="col-xs-12 col-lg-2">
                        <a class="btn btn-primary btn-block" href="#">Задать вопрос</a>
                    </div>
                </div>
            </div>
            <div class="container" style="padding-left: 0px;padding-right: 0px;">
                <div class="row justify-content-center">
                    <div class="col-xs-12 col-md">
                        <a class="btn btn-light btn-sm btn-block" href="#" role="button">Главная</a>
                    </div>
                    <div class="col-xs-12 col-md">
                        <a class="btn btn-light btn-sm btn-block" href="#" role="button">Вопросы</a>
                    </div>
                    <div class="col-xs-12 col-md">
                        <a class="btn btn-light btn-sm btn-block" href="#" role="button">Метки</a>
                    </div>
                    <div class="col-xs-12 col-md">
                        <a class="btn btn-light btn-sm btn-block" href="#" role="button">Участники</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="shadow p-3 mb-5 bg-white rounded">
            <h6 class="border-bottom border-gray pb-2 mb-0">Вопросы</h6>
            <!-- Блок вопроса -->
            <div class="media text-muted pt-3">
                <div class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <div class="row">
                                    <div class="col-4"><a class="btn btn-light btn-sm btn-block" href="#" role="button">
                                            <span class="badge badge-light">4</span>голоса</a>
                                    </div>
                                    <div class="col-4"><a class="btn btn-light btn-sm btn-block" href="#" role="button">
                                            <span class="badge badge-light">4</span>ответа</a></div>
                                    <div class="col-4"><a class="btn btn-light btn-sm btn-block" href="#" role="button">
                                            <span class="badge badge-light">4</span>показа</a></div>
                                </div>

                            </div>
                            <div class="col-xs-12 col-md-9">
                                <div class="row">
                                    <div class="col">
                                        <a href="#">
                                            <h4>Что такое картошка? Как её варить? Что делать если картошка упала?</h4>
                                        </a>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col text-left">
                                        <a class="badge badge-pill badge-light" href="#" role="button">Овощи</a>
                                        <a class="badge badge-pill badge-light" href="#" role="button">Картошка</a>
                                        <a class="badge badge-pill badge-light" href="#" role="button">Падение</a>
                                        <a class="badge badge-pill badge-light" href="#" role="button">Варка</a>
                                    </div>
                                    <div class="col text-right">
                                        <a href="#" title="08-06-19 16:29"><span>изменён 6 минут назад</span></a>
                                        <a href="#"><span>Миша</span></a>
                                        <span class="text-muted" title="уровень репутации">200к</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Конец блока вопроса -->
            <!-- Бутофор -->
            <div class="media text-muted pt-3">
                <div class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <div class="row">
                                    <div class="col-4"><a class="btn btn-light btn-sm btn-block" href="#" role="button">
                                            <span class="badge badge-light">164</span>голоса</a>
                                    </div>
                                    <div class="col-4"><a class="btn btn-light btn-sm btn-block" href="#" role="button">
                                            <span class="badge badge-light">0</span>ответа</a></div>
                                    <div class="col-4"><a class="btn btn-light btn-sm btn-block" href="#" role="button">
                                            <span class="badge badge-light">200</span>показа</a></div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <div class="row">
                                    <div class="col">
                                        <a href="#">
                                            <h4>У меня есть вопрос и он требует срочного ответа</h4>
                                        </a>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col text-left">
                                        <a class="badge badge-pill badge-light" href="#" role="button">Овощи</a>
                                        <a class="badge badge-pill badge-light" href="#" role="button">Картошка</a>
                                        <a class="badge badge-pill badge-light" href="#" role="button">Падение</a>
                                        <a class="badge badge-pill badge-light" href="#" role="button">Варка</a>
                                    </div>
                                    <div class="col text-right">
                                        <a href="#" title="08-06-19 16:29"><span>задан 3 минуты назад</span></a>
                                        <a href="#"><span>Миша</span></a>
                                        <span class="text-muted" title="уровень репутации">200к</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="media text-muted pt-3">
                <div class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">
                                <div class="row">
                                    <div class="col-4"><a class="btn btn-light btn-sm btn-block" href="#" role="button">
                                            <span class="badge badge-light">-5</span>голосов</a>
                                    </div>
                                    <div class="col-4"><a class="btn btn-light btn-sm btn-block" href="#" role="button">
                                            <span class="badge badge-light">70</span>ответов</a></div>
                                    <div class="col-4"><a class="btn btn-light btn-sm btn-block" href="#" role="button">
                                            <span class="badge badge-light">45</span>показов</a></div>
                                </div>

                            </div>
                            <div class="col-xs-12 col-md-9">
                                <div class="row">
                                    <div class="col">
                                        <a href="#">
                                            <h4>У меня не работает стульчак</h4>
                                        </a>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col text-left">
                                        <a class="badge badge-pill badge-light" href="#" role="button">Туалет</a>
                                        <a class="badge badge-pill badge-light" href="#" role="button">Стальчак</a>
                                        <a class="badge badge-pill badge-light" href="#" role="button">Какахи</a>
                                    </div>
                                    <div class="col text-right">
                                        <a href="#" title="08-06-19 16:29"><span>ответ дан 6 минут назад</span></a>
                                        <a href="#"><span>M94IK</span></a>
                                        <span class="text-muted" title="уровень репутации">12</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Конец бутофор -->
            <small class="d-block text-right mt-3">
                <a class="btn btn-primary" href="#" role="button">Больше вопросов</a>
            </small>
    </main>

   <?php 
   include "includes/foot.php";
   ?>
    <!-- Bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="style/js/bootstrap.min.js"></script>
    <script src="style/js/my.js"></script>
</body>

</html>