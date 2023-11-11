<?php include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Turnos - Fichajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                    <td><input type="checkbox" class="form-check-input" name="plus"></td>
                    <td><button type="submit" value="Añadir" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>Añadir</button></td><td></td></tr>           
            </form>
            <?php 
            while ($row=$var_resultado->fetch_array())
            {
              print("<tr><td>".$row["hora_inicio"]."</td>");
              print("<td>".$row["hora_fin"]."</td>");
              print("<td>".$row["plus"]."</td>");
            ?>
            <td>
                <button type="button" class="btn btn-primary"
                data-bs-toggle="modal" data-bs-target="#modificarTurnosModal"
                data-bs-id-turno="<?php print($row["id_turno"])?>"
                data-bs-hora-inicio="<?php print($row["hora_inicio"])?>"
                data-bs-hora-fin="<?php print($row["hora_fin"]) ?>"
                data-bs-plus="<?php print($row["plus"]) ?>"><span class="glyphicon glyphicon-pencil"></span>Modificar</button>
            </td>
            <td>
                <form method="get" action="eliminaTurno.php">
                    <input type='hidden' name='id_turno' value='<?php echo $row["id_turno"]?>'>
                    <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Eliminar</button>
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
          ?>
        <div class="modal modal-lg fade" id="modificarTurnosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar turno</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="modificaTurno.php">
                        <div class="modal-body">
                            <input type="hidden" name="id_turno" id="id_turno">
                            <div class="row mb-3">
                                <label for="hora_inicio" class="col-sm-2 col-form-label">Hora inicio</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="time" name="hora_inicio" id="hora_inicio">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="hora_fin" class="col-sm-2 form-label">Hora fin</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="time" name="hora_fin" id="hora_fin">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="plus" class="col-sm-2 form-check-label">Plus</label>
                                <div class="col-sm-10">
                                    <input class="form-check-input" type="checkbox" name="plus" id="plus">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-block">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
            $var_resultado->close();
            $obj_conexion->close();
        }
        ?>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>