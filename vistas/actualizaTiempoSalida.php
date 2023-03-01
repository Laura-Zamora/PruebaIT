<?php

    session_start();
    require_once('../pages/conexion.php');


    if (!empty($_POST['btnActualizar'])) {
        $_SESSION['idRegistro'] = $_POST['btnActualizar'];
        $ID=$_POST['btnActualizar'];
        $UP=$conexion->prepare("UPDATE registro SET HORAFINAL=CURRENT_TIMESTAMP, MINUTOSTOTAL=TIMESTAMPDIFF(MINUTE,horainicio,horafinal) WHERE ID=:ID");
        $UP->bindParam(':ID',$ID);
        $ejec=$UP->execute();
        if($ejec){
            echo'<script language="javascript">alert("Ruta Finalizada");</script>';
            header("Refresh:0; url=http://localhost/PruebaIT/vistas/tiemposRutas.php");
        }else{
            echo'<script language="javascript">alert("Ruta No Modificada");</script>';
        }
    }


?>