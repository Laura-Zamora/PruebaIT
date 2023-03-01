<?php

    session_start();
    require('parte_superior.php');
    require_once('../pages/conexion.php');

    $SQL = "SELECT R.ID AS REGISTRO,CONCAT(CONCAT(C.ID,' - '),C.NOMBRE) AS CONDUCTOR,CONCAT(CONCAT(U.ID,' - '),U.NOMBRE_RUTA) AS RUTA,R.HORAINICIO AS HORAI,R.HORAFINAL AS HORAF
    FROM registro R INNER JOIN conductores C ON R.IDCONDUCTOR = C.ID
    INNER JOIN rutas U ON R.IDRUTA = U.ID
    WHERE C.ID = $_SESSION[usuario]
    ORDER BY R.HORAFINAL ASC";

    $resultado = $conexion->prepare($SQL);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($_POST['btnActualizar'])) {
        $_SESSION['idRegistro'] = $_POST['btnActualizar'];
        echo $_SESSION['idRegistro'];

    }


?>



<div class="container">
    <h1>Informacion Rutas </h1>
</div>

<?php

  if(!empty($_SESSION['insert']) == true) {
    echo'<div class="container">';
      echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Inicio de ruta registrado</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    echo'</div>';
    $_SESSION['insert'] = false;

  }

  if(!empty($_SESSION['update']) == true) {
    echo'<div class="container">';
      echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Fin de ruta registrado</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    echo'</div>';
    $_SESSION['update'] = false;
  }


?>


<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Nuevo</button>
            </div>
        </div>
    </div>
    <br>
<div class="container">

  <table class="table" >
    <thead>
          <tr>
          <th scope="col">N REGISTRO</th>
          <th scope="col">CONDUCTOR</th>
          <th scope="col">RUTA</th>
          <th scope="col">HORA INICIO</th>
          <th scope="col">HORA FINAL</th>
          <th scope="col">ACCIONES</th>

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
          <td>
              <form action="actualizaTiempoSalida.php" method="POST">
                  <button class="btn btn-primary" type="submit" value="<?php echo $dat['REGISTRO'];?>" name="btnActualizar" <?php if ($dat['HORAI'] != NULL && $dat['HORAF']){ echo "disabled";};?>>Fin ruta</button>
              </form>
          </td>
          </tr>

          <?php
              };
          ?>
    </tbody>
  </table>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Inicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="guardarRuta.php" method="POST">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Ruta : </label>
            <select class="" class="form-control" name="ruta" id="recipient-name" id="pais">

                <?php
                    $qryRutas = $conexion->query(
                        "SELECT
                            ID,
                            NOMBRE_RUTA
                        FROM
                            rutas"
                    );

                    while ($rowRutas = $qryRutas->fetch(PDO::FETCH_ASSOC)) {



                ?>
                    <option value="<?php echo  $rowRutas['ID']?>"><?php echo  $rowRutas['ID'] . " - " . $rowRutas['NOMBRE_RUTA']?></option>
                <?php

                    };
                ?>
            </select>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Fin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="guardarRuta.php" method="POST">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Hora fin :</label>
            <input type="time" class="form-control" id="recipient-name" name="horaF">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
    require('parte_inferior.php');
?>