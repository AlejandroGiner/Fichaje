<?php include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fichajes</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>
<body>
    <!-- Fixed navbar -->
    <?php
        include($_SERVER['DOCUMENT_ROOT']."/header.php");
    ?>

    <button class='btn btn-lg btn-primary' data-bs-toggle='modal' data-bs-target='#nuevoTurnoPublicadoModal'>Publicar turnos</button>

    <?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/scripts/conn.php');
    $conn = connect();
    $query = "select * from turno_publicado_completo";
    $result = $conn->query($query);

    ?>
    <div class="table-responsive">
        <table class="table table-striped table-hover">

            <thead>
                <tr>
                    <th>Turno</th>
                    <th>Departamento</th>
                    <th>Categoría</th>
                    <th>Fecha</th>
                    <th>Empleado</th>
                </tr>
            </thead>

            <tbody>
                <?php

                while($row = $result->fetch_array()){
                    print("<tr><td>".$row["turno"]."</td>");
                    print("<td>".$row["departamento"]."</td>");
                    print("<td>".$row["categoria"]."</td>");
                    print("<td>".$row["fecha"]."</td>");
                    print('<td>'.(array_key_exists('empleado',$row)?$row['empleado']:'Sin asignar').'</td>');
                }
                
                ?>
                </tr>
            </tbody>

        </table>


        <!-- MODAL nuevoTurnoPublicado -->
        <div class="modal modal-lg fade" id="nuevoTurnoPublicadoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Publicar turnos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="grabaTurnoPublicado.php">
                        <div class="modal-body">
                            <div class="row form-floating mb-3">
                                <label for="turno" class="form-label">Turno</label>
                                <select class="form-select" name="turno" id="turno">
                                <?php
                                $turnos_query = "select * from turno";
                                $turnos_result = $conn->query($turnos_query);
                                while($row = $turnos_result->fetch_array()){ ?>
                                    <option value="<?php print($row['id_turno']) ?>"><?php print($row['nombre']) ?></option> <?php
                                }
                                ?>
                            </div>
                            <div class="row form-floating mb-3">
                                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="">
                                <label for="nombre" class="form-label">Departamento</label>
                            </div>
                            <div class="row form-floating mb-3">
                                <input class="form-control" type="text" name="apellido1" id="apellido1" placeholder="">
                                <label for="apellido1" class="form-label">Categoría</label>
                            </div>
                            <div class="row form-floating mb-3">
                                <input class="form-control" type="text" name="apellido2" id="apellido2" placeholder="">
                                <label for="apellido2" class="form-label">Fecha</label>
                            </div>
                            <div class="row form-floating mb-3">
                                <input class="form-control" type="text" name="apellido2" id="apellido2" placeholder="">
                                <label for="apellido2" class="form-label">Número de turnos</label>
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
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>