<?php include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empleados - Fichajes</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">

    <link href="/css/theme.css" rel="stylesheet">
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
                $conn = connect();
                if(!$conn){
                    print("<h3>Fallo de conexión SQL.</h3><hr><br>");
                }
                else{
                    $deptos_query = "select * from departamento";
                    $deptos_result = $conn->query($deptos_query);
                    $deptos = $deptos_result->fetch_all(MYSQLI_BOTH);

                    $query = "select * from categoria";
                    $result = $conn->query($query);
                        ?>
                        <div class="table-responsive">

                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Categoría</th>
                                <th>Sueldo base</th>
                                <th>Sueldo plus</th>
                                <th>Departamento</th>
                            </tr>
                            <form method="get" action="./grabaCategoria.php">
                                <tr>
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
                                    <td><button type="submit" class="btn btn-info">Añadir</button></td>
                                </tr>
                            </form>
                            <?php
                            while($row = $result->fetch_array()){
                                print("<td>".$row["nombre"]."</td>");
                                print("<td>".$row["sueldo_base"]."</td>");
                                print("<td>".$row["sueldo_plus"]."</td>");
                                print("<td>".$row["id_departamento"]."</td>");
                                ?>
                                <td>
                                    <button type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#modificarCategoriasModal">
                                        Modificar
                                    </button>
                                </td>
                                <td>
                                <button type="button" class="btn btn-danger"
                                    data-bs-toggle="modal" data-bs-target="#eliminarCategoriasModal"
                                    data-bs-id-categoria="<?php print($row['id_categoria']); ?>">
                                    Eliminar
                                </button>
                                </td>
                                </tr>

                                <?php

                            }

                            ?>
                            <!-- MODAL modificarEmpleado -->
                            <div class="modal modal-lg fade" id="modificarCategoriasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5">Modificar categoría</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="modificaCategoria.php">
                                            <div class="modal-body">
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
                                                        <select class="form-select" name="categoria" id="categoria">
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

                        <?php
                        $result->close();
                        $conn->close();
                    }
                    ?>
                        </table>
                        </div>
        </div>
    </div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/docs.min.js"></script>
    <script src="/js/modalCategoria.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>