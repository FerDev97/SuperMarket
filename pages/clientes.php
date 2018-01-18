<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Super Market | </title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!--Scripts de validaciones-->
    <script type="text/javascript">

      function verificar(){
          if(document.getElementById('nombreCliente').value=="" ||
            document.getElementById('apellidoCliente').value=="" ||
            document.getElementById('duiCliente').value=="" ||
            document.getElementById('direccionCliente').value=="" ||
            document.getElementById('telefonoCliente').value=="" ||
            document.getElementById('imagen').value=="" ||
            document.getElementById('usuarioCliente').value=="" ||
            document.getElementById('contraseñaCliente').value=="" ||
            document.getElementById('latitud').value=="" ||
            document.getElementById('longitud').value==""){
            alert("Complete los campos");
          }else{
            document.getElementById('bandera').value="add";
           document.super.submit();
          }
        }

    </script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../index.php" class="site_title"><i class="fa fa-star"></i> <span>Super Market!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- Menu rapido del perfil -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <a href="../index.php" class="site_title"><i class="fa fa-user"></i></a>
              </div>
              <div class="profile_info">
                <span>Bienvenido ,</span>
                <h2><?php echo $_SESSION['usuario']; ?></h2>
              </div>
            </div>
            <!-- /Informacion del menu rapido del perfil -->
            <br />

            <!-- sidebar menu -->
            <?php   if ($_SESSION["tipousuario"]=="invitado") {
                include "menuCliente.php";
              }else {
                include "menu.php";
              } ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <?php
          if ($_SESSION["tipousuario"]=="invitado") {
            include "navBarInvitado.php";
          }else {
            include "navBarUser.php";
          }
           ?>
        </div>
        <!-- /top navigation -->



        <!-- Contenido de la pagina -->


        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Clientes</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Busqueda...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Ir!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Registro <small>Datos del cliente.</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" name="super" method="POST" enctype="multipart/form-data">
                      <!-- AUXILIARES -->
<input type="hidden" name="bandera" id="bandera">
<input type="hidden" name="baccion" id="baccion">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="usuarioCliente" name="usuarioCliente" placeholder="Usuario">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="password" class="form-control" id="contraseñaCliente" name="contraseñaCliente" placeholder="Contraseña">
                        <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="nombreCliente" name="nombreCliente" placeholder="Nombre">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="apellidoCliente" name="apellidoCliente" placeholder="Apellido">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="duiCliente" name="duiCliente" placeholder="Dui">
                        <span class="fa fa-hashtag form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="telefonoCliente" name="telefonoCliente" placeholder="Telefono">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="latitud" name="latitud" placeholder="Latitud">
                        <span class="fa fa-compass form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="longitud" name="longitud" placeholder="Longitud">
                        <span class="fa fa-compass form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Direccion</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="Direccion" id="direccionCliente" name="direccionCliente">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fotografía</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="file" class="form-text" id="imagen" name="imagen" required accept="image/jpg,image/png,image/jpeg">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary" onclick="verificar()">Agregar</button>
                          <button class="btn btn-primary" type="reset">Cancelar</button>

                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
 <!-- DIV PARA PONER EL MAPA PARA CLIENTES-->

              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>MAPA <small>Mapa cliente.</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <div class="embed-responsive embed-responsive-4by3">
                              <iframe src="ej.php" class="embed-responsive-item" allowfullscreen></iframe>
                            </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include 'footer.php'; ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>

<?php
include "conexion.php";

$bandera          = $_REQUEST["bandera"];
$nombreCliente    = $_REQUEST["nombreCliente"];
$apellidoCliente  = $_REQUEST["apellidoCliente"];
$duiCliente       = $_REQUEST["duiCliente"];
$telefonoCliente  = $_REQUEST["telefonoCliente"];
$direccionCliente = $_REQUEST["direccionCliente"];
$latitud = $_REQUEST["latitud"];
$longitud = $_REQUEST["longitud"];
$usuarioCliente = $_REQUEST["usuarioCliente"];
$contraseñaCliente = $_REQUEST["contraseñaCliente"];
$imagenCliente = $_REQUEST["imagen"];
$tipoUsuario="Cliente";
//ahora hay que agregar la pinche imagen alv :'v
if ($bandera == "add") {
        $consultaUser  = "INSERT INTO usuarios VALUES('".$usuarioCliente."','" . $contraseñaCliente . "','".$tipoUsuario."',1)";
        $resultado = $conexion->query($consultaUser);
        if ($resultado) {
          msg("Exito Usuario");

          $permitidos = array("image/jpg", "image/jpeg", "image/png");
    $limite_kb  = 16384; //tamanio maximo que permitira subir, es el limite de medium blow(16mb)
    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024) {
        //Este es el archivo temporaral.
        $imagen_temporal = $_FILES['imagen']['tmp_name'];
        //este es el tipo de archivo
        $tipo = $_FILES['imagen']['type'];
        //leer el archivo temporarl en binario
        $fp   = fopen($imagen_temporal, 'r+b');
        $data = fread($fp, filesize($imagen_temporal));
        fclose($fp);
        //escapar los caracteres
        $data      = mysqli_real_escape_string($conexion, $data);
        $consulta  = "INSERT INTO clientes VALUES('null','" . $duiCliente . "','" . $nombreCliente . "','" . $apellidoCliente . "','" . $direccionCliente . "','" . $latitud  . "','" . $longitud . "','" . $telefonoCliente . "','" . $data . "','" . $tipo . "','" . $usuarioCliente . "')";
        $resultado = $conexion->query($consulta);
        if ($resultado) {
            msg("Exito");
        } else {
            msg("No Exito");
        }
    }




        }else
        {
          msg("Error Usuario.");
        }

}
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "</script>";
}
?>
