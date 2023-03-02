<?php

    session_start();
    require_once('../pages/conexion.php');

    if (!empty($_GET['ID'])) {
        $ID = $_GET['ID'];
        $del = $conexion->prepare(('DELETE FROM conductores WHERE ID=:ID'));
        $del->bindParam(':ID',$ID);
        $ejecutar=$del->execute();

        if($ejecutar){
            echo'<script language="javascript">alert("Eliminado");</script>';
            header("Refresh:0; url=http://localhost/PruebaIT/vistas/crudConductores.php");

        }else{
            echo'<script language="javascript">alert("Tarea No Eliminada");</script>';
        }
    }

?>