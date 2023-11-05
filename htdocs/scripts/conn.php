<?php

function connect(){

    $config = parse_ini_file($_SERVER['DOCUMENT_ROOT']."/../config.ini");

    $username = $config["username"];
    $passwd = $config["passwd"];
    $db = $config["db"];
    $hostname = $config["hostname"];
    return mysqli_connect($hostname,$username,$passwd,$db);
}
