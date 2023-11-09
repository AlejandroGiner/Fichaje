<?php include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">

    <link href="/css/theme.css" rel="stylesheet">
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

        $update = "UPDATE empleado SET dni=?, nombre=?, apellido1=?, apellido2=?, id_categoria=? WHERE dni=?";
        $stmt = $conn->prepare($update);

        $stmt->bind_param('ssssis',$_REQUEST["dni"],$_REQUEST["nombre"],$_REQUEST["apellido1"],$_REQUEST["apellido2"],$_REQUEST["categoria"],$_REQUEST["dni"]);
        $stmt->execute();
            echo "<h3>Empleado modificado correctamente.</h3>";
      ?>
              <table class="table table-striped">
              <tr><th>DNI</th><th>Nombre</th><th>Apellido 1</th><th>Apellido 2</th><th>Categoría</th></tr>
      <?php
            echo "<tr><td>".$_REQUEST["dni"]."</td>";
            echo "<td>".$_REQUEST["nombre"]."</td>";
            echo "<td>".$_REQUEST["apellido1"]."</td>";
            echo "<td>".$_REQUEST["apellido2"]."</td>";
            echo "<td>".$_REQUEST["categoria"]."</td>";
            echo "</table>";
          $stmt->close();
          $conn->close();

           
      ?>
    
    <br>
    <a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span>Página principal</button>
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