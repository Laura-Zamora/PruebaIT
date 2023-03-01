<?php
    session_start();
    require_once('../pages/conexion.php');
    $_SESSION['insert'] = false;

    if (!empty($_POST)) {
        $valorRuta=$_POST['ruta'];


        $SQL=$conexion->prepare("INSERT INTO registro (IDCONDUCTOR,IDRUTA,HORAINICIO,HORAFINAL) VALUES(:conductor,:ruta,CURRENT_TIMESTAMP,NULL)");
        $SQL->bindParam(':conductor',$_SESSION['ccUsuario']);
        $SQL->bindParam(':ruta',$valorRuta);
        $ejecutar=$SQL->execute();
        if($ejecutar){
            $_SESSION['insert'] = true;
            //echo'<script language="javascript">alert("Registrado");</script>';
            header("Refresh:0; url=http://localhost/PruebaIT/vistas/tiemposRutas.php");
            $_SESSION['insert'] = true;
        }else{
            echo'<script language="javascript">alert("No se registrada");</script>';
        }
    }

?>