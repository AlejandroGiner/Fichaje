<?php
        include_once($_SERVER['DOCUMENT_ROOT']."/scripts/conn.php");
        $conn = connect();
        if(!$conn)
        {
          echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        }

        $insert = "INSERT INTO turno_publicado (id_turno, id_categoria, fecha) VALUES (?,?,?)";
        
        $fecha_inicio = new DateTime($_REQUEST['fecha_inicio']);
        $fecha_fin = new DateTime($_REQUEST['fecha_fin']);
        $fecha_fin = $fecha_fin->modify('+1 day');
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($fecha_inicio, $interval, $fecha_fin);

        foreach ($period as $dt){
            $fecha = $dt->format('Y-m-d');
            for($i = 0; $i < $_REQUEST['cantidad']; $i++){
                $stmt = $conn->prepare($insert);
                $stmt->bind_param('iis',$_REQUEST["turno"],$_REQUEST["categoria"],$fecha);
                $stmt->execute();
                $stmt->close();
            }
        }
          
          $conn->close();

        header('Location: ./?published_shift');
      ?>