<?php include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categorías - Fichajes</title>
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
                <h2>Categorías</h2>
            </div>

            <?php
                require_once($_SERVER['DOCUMENT_ROOT'].'/scripts/conn.php');

                    $deptos_query = "select * from departamento";
                    $deptos_result = $conn->query($deptos_query);
                    $deptos = $deptos_result->fetch_all(MYSQLI_BOTH);

                    $query = "select * from categoria";
                    $result = $conn->query($query);
                        ?>
                        <div class="table-responsive">

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Categoría</th>
                                    <th scope="col">Sueldo base</th>
                                    <th scope="col">Sueldo plus</th>
                                    <th scope="col">Departamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <form method="get" action="./grabaCategoria.php">
                                        <td><input class="form-control" type="text" name="nombre"></td>
                                        <td><input class="form-control" type="text" name="sueldo_base"></td>
                                        <td><input class="form-control" type="text" disabled></td>
                                        <td><select class="form-select" name="id_departamento" id="id_departamento">
                                            <option value="none" selected disabled hidden></option> 
    
                                            <?php
                                                foreach($deptos as &$depto){
                                                    ?>
                                                    <option value="<?php print($depto['id_departamento'])?>"><?php print($depto['nombre']) ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select></td>
                                        <td><button type="submit" class="btn btn-info bi bi-plus-lg"> Añadir</button></td>
                                    </form>
                                </tr>
                                <?php
                                while($row = $result->fetch_array()){
                                    print("<tr><td>".$row["nombre"]."</td>");
                                    print("<td>".$row["sueldo_base"]."</td>");
                                    print("<td>".$row["sueldo_plus"]."</td>");
                                    print("<td>".$row["id_departamento"]."</td>");
                                    ?>
                                    <td>
                                        <button type="button" class="btn btn-primary bi bi-pencil-square" 
                                        data-bs-toggle="modal" data-bs-target="#modificarCategoriasModal"
                                        data-bs-id-categoria='<?php print($row['id_categoria']); ?>'
                                        data-bs-nombre="<?php print($row['nombre']); ?>" 
                                        data-bs-sueldo-base="<?php print($row['sueldo_base']); ?>"
                                        data-bs-departamento="<?php print($row['id_departamento']); ?>">
                                            Modificar
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger bi bi-trash"
                                            data-bs-toggle="modal" data-bs-target="#eliminarCategoriasModal"
                                            data-bs-id-categoria="<?php print($row['id_categoria']); ?>">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            </tbody>

                                <?php

                            }

                            ?>
                            

                        <?php
                        $result->close();
                        $conn->close();
                    ?>
                        </table>
                        </div>
                    <!-- MODAL modificarCategorias -->
                    <div class="modal modal-lg fade" id="modificarCategoriasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5">Modificar categoría</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="modificaCategoria.php">
                                            <div class="modal-body">
                                                <input type="hidden" name="id_categoria" id="id_categoria">
                                                <div class="row form-floating mb-3">
                                                    <input class="form-control" type="text" name="nombre" id="nombre" placeholder="">
                                                    <label for="nombre" class="col-sm-2 form-label">Nombre</label>
                                                </div>
                                                <div class="row form-floating mb-3">
                                                    <input class="form-control" type="text" name="sueldo_base" id="sueldo_base" placeholder="">
                                                    <label for="sueldo_base" class="col-sm-2 form-label">Sueldo base</label>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="categoria" class="col-sm-2 form-label">Departamento</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select" name="id_departamento" id="id_departamento">
                                                            <?php
                                                                foreach($deptos as &$depto){
                                                                    ?>
                                                                    <option value="<?php print($depto['id_departamento']) ?>"><?php print($depto['nombre']) ?></option>
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

                            <!-- MODAL Eliminar categorias -->
                            <div class="modal fade" id="eliminarCategoriasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5">Eliminar categoría</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="eliminaCategoria.php">
                                            <div class="modal-body">
                                                <p>¿Estás seguro?</p>
                                                <input class="form-control" type="hidden" name="id_categoria" id="id_categoria_eliminar">
                                            </div>
                                        
                                        
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Sí</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src='/js/modalCategoria.js'></script>
</body>
</html>