<?php

function connect(){

    $config = parse_ini_file($_SERVER['DOCUMENT_ROOT']."/../config.ini");

    $username = $config["username"];
    $passwd = $config["passwd"];
    $db = $config["db"];
    $hostname = $config["hostname"];
    $sqli = mysqli_connect($hostname,$username,$passwd,$db);
    $sqli->set_charset('utf8');
    return $sqli;
}
