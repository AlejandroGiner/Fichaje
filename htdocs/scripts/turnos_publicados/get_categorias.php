<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/scripts/conn.php');
$conn = connect();

$id_departamento = filter_input(INPUT_POST,'depto_id');

$query = 'SELECT * FROM categoria WHERE id_departamento='.$id_departamento;
$result = $conn->query($query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC); 
mysqli_close($conn);

?>

<option value="" selected disabled hidden></option>
<?php foreach($rows as &$row){ ?>
    <option value='<?php print($row['id_categoria']); ?>'><?php print($row['nombre']); ?></option>
<?php } ?>