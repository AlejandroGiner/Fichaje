<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Turnos - Fichajes</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">

    <link href="/css/theme.css" rel="stylesheet">
</head>
<body>
    <!-- Fixed navbar -->
    <?php
        include($_SERVER['DOCUMENT_ROOT']."/header.php");
    ?>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading text-center"><h2>Turnos</h2></div>

            <?php
                require_once($_SERVER['DOCUMENT_ROOT'].'/scripts/conn.php');
                $obj_conexion = connect();

                if(!$obj_conexion)
        {
          echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        }
      
        else
        {

                $var_consulta= "select * from turno";
                $var_resultado = $obj_conexion->query($var_consulta);

                if($var_resultado->num_rows>0)
                { 
            ?>
            <table class="table table-striped">
            <tr><th>Hora inicio</th><th>Hora fin</th><th>Plus</th></tr>
            <form method="get" action="/scripts/turno/grabaTurno.php">
                <tr><td><input type="time" name="hora_inicio"></td>
                    <td><input type="time" name="hora_fin"></td>
                    <td><input type="checkbox" name="plus"></td>
                    <td><button type="submit" value="Añadir" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Añadir</button></td><td></td></tr>           
            </form>
            <?php 
            while ($var_fila=$var_resultado->fetch_array())
            {
              echo("<tr><td>".$var_fila["hora_inicio"]."</td>");
              echo("<td>".$var_fila["hora_fin"]."</td>");
              echo("<td>".$var_fila["plus"]."</td>");
            ?>
            <td>
            <form method="get" action="\scripts\modificaSocio.php">
            <input type='hidden' name='hora_inicio' value='<?php echo $var_fila["hora_inicio"]?>'>
            <input type='hidden' name='hora_fin' value='<?php echo $var_fila["hora_fin"]?>'>
            <input type='hidden' name='plus' value='<?php echo $var_fila["plus"]?>'>
            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Modificar</button>
            </form>
            </td>
            <td>
            <form method="get" action="\scripts\borraSocio.php">
            <input type='hidden' name='socioID' value='<?php echo $var_fila["socioID"]?>'>
            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Eliminar</button>
            </form>
            </td>
            </tr>

            <?php
            }
          }
          else
          {
            echo("<tr><td>");
            echo "No hay Registros en la BBDD</td>";
            echo("</td>");
          }
          $var_resultado->close();
	        $obj_conexion->close();
        }
        ?>
            </table>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>