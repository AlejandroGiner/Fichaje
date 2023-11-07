<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Departamentos - Fichajes</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">

    <link href="/css/theme.css" rel="stylesheet">

    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <?php
        include($_SERVER['DOCUMENT_ROOT']."/header.php");
    ?>
    
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <h2>Departamentos</h2>
            </div>

            <?php
                require_once($_SERVER['DOCUMENT_ROOT'].'/scripts/conn.php');
                $conn = connect();
                if(!$conn){
                    print("<h3>Fallo de conexión SQL.</h3><hr><br>");
                }
                else{
                    $query = "select * from departamento";
                    $result = $conn->query($query);
                        ?>
                        <table class="table table-striped">
                            <tr>
                                <th>Nombre</th>
                                <th>Presupuesto</th>
                            </tr>
                            <form method="get" action="./grabaDepartamento.php">
                                <tr>
                                <td><input type="text" name="nombre"></td>
                                <td><input type="text" name="presupuesto"></td>
                                <td><button type="submit" class="btn btn-info bi bi-plus-lg"> Añadir</button></td>
                                </tr>
                            </form>
                            <?php
                            while($row = $result->fetch_array()){
                                print("<td>".$row["nombre"]."</td>");
                                print("<td>".$row["presupuesto"]."</td>");
                                ?>
                                <td>
                                    <form action="#">
                                        <input type="hidden" name="id_departamento" value='<?php print($row["id_departamento"])?>)'>
                                        <input type="hidden" name="nombre" value='<?php print($row["nombre"])?>)'>
                                        <input type="hidden" name="presupuesto" value='<?php print($row["presupuesto"])?>)'>
                                        <button type="submit" class="btn btn-primary bi bi-pencil-square"> Modificar</button>

                                    </form>
                                </td>
                                <td>
                                    <form method="get" action="./eliminaDepartamento.php">
                                        <input type="hidden" name="id_departamento" value='<?php print($row["id_departamento"])?>'>
                                        <button type="submit" class="btn btn-danger bi bi-trash"> Eliminar</button>
                                    </form>
                                </td>
                                </tr>

                                <?php

                            }
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