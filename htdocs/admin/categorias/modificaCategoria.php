<?php 
include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");
include ($_SERVER['DOCUMENT_ROOT']."/seguridad_admin.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Categorías - Fichaje</title>
  </head>
  <body>

  <?php
        include($_SERVER['DOCUMENT_ROOT']."/header.php");
        include_once($_SERVER['DOCUMENT_ROOT']."/scripts/conn.php");

        $update = "UPDATE categoria SET nombre=?, sueldo_base=?, id_departamento=? WHERE id_categoria=?";
        $stmt = $conn->prepare($update);

        $stmt->bind_param('ssii',$_REQUEST["nombre"],$_REQUEST["sueldo_base"],$_REQUEST["id_departamento"],$_REQUEST["id_categoria"]);
        $stmt->execute();
            echo "<h3>Categoría modificada correctamente.</h3>";
      ?>
              <table class="table table-striped">
              <tr><th>Nombre</th><th>Sueldo base</th><th>Departamento</th></tr>
      <?php
            echo "<td>".$_REQUEST["nombre"]."</td>";
            echo "<td>".$_REQUEST["sueldo_base"]."</td>";
            echo "<td>".$_REQUEST["id_departamento"]."</td>";
            echo "</table>";
          $stmt->close();
          $conn->close();

           
      ?>
    
    <br>
    <a href="index.php" class="btn btn-primary bi bi-house-door-fill"> Página principal</a>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>