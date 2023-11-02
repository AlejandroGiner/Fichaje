<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fichajes</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">

    <link href="/css/theme.css" rel="stylesheet">
</head>
<body>
    <?php
        include("../../header.php");
        ?>

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <h2>Empleados</h2>
            </div>

            <?php
                require_once('../conn.php');
                $conn = connect();
                if(!$conn){
                    print("<h3>Fallo de conexión SQL.</h3><hr><br>");
                }
                else{
                    $query = "select * from empleado";
                    $result = $conn->query($query);
                    #if($result->num_rows > 0){
                        ?>
                        <table class="table table-striped">
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Apellido 1</th>
                                <th>Apellido 2</th>
                            </tr>
                            <form method="get" action="./grabaEmpleado.php">
                                <tr>
                                    <td><input type="text" name="dni"></td>
                                    <td><input type="text" name="nombre"></td>
                                    <td><input type="text" name="apellido1"></td>
                                    <td><input type="text" name="apellido2"></td>
                                    <td><button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-plus">Añadir</span></button></td>
                                </tr>
                            </form>
                            <?php
                            while($row = $result->fetch_array()){
                                ?>
                                <div class="modal fade" id="modificarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar empleado</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#">
                                                    <input type="text" name="dni" value='<?php print($row["dni"])?>)'>
                                                    <input type="text" name="nombre" value='<?php print($row["nombre"])?>)'>
                                                    <input type="text" name="apellido1" value='<?php print($row["apellido1"])?>)'>
                                                    <input type="text" name="apellido2" value='<?php print($row["apellido2"])?>)'>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                print("<tr><td>".$row["dni"]."</td>");
                                print("<td>".$row["nombre"]."</td>");
                                print("<td>".$row["apellido1"]."</td>");
                                print("<td>".$row["apellido2"]."</td>");
                                ?>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modificarModal"><span class="glyphicon glyphicon-plus">Modificar</span></button>
                                </td>
                                <td>
                                    <form method="get" action="./eliminaEmpleado.php">
                                        <input type="hidden" name="dni" value='<?php print($row["dni"])?>'>
                                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Eliminar</button>
                                    </form>
                                </td>
                                </tr>

                                <?php

                            }
                        #}
                        #else{
                        #    print("<tr><td>");
                        #    print("No hay registros en la BBDD</td>");
                        #    print("</tr>");
                        #}
                        $result->close();
                        $conn->close();
                    }
                    ?>
                        </table>


        </div>
    </div>


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