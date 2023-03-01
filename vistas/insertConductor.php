<?php
    session_start();
    require_once('../pages/conexion.php');


    if (!empty($_POST)) {

        $valorCedula=$_POST['cedulaC'];
        $valorNombre=$_POST['nombreC'];
        $valorContrasena=$_POST['contrasenaC'];


        $SQL=$conexion->prepare("INSERT INTO conductores (ID,NOMBRE,CLAVE) VALUES(:cedula,:nombre,:contrasena)");
        $SQL->bindParam(':cedula',$valorCedula);
        $SQL->bindParam(':nombre',$valorNombre);
        $SQL->bindParam(':contrasena',$valorContrasena);
        $ejecutar=$SQL->execute();
        if($ejecutar){
            echo'<script language="javascript">alert("Registrado");</script>';
            header("Refresh:0; url=http://localhost/PruebaIT/vistas/crudConductores.php");
        }else{
            echo'<script language="javascript">alert("No se registrada");</script>';
        }
    }

?>