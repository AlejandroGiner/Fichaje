<?php

const MAX_SESSION_LENGTH_SECONDS = INF;

//Inicio la sesión
session_start();

//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
if(!isset($_SESSION['username'])){
    //si no existe, envio a la página de autentificacion
    header("Location: /login");
    //ademas salgo de este script
    exit();
}

$last_login = $_SESSION['last_login'];
$now = date('Y-n-j H:i:s');
$time_since_login = (strtotime($now)-strtotime($last_login));

if($time_since_login>=MAX_SESSION_LENGTH_SECONDS){
    session_destroy();
    header('Location: /login?session_expired');
    exit();
}
$_SESSION['last_login'] = $now;

if($_SERVER['PHP_SELF']=='/seguridad.php'){
    header('Location: /');
    exit();
}
?>