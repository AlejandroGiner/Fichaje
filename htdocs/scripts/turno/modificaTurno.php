<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">

    <link href="/css/theme.css" rel="stylesheet">
    <title>Turnos - Fichaje</title>
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