<!doctype html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="/template/css/bootstrap.css">
    <link rel="stylesheet" href="/template/css/icons/css/all.min.css">
    <link rel="stylesheet" href="/template/css/my.css">

    <title>MSTORE</title>
</head>

<body class="bg-light d-flex flex-column h-100">

    <nav class="navbar navbar-expand-sm navbar-light bg-warning fixed-top">
        <a class="navbar-brand" href="/">MSTORE</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse links" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <div class="btn-group">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Категории
                        </a>
                        <div class="dropdown-menu">
                            <a href="/catalog" class="dropdown-item orange">Все категории</a>
                            <?php foreach ($categories as $categorie) : ?>
                                <?php
                                $activeCategory = false;
                                if (isset($categoryId)) {
                                    if ($categoryId == $categorie->id) {
                                        $activeCategory = true;
                                    }
                                } ?>
                                <a href="/category/<?= $categorie->id ?>" class="dropdown-item">
                                    <div class="row">
                                        <div class="col-1 p-0">
                                            <?php if ($activeCategory) : ?>
                                                <i class="fas fa-check"></i>
                                            <?php endif ?>
                                        </div>
                                        <div class="col-11 p-0 pl-2">
                                            <?= $categorie->name ?>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/cart/" class="nav-link"><i class="fas fa-shopping-cart"></i> Корзина (<span id="cart-count"><?= Cart::countPoducts() ?></span>)</a>
                </li>
                <?php if (User::isGuest()) : ?>
                    <li class="nav-item">
                        <a href="/user/register" class="nav-link"><i class="fas fa-user-plus"></i> Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a href="/user/login" class="nav-link"><i class="fas fa-sign-in-alt"></i> Вход</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <div class="btn-group">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i> Аккаунт</a>
                            <div class="dropdown-menu">
                                <a href="/account" class="dropdown-item">Аккаунт</a>
                                <a href="/account/settings" class="dropdown-item">Настройки</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="/user/logout" class="nav-link"><i class="fas fa-sign-out-alt cl-effect-3"></i> Выход</a>
                    </li>
                    <?php if (AdminBase::checkHeaderAdmin()):?>
                    <li class="nav-item">
                        <a href="/admin" class="nav-link settings_icon"><i class="fas fa-cog"></i> Администрирование</a>
                    </li>
                    <?php endif ?>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <main role="main" class="flex-shrink-0">