<?php

    session_start();
    require('parte_superior.php');
    require_once('../pages/conexion.php');
    $SQL = "SELECT ID, NOMBRE, CLAVE FROM $_SESSION[tipoSesion] WHERE ID = $_SESSION[usuario]";
    $resultado = $conexion->prepare($SQL);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>



<div class="container">
    <h1>Informacion Usuario </h1>
</div>

<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>CEDULA</th>
                                <th>NOMBRE</th>
                                <th>CLAVE</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($data as $dat) {
                            ?>
                            <tr>
                                <td><?php echo $dat['ID'] ?></td>
                                <td><?php echo $dat['NOMBRE'] ?></td>
                                <td><?php echo $dat['CLAVE'] ?></td>
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                       </table>
                    </div>
                </div>
        </div>
    </div>

<?php
    require('parte_inferior.php');
?>
