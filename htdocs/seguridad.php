<?php
//Inicio la sesión
session_start();

//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
if(!isset($_SESSION['username'])){
    //si no existe, envio a la página de autentificacion
    header("Location: /login");
    //ademas salgo de este script
    exit();
}
?>