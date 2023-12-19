<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

if($_SESSION['tipo_empleado']!=3){
    header('Location: /');
    exit();
}

if($_SERVER['PHP_SELF']=='/seguridad_admin.php'){
    header('Location: /404page.html');
    exit();
}
?>