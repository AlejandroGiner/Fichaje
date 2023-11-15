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

    <button class='btn btn-lg btn-primary' data-bs-toggle='modal' data-bs-target='#nuevoTurnoPublicado_1'>Publicar turnos</button>

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
                </tr>
            </thead>

            <tbody>
            <form method="get" action="./grabaEmpleado.php">
                <tr>
                    <td>
                        <select class="form-select" name="turno" id="turno">
                            <option value="none" selected disabled hidden></option>
                            <?php
                            foreach($turnos as &$turno){?>
                                <option value=""> <?php print($turno['nombre']); ?></option>
                            <?php } ?>
                    </td>
                    <td>
                        <select class="form-select" name="departamento" id="departamento">
                            <option value="none" selected disabled hidden></option>
                            <?php
                            foreach($deptos as &$depto){?>
                                <option value=""> <?php print($depto['nombre']); ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <select class="form-select" name="categoria" id="categoria">
                            <option value="none" selected disabled hidden></option>
                        </select>
                    </td>
                    <td>
                        Fecha
                    </td>
                    <td>
                        Número
                    </td>
                    <td>
                        Añadir
                    </td>
                </tr>
            </form>



                <?php
                while($row = $result->fetch_array()){
                    print("<tr><td>".$row["turno"]."</td>");
                    print("<td>".$row["departamento"]."</td>");
                    print("<td>".$row["categoria"]."</td>");
                    print("<td>".$row["fecha"]."</td>");
                    print('<td>'.($row['empleado']!=''?$row['empleado']:'Sin asignar').'</td>');
                }
                
                ?>
                </tr>
            </tbody>

        </table>

        <?php /*include('publicar_turnos.php'); */?>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src='/js/turnosPublicados.js'></script>

</body>
</html>