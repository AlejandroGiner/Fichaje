<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/scripts/conn.php');

$id_categoria = filter_input(INPUT_POST,'id_categoria');

$query = 'SELECT * FROM empleado WHERE id_categoria='.$id_categoria;
$result = $conn->query($query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC); 
mysqli_close($conn);

?>

<option value="none" selected disabled hidden></option>
<?php foreach($rows as &$row){ ?>
    <option value='<?php print($row['dni']); ?>'><?php print($row['nombre'].' '.$row['apellido1'].($row['apellido2']?' '.$row['apellido2']:'')); ?></option>
<?php } ?>