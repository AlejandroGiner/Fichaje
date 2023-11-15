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
                                <td><input class="form-control" type="text" name="nombre"></td>
                                <td><input class="form-control" type="text" name="presupuesto"></td>
                                <td><button type="submit" class="btn btn-info bi bi-plus-lg"> Añadir</button></td>
                                </tr>
                            </form>
                            <?php
                            while($row = $result->fetch_array()){
                                print("<td>".$row["nombre"]."</td>");
                                print("<td>".$row["presupuesto"]."</td>");
                                ?>
                                <td>
                                    <button type="button" class="btn btn-primary bi bi-pencil-square"
                                    data-bs-toggle='modal' data-bs-target='#modificarDepartamentoModal'
                                    data-bs-nombre='<?php print($row['nombre']); ?>'
                                    data-bs-presupuesto='<?php print($row['presupuesto']); ?>'
                                    data-bs-id-departamento='<?php print($row['id_departamento']); ?>'> Modificar</button>
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

                    <!-- MODAL modificarDepartamento -->
                    <div class="modal modal-lg fade" id="modificarDepartamentoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5">Modificar departamento</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action='modificaDepartamento.php'>
                                            <div class='modal-body'>
                                                <input type='hidden' name='id_departamento' id='id_departamento'>
                                                <div class='row form-floating mb-3'>
                                                    <input class='form-control' type='text' name='nombre' id='nombre' placeholder=''>
                                                    <label for='nombre' class='col-sm-2 form-label'>Nombre</label>
                                                </div>
                                                <div class='row form-floating mb-3'>
                                                    <input class='form-control' type='text' name='presupuesto' id='presupuesto' placeholder=''>
                                                    <label for="presupuesto" class="col-sm-2 form-label">Presupuesto</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </table>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src='/js/modalDepartamento.js'></script>

</body>
</html>