<?php include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empleados - Fichajes</title>

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
                <h2>Empleados</h2>
            </div>

            <?php
                require_once($_SERVER['DOCUMENT_ROOT'].'/scripts/conn.php');
                $conn = connect();
                if(!$conn){
                    print("<h3>Fallo de conexión SQL.</h3><hr><br>");
                }
                else{
                    $deptos_query = "select * from departamento";
                    $deptos_result = $conn->query($deptos_query);
                    $deptos = $deptos_result->fetch_all(MYSQLI_BOTH);

                    $query = "select * from empleado_completo";
                    $result = $conn->query($query);
                        ?>
                        <div class="table-responsive">

                        <table class="table table-striped table-hover">
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Apellido 1</th>
                                <th>Apellido 2</th>
                                <th>Departamento</th>
                                <th>Categoría</th>
                            </tr>
                            <form method="get" action="./grabaEmpleado.php">
                                <tr>
                                    <td><input class="form-control" type="text" name="dni"></td>
                                    <td><input class="form-control" type="text" name="nombre"></td>
                                    <td><input class="form-control" type="text" name="apellido1"></td>
                                    <td><input class="form-control" type="text" name="apellido2"></td>
                                    <td><input class="form-control" type="text" name="departamento" readonly></td>
                                    <td><select class="form-select" name="categoria" id="categoria1">
                                        <option value="none" selected disabled hidden></option> 
                                        <?php
                                            foreach($deptos as &$depto){

                                                $cats = $conn->query("select * from categoria where id_departamento=".$depto['id_departamento']);
                                                ?>
                                                <optgroup label="Departamento: <?php print($depto["nombre"])?>">
                                                    
                                                <?php
                                                    while($categoria = $cats->fetch_array()){
                                                        ?>
                                                        <option data-bs-departamento="<?php print($depto['nombre'])?>" value="<?php print($categoria['id_categoria']) ?>"><?php print($categoria['nombre']) ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </optgroup>
                                            <?php
                                            }
                                        ?>
                                    </select></td>
                                    <td><button type="submit" class="btn btn-info bi bi-plus-lg"> Añadir</button></td>
                                </tr>
                            </form>
                            <?php
                            while($row = $result->fetch_array()){
                                print("<tr><td>".$row["dni"]."</td>");
                                print("<td>".$row["nombre"]."</td>");
                                print("<td>".$row["apellido1"]."</td>");
                                print("<td>".$row["apellido2"]."</td>");
                                print("<td>".$row["departamento"]."</td>");
                                print("<td>".$row["categoria"]."</td>");
                                ?>
                                <td>
                                    <nobr><button type="button" class="btn btn-primary bi bi-pencil-square"
                                    data-bs-toggle="modal" data-bs-target="#modificarEmpleadosModal"
                                    data-bs-dni="<?php print($row["dni"])?>"
                                    data-bs-nombre="<?php print($row["nombre"]) ?>"
                                    data-bs-apellido1="<?php print($row["apellido1"]) ?>"
                                    data-bs-apellido2="<?php print($row["apellido2"]) ?>"
                                    data-bs-categoria="<?php print($row["id_categoria"]) ?>"> Modificar</button></nobr>
                                </td>
                                <td>
                                    <nobr><button type="button" class="btn btn-danger bi bi-trash"
                                    data-bs-toggle="modal" data-bs-target="#eliminarEmpleadosModal"
                                    data-bs-dni="<?php print($row["dni"])?>"> Eliminar</button></nobr>
                                </td>
                                </tr>

                                <?php

                            }

                            ?>
                            <!-- MODAL modificarEmpleado -->
                            <div class="modal modal-lg fade" id="modificarEmpleadosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5">Modificar empleado</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="modificaEmpleado.php">
                                            <div class="modal-body">
                                                <div class="row form-floating mb-3">
                                                    <input class="form-control" type="text" name="dni" id="dni" placeholder="" readonly>
                                                    <label for="dni" class="col-sm-2 form-label">DNI</label>
                                                </div>
                                                <div class="row form-floating mb-3">
                                                    <input class="form-control" type="text" name="nombre" id="nombre" placeholder="">
                                                    <label for="nombre" class="col-sm-2 form-label">Nombre</label>
                                                </div>
                                                <div class="row form-floating mb-3">
                                                    <input class="form-control" type="text" name="apellido1" id="apellido1" placeholder="">
                                                    <label for="apellido1" class="col-sm-2 form-label">Apellido 1</label>
                                                </div>
                                                <div class="row form-floating mb-3">
                                                    <input class="form-control" type="text" name="apellido2" id="apellido2" placeholder="">
                                                    <label for="apellido2" class="col-sm-2 form-label">Apellido 2</label>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="categoria" class="col-sm-2 form-label">Categoría</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select" name="categoria" id="categoria">
                                                            <?php
                                                                foreach($deptos as &$depto){

                                                                    $cats = $conn->query("select * from categoria where id_departamento=".$depto['id_departamento']);
                                                                    ?>
                                                                    <optgroup label="Departamento: <?php print($depto["nombre"])?>">
                                                                    <?php
                                                                        while($categoria = $cats->fetch_array()){
                                                                            ?>
                                                                            <option value="<?php print($categoria['id_categoria']) ?>"><?php print($categoria['nombre']) ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </optgroup>
                                                                <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
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

                            <!-- MODAL Eliminar empleado -->
                            <div class="modal fade" id="eliminarEmpleadosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5">Eliminar empleado</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="eliminaEmpleado.php">
                                            <div class="modal-body">
                                                <p>Seguro?</p>
                                                <input class="form-control" type="hidden" name="dni" id="eliminardni">
                                            </div>
                                        
                                        
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Sí</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <?php
                        $result->close();
                        $conn->close();
                    }
                    ?>
                        </table>
                        </div>
        </div>
    </div>




    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src='/js/modalModificarEmpleado.js'></script>
    

</body>
</html>