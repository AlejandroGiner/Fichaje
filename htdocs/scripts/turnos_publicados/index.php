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

    <?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/scripts/conn.php');
    $conn = connect();
    $query = "select * from turno_publicado_completo";
    $result = $conn->query($query);

    $turnos_query = "select * from turno";
    $turnos_result = $conn->query($turnos_query);
    $turnos = $turnos_result->fetch_all(MYSQLI_BOTH);

    $deptos_query = "select * from departamento";
    $deptos_result = $conn->query($deptos_query);
    $deptos = $deptos_result->fetch_all(MYSQLI_BOTH);

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
                    <th>
                        <button class='btn btn-lg btn-primary' data-bs-toggle='modal' data-bs-target='#modalPublicarTurnos'>Publicar turnos</button>
                    </th>
                </tr>
            </thead>

            <tbody>
                <?php
                while($row = $result->fetch_array()){
                    print("<tr><td>".$row["turno"]."</td>");
                    print("<td>".$row["departamento"]."</td>");
                    print("<td>".$row["categoria"]."</td>");
                    print('<td>'.date_format(date_create($row['fecha']),'d/m/Y').'</td>');
                    print('<td>'.($row['empleado']!=''?$row['empleado']:'Sin asignar').'</td>'); ?>
                    <td>
                        <button class="btn btn-lg btn-primary btn-modificar-modal" data-bs-toggle='modal' 
                        data-bs-target='#modalModificarTurno' data-id-turno-publicado=<?php print($row['id_turno_publicado']); ?>>Modificar</button>
                        <button class="btn btn-lg btn-danger">Eliminar</button>
                    </td>
                <?php }
                
                ?>
                </tr>
            </tbody>

        </table>

        
        <?php /*include('publicar_turnos.php'); */?>
        
    </div>
    
    <!-- Modal Publicar Turnos -->
    <div class="modal modal-lg fade" id="modalPublicarTurnos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Publicar turnos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="form_publicar_turnos.php" method="post">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="fecha_inicio" class="form-label">Fecha inicial</label>
                            <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio">
                        </div>
                        <div class="row mb-3">
                            <label for="fecha_fin" class="form-label">Fecha final</label>
                            <input class="form-control" type="date" name="fecha_fin" id="fecha_fin">
                        </div>
                        <div class="row mb-3">
                            <label for="turno">Turno</label>
                            <select class='form-select' name="turno" id="turno">
                                <option value="none" selected disabled hidden></option>
                                <?php
                        foreach($turnos as &$turno){?>
                            <option value="<?php print($turno['id_turno']); ?>"> <?php print($turno['nombre']); ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="departamento">Departamento</label>
                            <select class='form-select' name="departamento" id="departamento">
                                <option value="none" selected disabled hidden></option>
                                <?php
                        foreach($deptos as &$depto){?>
                            <option value="<?php print($depto['id_departamento']); ?>"> <?php print($depto['nombre']); ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="categoria">Categoría</label>
                            <select class='form-select' name="categoria" id="categoria">
                                <option value="none" selected disabled hidden></option>
                                <option value="none" disabled>Elige un departamento primero</option>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="cantidad">Cantidad</label>
                            <input class='form-control' type="number" name="cantidad" id="cantidad">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type='submit' class="btn btn-primary">Publicar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Modificar turno -->
    <div class="modal modal-lg fade" id="modalModificarTurno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Modificar turno</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="form_modificar_turnos.php" method="post">
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type='submit' class="btn btn-primary">Publicar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src='/js/turnosPublicados.js'></script>

</body>
</html>