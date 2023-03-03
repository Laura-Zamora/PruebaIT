<?php

    session_start();
    require('parte_superior.php');
    require_once('../pages/conexion.php');

    $SQL = "SELECT * FROM conductores";

    $resultado = $conexion->prepare($SQL);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="container">
    <h1>Informacion Conductores </h1>
</div>

<!--
<div class="container">
    <form action="insertConductor.php" method="POST" class="formulito">
    <div class="form-group">
        <label for="exampleInputEmail1">Cedula</label>
        <input type="text" class="form-control" name="cedulaC" id="txtCedulaC" placeholder="Cedula conductor">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="text" class="form-control" name="nombreC" id="txtNombreC" placeholder="Nombre conductor">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Contraseña</label>
        <input type="password" class="form-control" id="txtContrasenaC" name="contrasenaC" placeholder="Contraseña Conductor">
    </div>
    <button type="submit" class="btn btn-primary" id="btnGuardarC" disabled>Guardar Conductor</button>
    <button type="button" class="btn btn-primary" id="btnPrue" >Prueba</button>
    </form>
</div>
-->
<div class="container">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearModal" > <i class="bi bi-person-plus-fill"> Nuevo </i> </button>
</div>

<br>
<div class="container">
    <table class="table">
      <thead>
              <tr>
                  <th scope="col">CEDULA</th>
                  <th scope="col">NOMBRE</th>
                  <th scope="col">CLAVE</th>
                  <th scope="col">ACCIONES</th>

              </tr>
      </thead>
      <tbody>
              <?php
                  foreach($data as $dat) {
              ?>
              <tr>
                  <th scope="row"><?php echo $dat['ID']; ?></th>
                  <td><?php echo $dat['NOMBRE']; ?></td>
                  <td><?php echo $dat['CLAVE']; ?></td>
                  <td>

                    <a href="#"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editaModal" data-bs-id="<?php echo $dat['ID'];?>"> <i class="bi bi-pencil-fill"> EDITAR </i> </a>

                    <a href="eliminarConductor.php?ID= <?php echo $dat['ID'];?>">
                        <button class="btn btn-danger" type="submit" name="btnEliminar"> <i class="bi bi-trash-fill"> ELIMINAR </i> </button>
                    </a>
                  </td>
              </tr>

              <?php
                  };
              ?>
      </tbody>
    </table>
</div>


<div class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="crearModalLabel">Nuevo Conductor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="insertConductor.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Cedula :</label>
            <input type="text" class="form-control" name="cedulaC" id="txtCedulaC">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre :</label>
            <input type="text" class="form-control" name="nombreC" id="txtNombreC">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Clave :</label>
            <input type="password" class="form-control" id="txtContrasenaC" name="contrasenaC">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cerrar </button>
            <button type="submit" class="btn btn-primary" id="btnGuardarC"> Guardar </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>



<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editaModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="actualizarConductor.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" id="ID" name="ID">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre :</label>
            <input type="text" class="form-control" id="NOMBRE" name="NOMBRE">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Clave :</label>
            <input type="text" class="form-control" id="CLAVE" name="CLAVE">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" name="btnActualizarC">Guardar</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<?php
    require('parte_inferior.php');
?>