<?php

    session_start();
    require('parte_superior.php');
    require_once('../pages/conexion.php');

    $SQL = "SELECT * FROM rutas";

    $resultado = $conexion->prepare($SQL);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="container">
    <h1>Informacion Rutas </h1>
</div>

<div class="container">

<table class="table">
  <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE RUTA</th>
            <th scope="col">ACCIONES</th>

        </tr>
  </thead>
  <tbody>
        <?php
            foreach($data as $dat) {
        ?>
        <tr>
            <th scope="row"><?php echo $dat['ID']; ?></th>
            <td><?php echo $dat['NOMBRE_RUTA']; ?></td>
            <td>
                <form action="" method="POST">
                    <button class="btn btn-primary" type="submit" value="<?php ?>" name="btnActualizar">EDITAR</button>
                    <button class="btn btn-danger" type="submit" value="<?php ?>" name="btnActualizar" >ELIMINAR</button>
                </form>
            </td>
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