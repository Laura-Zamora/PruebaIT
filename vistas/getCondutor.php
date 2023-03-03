<?php

    require_once('../pages/conexion.php');
    //$id = $conexion->real_escape_string($_POST['id']);

    /*
    $_POST['ID']
    $id = 555;
    $SQL = "SELECT ID,NOMBRE,CLAVE FROM conductores WHERE ID = $id LIMIT 1";
    $resultado = $conexion -> query($SQL);
    //$rows = mysqli_num_rows($result);

    $conductor = [];


    */

    $conductor = [];
    $ID= $_POST['ID'];
    $SQL=$conexion->prepare("SELECT * FROM conductores WHERE ID =? LIMIT 1");
    $SQL->execute(array($ID));

    if($row=$SQL->fetch()){
        $conductor = $row;
        //print_r($conductor);
    }

    echo json_encode($conductor, JSON_UNESCAPED_UNICODE);
?>