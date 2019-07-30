<?php 

require "rb.php";

$con = include "/config.php";

// R::setup( 'mysql:host=192.168.0.104;dbname=mystackoverflow','root', '' );
R::setup('mysql:host=' . $con['host'] . ';dbname='. $con['name'] .','. $con['login'] . ','. $con['pass']);