<?php
/**
 * Функция занимается автозагрузкой классов.
 */
function  my_autoload($className)
{
    $paths_array = array(
        '/models/',
        '/components/'
    );

    foreach ($paths_array as $path) {
        $path = ROOT . $path . $className . '.php';
        if (is_file($path)) {
            include_once $path;
        }
    }
}
spl_autoload_register('my_autoload');