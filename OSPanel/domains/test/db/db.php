<?php 

class Db
{
    public static function getConnection()
    {
        require 'rb.php';

        $stngsPath = 'config.php';
        $stngs = include($stngsPath);

        $db = "mysql:host={$stngs['host']};dbname={$stngs['dbname']}";

        R::setup($db, $stngs['user'], $stngs['password']);
    }
}