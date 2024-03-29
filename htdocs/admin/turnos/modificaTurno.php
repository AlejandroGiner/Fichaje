<?php 
include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");
include ($_SERVER['DOCUMENT_ROOT']."/seguridad_admin.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <?php include($_SERVER['DOCUMENT_ROOT']."/header.php"); ?>
    <title>Turnos - Fichaje</title>
  </head>
  <body>

  <?php
        include($_SERVER['DOCUMENT_ROOT']."/navbar.php");
        require_once($_SERVER['DOCUMENT_ROOT'].'/scripts/conn.php');

        $update = "UPDATE turno SET nombre=?, hora_inicio=?, hora_fin=?, plus=? WHERE id_turno=?";
        $stmt = $conn->prepare($update);

        if(isset($_REQUEST["plus"])){
            $plus = b'1';
        } else {
            $plus = b'0';
        }

        $stmt->bind_param('sssii',$_REQUEST["nombre"],$_REQUEST["hora_inicio"],$_REQUEST["hora_fin"],$plus,$_REQUEST["id_turno"]);
        $stmt->execute();
            echo "<h3>Turno modificado correctamente.</h3>";
      ?>
              <table class="table table-striped">
              <tr><th>Nombre</th><th>Hora inicio</th><th>Hora fin</th><th>Plus</th></tr>
      <?php
            echo "<tr><td>".$_REQUEST["nombre"]."</td>";
            echo "<td>".$_REQUEST["hora_inicio"]."</td>";
            echo "<td>".$_REQUEST["hora_fin"]."</td>";
            echo "<td>".$plus."</td>";
            echo "</table>";
          $stmt->close();
          $conn->close();

           
      ?>
    
    <br>
    <a href="index.php" class="btn btn-primary bi bi-house-door-fill"> Página principal</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>