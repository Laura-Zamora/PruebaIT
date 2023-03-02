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
<div class="container">
    <form action="insertConductor.php" method="POST">
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
    </form>
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
                      <form action="crudConductores.php" method="POST">
                          <button class="btn btn-primary" type="submit" value="<?php echo $dat['ID']; ?>" name="btnActualizar" >EDITAR</button>
                      </form>
                  </td>
                  <td>
                          <a href="eliminarConductor.php?ID= <?php echo $dat['ID'];?>">
                              <button class="btn btn-danger" type="submit" name="btnEliminar">ELIMINAR</button>
                          </a>
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