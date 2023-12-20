<?php
session_start();

//vemos si el usuario y contraseña es válido
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/conn.php");

$password_query = "SELECT password FROM usuario_web WHERE username=?";
$stmt = $conn->prepare($password_query);
$stmt->bind_param('s',$_POST["username"]);
$stmt->execute();
$stmt->bind_result($stored_hash);
$stmt->fetch();
$stmt->close();

if ($stored_hash!=null && password_verify($_POST['passwd'],$stored_hash)){
    //usuario y contraseña válidos
    $_SESSION['username']= $_POST["username"];
    $_SESSION['last_login'] = date('Y-n-j H:i:s');
    
    $data_query = 'SELECT e.id_tipo_empleado, e.nombre, e.dni FROM usuario_web u JOIN empleado e ON (u.id_empleado=e.dni) WHERE u.username=?';
    $stmt = $conn->prepare($data_query);
    $stmt->bind_param('s',$_POST['username']);
    $stmt->execute();
    $stmt->bind_result($_SESSION['tipo_empleado'], $_SESSION['nombre'], $_SESSION['dni']);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    setcookie('username',$_SESSION['username']);
    
    header("Location: /");
}
else {
    //si no existe le mando otra vez a la portada
    $conn->close();
    header("Location: /login?login_error");
}
?>
