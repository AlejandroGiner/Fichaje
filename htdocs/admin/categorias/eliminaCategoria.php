<?php 
include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");
include ($_SERVER['DOCUMENT_ROOT']."/seguridad_admin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categorías - Fichaje</title>

    <?php include($_SERVER['DOCUMENT_ROOT']."/header.php"); ?>
</head>
<body>
    <?php
        include($_SERVER['DOCUMENT_ROOT']."/navbar.php");

        include_once($_SERVER['DOCUMENT_ROOT']."/scripts/conn.php");

        $delete = "DELETE FROM categoria WHERE id_categoria=".$_REQUEST["id_categoria"];
        $stmt = $conn->prepare($delete);

        $stmt->execute();
        print("<h3>Categoría eliminada correctamente.</h3>");
        $stmt->close();
        $conn->close();

           
      ?>
    
    <br>
    <a href="index.php" class="btn btn-primary">Página principal</button>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>