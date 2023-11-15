<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/scripts/conn.php');
$conn = connect();

$query = 'SELECT * FROM categoria WHERE id_departamento = '.$id_departamento;
$result = $conn->query($query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC); 
mysqli_close($con);

?>

<option value="none" selected disabled hidden></option>
<?php foreach($rows as &$row){ ?>
    <option value='<?php print($row['id_categoria']); ?>'> <?php print($row['nombre']); ?> </option>
<?php } ?>