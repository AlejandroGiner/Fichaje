<?php include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Turnos publicados - CuándoLibro</title>
    
    <?php include($_SERVER['DOCUMENT_ROOT']."/header.php"); ?>
</head>
<body>
    <?php
        include($_SERVER['DOCUMENT_ROOT']."/navbar.php");

        include_once($_SERVER['DOCUMENT_ROOT']."/scripts/conn.php");

        $delete = "DELETE FROM turno_publicado WHERE id_turno_publicado="."'".$_REQUEST["id_turno_publicado_eliminar"]."'";
        $stmt = $conn->prepare($delete);

        $stmt->execute();
        print("<h3>Turno publicado eliminado correctamente.</h3>");
        $stmt->close();
        $conn->close();

           
      ?>
    
    <br>
    <a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span>Página principal</button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>