<?php
require "config.php";
?>
<nav class="navbar navbar-expand-xl navbar-light fixed-top bg-light">
    <a class="navbar-brand" href="/index.php"><?php echo $config['title'] ?></a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarSupportedContent" style="">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../pages/about.php">О проекте <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://vk.com/pechehka" target="_blank">Написать мне</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://vk.com/pechehka" target="_blank">Поддержка</a>
            </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
            <input class="form-control my-2 mr-sm-2" type="text" placeholder="Поиск" aria-label="Search">
            <button class="btn btn-outline-success my-2 mr-sm-2" type="submit">Поиск</button>
        </form>
        <?php
        if (isset($_SESSION['logged_user'])) : ?>
        <!-- Ссылка на профиль -->
            <a class="btn btn-outline-primary mr-sm-2" href="../pages/user_profile.php?id=<?php echo $_SESSION['logged_user']['id']; ?>">
                <div class="container">
                    <div class="row">
                        <div class="col" style="padding-left: 0px; padding-right: 0px;">
                            <img src="<?php echo "../images/users/" . $_SESSION['logged_user']['image']; ?>" alt="" style="height: 20px; width: 20px;">
                        </div>
                        <div class="col" style="padding-left: 12px; padding-right: 0px;">
                            <?php echo mb_substr($_SESSION['logged_user']['login'], 0, 10, 'utf-8') . '...' ?>
                        </div>
                    </div>
                </div>
            </a>
            <a class="btn btn-primary" href="/logout.php">Выйти</a>
        <?php else : ?>
            <a class="btn btn-outline-primary mr-sm-2" href="../login.php">Войти</a>
            <a class="btn btn-primary" href="../signup.php">Регистрация</a>
        <?php endif; ?>
    </div>
</nav>