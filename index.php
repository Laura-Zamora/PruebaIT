<?php
    session_start();

    require_once('pages/conexion.php');

    if (isset($_POST["txtUsuario"]) && isset($_POST["txtContrasena"])) {


        $errores='';
        $valorUsuaro = $_POST["txtUsuario"];
        $valorClave = $_POST["txtContrasena"];
        $_SESSION['usuario'] = $valorUsuaro;


        $SQL = $conexion->prepare('SELECT ID, NOMBRE FROM admi WHERE ID=:usu AND CLAVE =:clav');
        $SQL->execute(array(':usu'=> $valorUsuaro,':clav'=>$valorClave));
        $resultado=$SQL->fetch();


        if ($resultado !== false) {
            $_SESSION['tipoSesion'] = 'ADMI';
            $_SESSION['usuarioAdmi'] = $valorUsuaro;
            $_SESSION['ccUsuario'] = $valorUsuaro;

            header('Location:vistas/dashboardIni.php');

        } else if ($resultado == false) {

            $SQL = $conexion->prepare('SELECT ID, NOMBRE FROM conductores WHERE ID=:usu AND CLAVE =:clav');
            $SQL->execute(array(':usu'=> $valorUsuaro,':clav'=>$valorClave));
            $resultado=$SQL->fetch();

            if ($resultado !== false) {
                $_SESSION['tipoSesion'] = 'CONDUCTORES';
                $_SESSION['usuarioC'] = $valorUsuaro;
                $_SESSION['ccUsuario'] = $valorUsuaro;
                header('Location:vistas/dashboardIni.php');
            }else {
                $errores.='<li> Datos incorrectos</li>';
            }

        }else{
            $errores.='<li> Datos incorrectos</li>';
        }


    }



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,
    initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet'type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/formulario.css">
    <title>Iniciar Sesion</title>
  </head>

  <body>
    <div class="contenedor">
        <!--  -->
     <hr class='border'>
      <fieldset>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login" >
                <img src="img/transporte-publico.png" alt="">
                <div class="form-group">
                <i class= "icono izquierda fa fa-user"></i><input type="text" name="txtUsuario" id="txtU" class="usuario" placeholder="Cedula">
                </div>

                <div class="from-group">
                <i class="icono izquierda fa fa-lock"></i><input type="password" name="txtContrasena" id="txtC" class="password_btn" placeholder="Contraseña" >
                </div>
                <input type="submit" name="ingresar" value="Ingresar" id="btnL" class="btnS" disabled>

                <?php if(!empty($errores)):?>
                <div class="error">
                    <ul>
                    <?php echo "$errores"; ?>
                    </ul>
                </div>
                <?php endif; ?>

            </form>
       </fieldset>
    </div>


    <script>
        function validarCamposLogin() {
            let valorCed = document.getElementById("txtU").value;
            let valorCla= document.getElementById("txtC").value;
            let botonC = document.getElementById("btnL");
            let val = 0;

            if (valorCed.length == 0) {
                val++;
            }

            if (valorCla.length == 0) {
                val++;
            }

            if (val == 0) {
                document.getElementById("btnL").disabled = false;
            } else {
                document.getElementById("btnL").disabled = true;
            }



        }

        document.getElementById("txtU").addEventListener("keyup",validarCamposLogin);
        document.getElementById("txtC").addEventListener("keyup",validarCamposLogin);
        /*
        document.getElementById("btnL").addEventListener("click",()=>{
        });
        */
    </script>

  </body>
</html>
