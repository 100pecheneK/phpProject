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

    <nav class="navbar navbar-expand-sm navbar-light bg-warning top">
        <a class="navbar-brand" href="/">MSTORE</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse links justify-content-end" id="navbarsExampleDefault">            
            <ul class="navbar-nav">
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
            </ul>
        </div>
    </nav>
    <main role="main" class="flex-shrink-0 m-0">
        <div class="container-fluid p-0">
            <div class="row w-100 min-vh-100">
                <div class="col-2 p-0 mbg-black">
                    <?php include ROOT . '/views/layouts/admin/admin_nav.php' ?>
                </div>
                <div class="col-10">