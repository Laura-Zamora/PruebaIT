<?php

    session_start();
    require_once('../pages/conexion.php');


    if (!empty($_POST)) {
        $ID=$_POST['ID'];
        $vNombre=$_POST['NOMBRE'];
        $vClave=$_POST['CLAVE'];

        $UP=$conexion->prepare("UPDATE conductores SET NOMBRE=:vnombre, CLAVE=:vclave WHERE ID=:ID");
        $UP->bindParam(':ID',$ID);
        $UP->bindParam(':vnombre',$vNombre);
        $UP->bindParam(':vclave',$vClave);
        $ejec=$UP->execute();
        if($ejec){
            echo'<script language="javascript">alert("Conductor Modificado");</script>';
            header("Refresh:0; url=http://localhost/PruebaIT/vistas/crudConductores.php");
            $_SESSION['update'] = true;
        }else{
            echo'<script language="javascript">alert("Ruta No Modificada");</script>';
        }
    }

?>