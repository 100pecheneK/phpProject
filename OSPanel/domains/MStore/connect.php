<?php
require ROOT . '/libs/rb.php';

$stngsPath = ROOT . '/config/dbConfig.php';
$stngs = include($stngsPath);

$db = "mysql:host={$stngs['host']};dbname={$stngs['dbname']}";

R::setup($db, $stngs['user'], $stngs['password']);
