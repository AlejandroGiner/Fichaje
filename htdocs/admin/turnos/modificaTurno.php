<?php 
include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");
include ($_SERVER['DOCUMENT_ROOT']."/seguridad_admin.php");
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Turnos - Fichaje</title>
  </head>
  <body>

  <?php
        include("../../header.php");
        include_once("../conn.php");

        $update = "UPDATE turno SET hora_inicio=?, hora_fin=?, plus=? WHERE id_turno=?";
        $stmt = $conn->prepare($update);

        if(isset($_REQUEST["plus"])){
            $plus = b'1';
        } else {
            $plus = b'0';
        }

        $stmt->bind_param('ssii',$_REQUEST["hora_inicio"],$_REQUEST["hora_fin"],$plus,$_REQUEST["id_turno"]);
        $stmt->execute();
            echo "<h3>Turno modificado correctamente.</h3>";
      ?>
              <table class="table table-striped">
              <tr><th>Hora inicio</th><th>Hora fin</th><th>Plus</th></tr>
      <?php
            echo "<tr><td>".$_REQUEST["hora_inicio"]."</td>";
            echo "<td>".$_REQUEST["hora_fin"]."</td>";
            echo "<td>".$plus."</td>";
            echo "</table>";
          $stmt->close();
          $conn->close();

           
      ?>
    
    <br>
    <a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span>Página principal</button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>