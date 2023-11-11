<?php include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Departamentos - Fichajes</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>