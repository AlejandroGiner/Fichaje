<?php include ($_SERVER['DOCUMENT_ROOT']."/seguridad.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mis turnos</title>
    
    <?php include($_SERVER['DOCUMENT_ROOT']."/header.php"); ?>

</head>
<body>
    <!-- Fixed navbar -->
    <?php
        include($_SERVER['DOCUMENT_ROOT']."/navbar.php");
    ?>

    <?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/scripts/conn.php');

    $query = "select * from turno_publicado_completo WHERE dni=? LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($query);
    include($_SERVER['DOCUMENT_ROOT'].'/scripts/pagination.php');

    $stmt->bind_param('sii',$_SESSION['dni'],$pagesize,$offset);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $total_query = "select COUNT(*) from turno_publicado_completo WHERE dni=?";
    $stmt = $conn->prepare($total_query);
    $stmt->bind_param('s',$_SESSION['dni']);
    $stmt->execute();
    $count = $stmt->get_result();
    $num_turnos_publicados = $count->fetch_row()[0];
    $maxpage = ceil($num_turnos_publicados/$pagesize); 

    ?>
    <div class="table-responsive">
        <table class="table table-striped table-hover">

            <thead>
                <tr>
                    <th>Turno</th>
                    <th>Hora de entrada</th>
                    <th>Hora de salida</th>
                    <th>Fecha</th>
                </tr>
            </thead>

            <tbody>
                <?php
                while($row = $result->fetch_array()){
                    print("<tr><td>".$row["turno"]."</td>");
                    print("<td>".$row["hora_inicio"]."</td>");
                    print("<td>".$row["hora_fin"]."</td>");
                    print('<td>'.date_format(date_create($row['fecha']),'d/m/Y').'</td>');
                }
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


 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src='/js/turnosPublicados.js'></script>

</body>
</html>