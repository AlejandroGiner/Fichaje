<?php include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fichajes</title>
    
    <?php include($_SERVER['DOCUMENT_ROOT']."/header.php"); ?>

</head>
<body>
    <!-- Fixed navbar -->
    <?php
        include($_SERVER['DOCUMENT_ROOT']."/navbar.php");
    ?>

    <?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/scripts/conn.php');

    $query = "select * from turno_publicado_completo LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($query);
    include($_SERVER['DOCUMENT_ROOT'].'/scripts/pagination.php');

    $stmt->bind_param('ii',$pagesize,$offset);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $total_query = "select COUNT(*) from turno_publicado_completo";
    $num_turnos_publicados_result = $conn->query($total_query);
    $num_turnos_publicados = $num_turnos_publicados_result->fetch_row()[0];
    $maxpage = ceil($num_turnos_publicados/$pagesize);

    $turnos_query = "select * from turno";
    $turnos_result = $conn->query($turnos_query);
    $turnos = $turnos_result->fetch_all(MYSQLI_BOTH);

    $deptos_query = "select * from departamento";
    $deptos_result = $conn->query($deptos_query);
    $deptos = $deptos_result->fetch_all(MYSQLI_BOTH);

    ?>
    <div class="table-responsive mx-5">
        <table class="table table-striped table-hover">

            <thead>
                <tr>
                    <th>Turno</th>
                    <th>Departamento</th>
                    <th>Categoría</th>
                    <th>Fecha</th>
                    <th>Empleado</th>
                    <th>Precio</th>
                    <th>
                        <nobr><button class='btn btn-lg btn-primary bi bi-calendar2-plus-fill' data-bs-toggle='modal' data-bs-target='#modalPublicarTurnos'> Publicar turnos</button></nobr>
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
                    print('<td>'.($row['empleado']!=''?$row['empleado']:'Sin asignar').'</td>');
                    print('<td>'.$row['precio'].'</td>');
                    ?>
                    <td>
                        <button style="white-space: nowrap;" class="btn btn-lg btn-primary btn-modificar-modal bi bi-pencil-square" data-bs-toggle='modal' 
                        data-bs-target='#modalModificarTurno' data-id-categoria='<?php print($row['id_categoria']); ?>'
                        data-id-turno-publicado='<?php print($row['id_turno_publicado']); ?>'> Modificar</button>
                        <button style="white-space: nowrap;" class="btn btn-lg btn-danger btn-eliminar-modal bi bi-trash" 
                        data-bs-toggle='modal'
                        data-bs-target="#eliminarTurnosModal" 
                        data-id-turno-publicado='<?php print($row['id_turno_publicado']); ?>'
                        data-fecha-eliminar='<?php print($row['fecha']); ?>'
                        data-turno-eliminar='<?php print($row['turno']); ?>'
                        data-departamento-eliminar='<?php print($row['departamento']); ?>'
                        data-categoria-eliminar='<?php print($row['categoria']); ?>'
                        data-empleado-eliminar='<?php print($row['empleado']); ?>'> Eliminar</button>
                    </td>
                <?php }
                
                ?>
                </tr>
            </tbody>

        </table>

<nav>
    <ul class="pagination pagination-lg d-flex justify-content-center">
        <li class="page-item <?php if(1==$page) print('disabled') ?>"><a class="page-link"href=".?p=<?php print($page-1) ?>"><i class="bi bi-arrow-left"></i></a></li>
        <?php
            for($i=max(1,$page-2);$i <= $page+2 && $i <= $maxpage;$i++){
                ?>
                    <li class="page-item <?php if($i==$page) print('active') ?>"><a class="page-link" href=".?p=<?php print($i) ?>"><?php print($i) ?></a></li>
                <?php
            }
        ?>
        <li class="page-item <?php if($page>=$maxpage) print('disabled');?>"><a class="page-link" href=".?p=<?php print($page+1) ?>"><i class="bi bi-arrow-right"></i></a></li>
    </ul>
</nav>
        
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
                            <input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio" required>
                        </div>
                        <div class="row mb-3">
                            <label for="fecha_fin" class="form-label">Fecha final</label>
                            <input class="form-control" type="date" name="fecha_fin" id="fecha_fin" required>
                        </div>
                        <div class="row mb-3">
                            <label for="turno">Turno</label>
                            <select class='form-select' name="turno" id="turno" required>
                                <option value="" selected disabled hidden></option>
                                <?php
                        foreach($turnos as &$turno){?>
                            <option value="<?php print($turno['id_turno']); ?>"> <?php print($turno['nombre']); ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="departamento">Departamento</label>
                            <select class='form-select' name="departamento" id="departamento" required>
                                <option value="" selected disabled hidden></option>
                                <?php
                        foreach($deptos as &$depto){?>
                            <option value="<?php print($depto['id_departamento']); ?>"> <?php print($depto['nombre']); ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="categoria">Categoría</label>
                            <select class='form-select' name="categoria" id="categoria" required>
                                <option value="" selected disabled hidden>Elige un departamento primero</option>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="cantidad">Cantidad</label>
                            <input class='form-control' type="number" name="cantidad" id="cantidad" required>
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
                    <input type="hidden" name="id_turno_publicado" id = 'id_turno_publicado'>
                    <div class="modal-body">
                        <label for="empleado">Empleado</label>
                        <select class='form-select' name="empleado" id="empleado">
                            <option value="none" selected disabled hidden></option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type='submit' class="btn btn-primary">Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL Eliminar turno publicado -->
    <div class="modal modal-lg fade" id="eliminarTurnosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Eliminar turno publicado</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="eliminaTurnoPublicado.php">
                    <div class="modal-body">
                        <label for="fecha_eliminar" class="form-label">Fecha</label>
                        <input class='form-control' type="date" name="fecha_eliminar" id="fecha_eliminar" readonly>
                        <label for="turno_eliminar" class="form-label">Turno</label>
                        <input class='form-control' type="text" name="turno_eliminar" id="turno_eliminar" readonly>
                        <label for="departamento_eliminar" class="form-label">Departamento</label>
                        <input class='form-control' type="text" name="departamento_eliminar" id="departamento_eliminar" readonly>
                        <label for="categoria_eliminar" class="form-label">Categoría</label>
                        <input class='form-control' type="text" name="categoria_eliminar" id="categoria_eliminar" readonly>
                        <label for="empleado_eliminar" class="form-label">Empleado</label>
                        <input class='form-control' type="text" name="empleado_eliminar" id="empleado_eliminar" readonly>
                        <input class="form-control" type="hidden" name="id_turno_publicado_eliminar" id="id_turno_publicado_eliminar">
                    </div>
                
                
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (array_key_exists('published_shift',$_GET)){ ?>

    <!-- Toast turnos publicados -->
    <div aria-live="polite" aria-atomic="true" class="position-relative">
  <!-- Position it: -->
  <!-- - `.toast-container` for spacing between toasts -->
  <!-- - `top-0` & `end-0` to position the toasts in the upper right corner -->
  <!-- - `.p-3` to prevent the toasts from sticking to the edge of the container  -->
  <div class="toast-container position-fixed bottom-0 end-0 p-3">

<!-- Then put toasts within -->
<div class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body">
            <strong>Turnos publicados con éxito.</strong>
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>

</div>
</div>

    <?php } ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src='/js/turnosPublicados.js'></script>

</body>
</html>