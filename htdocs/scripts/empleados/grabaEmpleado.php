<?php include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Fichaje - Turnos</title>
  </head>
  <body>

  <?php
        include($_SERVER['DOCUMENT_ROOT']."/header.php");
        include_once($_SERVER['DOCUMENT_ROOT']."/scripts/conn.php");
        $conn = connect();
        if(!$conn)
        {
          echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        }

        $insert = "INSERT INTO empleado (dni,nombre,apellido1,apellido2,id_categoria) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($insert);

        $stmt->bind_param('ssssi',$_REQUEST["dni"],$_REQUEST["nombre"],$_REQUEST["apellido1"],$_REQUEST["apellido2"],$_REQUEST["categoria"]);
        $stmt->execute();
            echo "<h3>Empleado dado de alta correctamente.</h3>";
      ?>
              <table class="table table-striped">
              <tr><th>DNI</th><th>Nombre</th><th>Apellido 1</th><th>Apellido 2</th></tr>
      <?php
            echo "<tr><td>".$_REQUEST["dni"]."</td>";
            echo "<td>".$_REQUEST["nombre"]."</td>";
            echo "<td>".$_REQUEST["apellido1"]."</td>";
            echo "<td>".$_REQUEST["apellido2"]."</td>";
            echo "</table>";
          $stmt->close();
          $conn->close();

           
      ?>
    
    <br>
    <a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span>Página principal</button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  </body>
</html>