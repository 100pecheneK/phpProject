 <?php

// * FRONT CONTROLLER


// 1. Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// 2. Подключение файлов
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require_once(ROOT . '/components/Autoload.php');
// require_once(ROOT . '/components/Router.php');
// require_once(ROOT . '/components/Db.php');

// 4. Подключение к БД
Db::getConnection();

// 5. Вызов Router;
$router = new Router;
$router->run();
