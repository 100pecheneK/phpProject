<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Мой Stack Overflow</title>
    
    <style>
        body {
            height: 3000px;
        }
    </style>
</head>

<body class="bg-light">
    <!-- Навбар -->
    <nav class="navbar navbar-expand-xl navbar-light sticky-top bg-light shadow-sm">
        <a class="navbar-brand" href="#">Мой Stack Overflow</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" style="">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#" role="button">Все вопросы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button">Метки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button">Пользователи</a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <input class="form-control my-2 mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 mr-sm-2" type="submit">Поиск</button>
            </form>
            <a class="btn btn-outline-primary mr-sm-2" href="#" data-toggle="modal"
                data-target="#exampleModalLogIn">Войти</a>
            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModalSignUp">Регистрация</a>
        </div>
    </nav>
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
                        <a class="btn btn-primary btn-block" href="#">Задать вопрос</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="shadow p-3 mb-5 bg-white rounded">
            <h6 class="border-bottom border-gray pb-2 mb-0">Новые вопросы</h6>
            <!-- Блок вопроса -->
            <div class="media text-muted pt-3">
                <div class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-lg-3">
                                <div class="row">
                                    <div class="col-4 p-1"><a class="btn btn-light btn-sm btn-block" href="#"
                                            role="button">
                                            <span class="badge badge-light">4</span>голоса</a>
                                    </div>
                                    <div class="col-4 p-1"><a class="btn btn-light btn-sm btn-block" href="#"
                                            role="button">
                                            <span class="badge badge-light">4</span>ответа</a></div>
                                    <div class="col-4 p-1"><a class="btn btn-light btn-sm btn-block" href="#"
                                            role="button">
                                            <span class="badge badge-light">4</span>показа</a></div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-9">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="#">
                                            <!-- Превью текста не больше 250 символов(указывать в создании вопроса) -->
                                            <h3 class="text-break">Что такое картошка? Как её варить? Что делать если
                                                картошка упалаЧто такое картошка? Как её варить? Что делать если
                                                картошка упала?123фывыа фвыа ыфа ф?</h3>
                                        </a>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-md-12 col-lg-6 text-left">
                                        <!-- Максимум 6 -->
                                        <a class="badge badge-pill badge-light" href="#" role="button">Овощи</a>
                                        <a class="badge badge-pill badge-light" href="#" role="button">Овощи</a>
                                        <a class="badge badge-pill badge-light" href="#" role="button">Овощи</a>
                                        <a class="badge badge-pill badge-light" href="#" role="button">Овощи</a>
                                        <a class="badge badge-pill badge-light" href="#" role="button">Овощи</a>
                                        <a class="badge badge-pill badge-light" href="#" role="button">Овощи</a>
                                    </div>
                                    <div class="col-md-12 col-lg-6 text-right">
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

            <small class="d-block text-right mt-3">
                <a class="btn btn-primary" href="#" role="button">Больше вопросов</a>
            </small>
    </main>
    <!-- /Главный бло -->
    <!-- Футер -->
    <footer class="text-muted">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md">
                    <img class="mb-2" src="/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
                    <small class="d-block mb-3 text-muted">© 2017-2018</small>
                </div>
                <div class="col-6 col-md">
                    <h5>Features</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Cool stuff</a></li>
                        <li><a class="text-muted" href="#">Random feature</a></li>
                        <li><a class="text-muted" href="#">Team feature</a></li>
                        <li><a class="text-muted" href="#">Stuff for developers</a></li>
                        <li><a class="text-muted" href="#">Another one</a></li>
                        <li><a class="text-muted" href="#">Last time</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Resources</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Resource</a></li>
                        <li><a class="text-muted" href="#">Resource name</a></li>
                        <li><a class="text-muted" href="#">Another resource</a></li>
                        <li><a class="text-muted" href="#">Final resource</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>About</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">О проекте</a></li>
                        <li><a class="text-muted" href="about/about.php">История создания</a></li>
                        <li><a class="text-muted" href="#">Privacy</a></li>
                        <li><a class="text-muted" href="#">Terms</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- /Футер -->

    <!-- Bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>