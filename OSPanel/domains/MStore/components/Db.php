<?php
/**
 * Занимается созданием подключения к БД.
 */
class Db
{
    /**
     * Создаёт подключение к БД используя библиотеку RBPHP.
     */
    public static function getConnection()
    {
        require ROOT . '/libs/rb.php';

        $stngsPath = ROOT . '/config/dbConfig.php';
        $stngs = include($stngsPath);

        $db = "mysql:host={$stngs['host']};dbname={$stngs['dbname']}";

        R::setup($db, $stngs['user'], $stngs['password']);
    }
}
