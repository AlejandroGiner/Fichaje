<?php
session_start();

//vemos si el usuario y contraseña es válido
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/conn.php");
$conn = connect();
if(!$conn)
{
    print("<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>");
}

$received_hash = $_POST["passwd"]; // TODO

$query = "SELECT password FROM usuario_web WHERE username=?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s',$_POST["username"]);
$stmt->execute();
$stmt->bind_result($stored_hash);
$stmt->fetch();
$stmt->close();
$conn->close();

if ($stored_hash!=null && $stored_hash==$received_hash){
    //usuario y contraseña válidos
    $_SESSION['username']= $_POST["username"];
}

if (isset($_SESSION['username'])){
    header ("Location: scripts/empleados");
} else {
    //si no existe le mando otra vez a la portada
    header("Location: /login/index.php?login_error");
}


?>