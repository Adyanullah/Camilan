<?php
define("BASEURL", "http://localhost/Camilan-main/rpl/");
define("BASEPATH", $_SERVER["DOCUMENT_ROOT"] . "/Camilan-main/rpl/");
function connect($host, $db, $user, $password)
{
    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        return new PDO($dsn, $user, $password, $options);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
session_start();
return define("DB", connect('localhost', 'db_camilan', 'root', ''));
