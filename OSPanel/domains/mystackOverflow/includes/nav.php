<nav class="navbar navbar-expand-xl navbar-light sticky-top bg-light shadow-sm">
    <a class="navbar-brand" href="/">Мой Stack Overflow</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <input class="form-control my-2 mr-sm-2" type="text" placeholder="Поиск" aria-label="Search">
            <button class="btn btn-outline-success my-2 mr-sm-2" type="submit">Поиск</button>
        </form>
        <?php
        if (isset($_SESSION['logged_user'])) : ?>
            <a class="btn btn-outline-primary mr-sm-2" href="/pages/user/profile.php?id=<?php echo $_SESSION['logged_user']['id'] ?>"><?php echo $_SESSION['logged_user']['login'] ?></a>
            <a class="btn btn-primary mr-sm-2" href="/logout.php">Выйти</a>
        <?php else : ?>
            <a class="btn btn-outline-primary mr-sm-2" href="/login.php">Войти</a>
            <a class="btn btn-primary" href="/signup.php">Регистрация</a>
        <?php endif; ?>
    </div>
</nav>