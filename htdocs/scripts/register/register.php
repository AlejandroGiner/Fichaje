<?php

//vemos si el usuario y contraseña es válido
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/conn.php");
$conn = connect();
if(!$conn)
{
    print("<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>");
}

$query = 'SELECT username FROM usuario_web WHERE username=?';
$stmt = $conn->prepare($query);
$stmt->bind_param('s',$_POST['username']);
$stmt->execute();
if($stmt->num_rows>0){
    header('Location: ./?user_exists');
    exit();
}
$stmt->close();



$insert = "INSERT INTO usuario_web (username, password) VALUES (?,?)";
$stmt = $conn->prepare($insert);
$stmt->bind_param('ss',$_POST["username"],$password_hash);

$password_hash = password_hash($_POST['passwd'],PASSWORD_BCRYPT);

$stmt->execute();
$stmt->close();
$conn->close();

header('Location: ./');
?>
