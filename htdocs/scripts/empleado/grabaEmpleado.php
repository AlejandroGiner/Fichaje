<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <title>Fichaje - Turnos</title>
  </head>
  <body>

  <?php
        include_once("../conn.php");
        $conn = connect();
        if(!$conn)
        {
          echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        }

        $insert = "INSERT INTO empleado (dni,nombre,apellido1,apellido2) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($insert);

        $stmt->bind_param('ssss',$_REQUEST["dni"],$_REQUEST["nombre"],$_REQUEST["apellido1"],$_REQUEST["apellido2"]);
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
    <a href="empleados.php" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span>Página principal</button>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>