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
        include_once("conn.php");
        $obj_conexion = connect();
        if(!$obj_conexion)
        {
          echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        }
        $insercion = "INSERT INTO turno (hora_inicio,hora_fin,plus) VALUES (?,?,?)";
        $stmt = $obj_conexion->prepare($insercion);
        if(isset($_REQUEST["plus"])){
            $plus = b'1';
        } else {
            $plus = b'0';
        }

        $stmt->bind_param('ssi',$_REQUEST["hora_inicio"],$_REQUEST["hora_fin"],$plus);
        $stmt->execute();
            echo "<h3>Socio dado de alta correctamente.</h3>";
      ?>
              <table class="table table-striped">
              <tr><th>Hora de inicio</th><th>Hora de fin</th><th>Plus</th></tr>
      <?php
            echo "<tr><td>".$_REQUEST["hora_inicio"]."</td>";
            echo "<td>".$_REQUEST["hora_fin"]."</td>";
            echo "<td>".($plus ? 'Sí' : 'No')."</td>";
            echo "</table>";
          $stmt->close();
          $obj_conexion->close();

           
      ?>
    
    <br>
    <a href="..\index.php" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span> Página principal</button>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>