<?php

// * ROUTER

class Router
{
    private $routes;

    public function __construct()
    {
        // Подключаем routes
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    // Вернёт URI
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    // Аналазируем запрос и отдаём управление
    public function run()
    {
        // Получаем URI
        $uri = $this->getURI();

        // Ищем похожий запрос в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            // Сравниваем Паттерн пути и путь
            if (preg_match("~$uriPattern~", $uri)) {
                
                
                // Получаем внутренний путь из внешнего по правилу
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // Определяем controller, action, parameters
                $segments = explode('/', $internalRoute);
                
                // controller
                $controller = ucfirst(array_shift($segments)) . 'Controller';

                // action
                $action = 'action' . ucfirst(array_shift($segments));

                // parameters
                $parameters = $segments;

                // Подключаем класс controller
                $controllerFile = ROOT . '/controllers/' . $controller . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // Создаём объект и вызываем метод(action)
                $controllerObject = new $controller;
                $result = call_user_func_array(array($controllerObject, $action), $parameters);
                if ($result != null) {
                    break;
                }
            }
        }
    }
}
