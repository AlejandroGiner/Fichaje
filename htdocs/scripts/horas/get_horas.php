<?php
include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");
include_once($_SERVER['DOCUMENT_ROOT']."/scripts/conn.php");

$conn = connect();

$filename = 'fichaje.csv';
#12345678A;2023-11-21;06:05:00;13:55:00
#22222222B;2023-11-21;06:00:00;14:05:00
$contents = file($filename);

foreach($contents as $line){
    list($uid, $fecha, $hora_entrada, $hora_salida) = explode(';',$line);
    $update = 'UPDATE turno_publicado SET hora_entrada_real=?, hora_salida_real=? WHERE id_empleado=? AND fecha=?';
    $stmt = $conn->prepare($update);
    $stmt->bind_param('ssss',$hora_entrada,$hora_salida,$uid,$fecha);
    $stmt->execute();
    
}

if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

?>