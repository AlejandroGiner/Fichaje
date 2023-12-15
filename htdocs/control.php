<?php
session_start();

//vemos si el usuario y contraseña es válido
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/conn.php");

$query = "SELECT password FROM usuario_web WHERE username=?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s',$_POST["username"]);
$stmt->execute();
$stmt->bind_result($stored_hash);
$stmt->fetch();
$stmt->close();
$conn->close();

if ($stored_hash!=null && password_verify($_POST['passwd'],$stored_hash)){
    //usuario y contraseña válidos
    $_SESSION['username']= $_POST["username"];
    $_SESSION['last_login'] = date('Y-n-j H:i:s');
    }

if (isset($_SESSION['username'])){
    header ("Location: /");
} else {
    //si no existe le mando otra vez a la portada
    header("Location: /login?login_error");
}
?>
