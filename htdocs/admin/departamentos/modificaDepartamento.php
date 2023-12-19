<?php 
include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");
include ($_SERVER['DOCUMENT_ROOT']."/seguridad_admin.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <?php include($_SERVER['DOCUMENT_ROOT']."/header.php"); ?>
    <title>Fichaje - Departamentos</title>
  </head>
  <body>

  <?php
        include($_SERVER['DOCUMENT_ROOT']."/navbar.php");
        require_once($_SERVER['DOCUMENT_ROOT'].'/scripts/conn.php');

        $update = "UPDATE departamento SET nombre=?, presupuesto=? WHERE id_departamento=?";
        $stmt = $conn->prepare($update);

        $stmt->bind_param('ssi',$_REQUEST["nombre"],$_REQUEST["presupuesto"],$_REQUEST["id_departamento"]);
        $stmt->execute();
            echo "<h3>Departamento modificado correctamente.</h3>";
      ?>
              <table class="table table-striped">
              <tr><th>Nombre</th><th>Presupuesto</th><th>ID departamento</th></tr>
      <?php
            echo "<td>".$_REQUEST["nombre"]."</td>";
            echo "<td>".$_REQUEST["presupuesto"]."</td>";
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