<?php include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Fichaje - Departamentos</title>
  </head>
  <body>

  <?php
        include("../../header.php");
        include_once("../conn.php");
        $conn = connect();
        if(!$conn)
        {
          echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        }

        $insert = "INSERT INTO departamento (nombre,presupuesto) VALUES (?,?)";
        $stmt = $conn->prepare($insert);

        $stmt->bind_param('ss',$_REQUEST["nombre"],$_REQUEST["presupuesto"]);
        $stmt->execute();
            echo "<h3>Departamento creado correctamente.</h3>";
      ?>
              <table class="table table-striped">
              <tr><th>Nombre</th><th>Presupuesto</th></tr>
      <?php
            echo "<td>".$_REQUEST["nombre"]."</td>";
            echo "<td>".$_REQUEST["presupuesto"]."</td>";
            echo "</table>";
          $stmt->close();
          $conn->close();

           
      ?>
    
    <br>
    <a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span>Página principal</button>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>