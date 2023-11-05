<?php
function connect(){
    $usuario = "root";
    $paswd = "alejandro";
    $bd = "fichajesdb";
    $host = "mysql_fichaje";
    return mysqli_connect($host,$usuario,$paswd,$bd);
}
