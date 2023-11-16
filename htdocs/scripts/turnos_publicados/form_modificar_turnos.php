<?php
        include_once($_SERVER['DOCUMENT_ROOT']."/scripts/conn.php");
        $conn = connect();
        if(!$conn)
        {
          echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
        }

        $update = "UPDATE turno_publicado SET id_empleado=? WHERE id_turno_publicado=?";

        $stmt = $conn->prepare($update);
        $stmt->bind_param('si',$_REQUEST['empleado'],$_REQUEST['id_turno_publicado']);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        header('Location: ./');
      ?>