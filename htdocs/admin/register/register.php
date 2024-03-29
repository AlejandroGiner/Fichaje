<?php 
include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");
include ($_SERVER['DOCUMENT_ROOT']."/seguridad_admin.php");

//vemos si el usuario y contraseña es válido
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/conn.php");

$query = 'SELECT username FROM usuario_web WHERE username=?';
$stmt = $conn->prepare($query);
$stmt->bind_param('s',$_POST['username']);
$stmt->execute();
$stmt->store_result();
if($stmt->num_rows>0){
    header('Location: ./?user_exists');
    exit();
}
$stmt->close();

$id_empleado = '33333333Z';

$insert = "INSERT INTO usuario_web (username, password, id_empleado) VALUES (?,?,?)";
$stmt = $conn->prepare($insert);
$stmt->bind_param('sss',$_POST["username"],$password_hash,$id_empleado);

$password_hash = password_hash($_POST['passwd'],PASSWORD_BCRYPT);

$stmt->execute();
$stmt->close();
$conn->close();

header('Location: ./');
?>
