<?php
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/conn.php");

$update = "UPDATE turno_publicado SET id_empleado=? WHERE id_turno_publicado=?";

$stmt = $conn->prepare($update);
$stmt->bind_param('si',$_REQUEST['empleado'],$_REQUEST['id_turno_publicado']);
$stmt->execute();
$stmt->close();
$conn->close();

header('Location: ./');
?>