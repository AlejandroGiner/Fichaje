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

$conn = connect();
if(!$conn)
{
    print("<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>");
}