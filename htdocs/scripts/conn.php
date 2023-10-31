<?php
function connect(){
    $usuario = "root";
    $paswd = "root";
    $bd = "fichajesdb";
    $host = "localhost";
    return mysqli_connect($host,$usuario,$paswd,$bd);
}