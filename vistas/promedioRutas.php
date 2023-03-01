<?php

    session_start();
    require('parte_superior.php');
    require_once('../pages/conexion.php');

    $SQL = "SELECT R.ID AS REGISTRO,CONCAT(CONCAT(C.ID,' - '),C.NOMBRE) AS CONDUCTOR,CONCAT(CONCAT(U.ID,' - '),U.NOMBRE_RUTA) AS RUTA,R.HORAINICIO AS HORAI,R.HORAFINAL AS HORAF, R.MINUTOSTOTAL AS TOTAL
            FROM registro R INNER JOIN conductores C ON R.IDCONDUCTOR = C.ID
            INNER JOIN rutas U ON R.IDRUTA = U.ID
            WHERE R.MINUTOSTOTAL = ( SELECT MAX( MINUTOSTOTAL ) FROM registro) OR R.MINUTOSTOTAL = ( SELECT MIN( MINUTOSTOTAL ) FROM registro);";

    $resultado = $conexion->prepare($SQL);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="container">
    <h1>Promedio Rutas </h1>
</div>

<div class="container">

<table class="table">
  <thead>
        <tr>
            <th scope="col">N REGISTRO</th>
            <th scope="col">CONDUCTOR</th>
            <th scope="col">RUTA</th>
            <th scope="col">HORA INICIO</th>
            <th scope="col">HORA FINAL</th>
            <th scope="col">TOTAL MINUTOS</th>

        </tr>
  </thead>
  <tbody>
        <?php
            foreach($data as $dat) {
        ?>
        <tr>
            <th scope="row"><?php echo $dat['REGISTRO']; ?></th>
            <td><?php echo $dat['CONDUCTOR']; ?></td>
            <td><?php echo $dat['RUTA']; ?></td>
            <td><?php echo $dat['HORAI']; ?></td>
            <td><?php echo $dat['HORAF']; ?></td>
            <td><?php echo $dat['TOTAL']; ?></td>
        </tr>

        <?php
            };
        ?>
  </tbody>
</table>
</div>

<?php
    require('parte_inferior.php');
?>