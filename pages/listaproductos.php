<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Productos</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <script type="text/javascript">
      function llamarPaginaMapa(lat,lon)
        {
          var url="/supermarket/pages/verMapa.php?lat="+lat+"&lon="+lon;
          window.open(url,"Nuevo","alwaysRaised=no");
        }

        function llamarPagina(){
          var url="reporteproductos.php";
          window.open(url,"Nuevo","alwaysRaised=no,toolbar=no,menubar=no,status=no,resizable=no,width=400,height=300,location=no");
        }

        function modificar(idp)
        {
          document.getElementById('bandera').value='enviar';
          document.getElementById('baccion').value=idp;

         document.supermarket.submit();
        }
        function kardex(id)
        {
         document.location.href='kardex.php?id='+id;
        }
        function confirmar(id,op)
        {
          if (op==1) {
            if (confirm("!!Advertencia!! Desea Desactivar Este Registro?")) {
            document.getElementById('bandera').value='desactivar';
            document.getElementById('baccion').value=id;

            document.supermarket.submit();
          }else
          {
            alert("No entra");
          }
          }else{
            if (confirm("!!Advertencia!! Desea Activar Este Registro?")) {
            document.getElementById('bandera').value='activar';
            document.getElementById('baccion').value=id;
            document.supermarket.submit();
          }else
          {
            alert("No entra");
          }
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
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>SuperMarket!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>Fernando</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

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

        <!-- page content -->
      <form id="supermarket" name="supermarket" action="" method="post">
      <input type="hidden" name="bandera" id="bandera">
      <input type="hidden" name="baccion" id="baccion">
      <input type="hidden" name="user" id="user">
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Productos<small>Listado de los productos.</small></h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Productos<small>Listado</small></h2>
                  </br>
                </br>
                    <input type="button" class="btn btn-default" value="imprimir" onclick="llamarPagina()"/>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Resultados por pagina.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>

                          <th>Codigo</th>
                          <th>Producto</th>
                          <th>Categoria</th>
                          <th>Proveedor</th>
                          <th>Stock</th>
                          <th>Estado</th>
                          <th>Activar/Desactivar</th>
                          <th>Modificar</th>
                          <th>Kardex</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                      include 'conexion.php';
                      $result = $conexion->query("select p.idproductos as idprod, p.codigoproductos as codigo, p.nombreproductos as nombre,p.preciocompra as precioC,p.precioventa as precioV,p.cantidadproductos as cantidad, c.categoria as categoria,p.disponibilidad as disp, pr.nombre as proveedor from productos as p, categorias as c, proveedores as pr where p.idcategoria=c.idcategoria and p.idproveedor=pr.idproveedor");
                      if ($result) {
                        while ($fila = $result->fetch_object()) {
                          echo "<tr>";
                          $producto=$fila->idprod;
                          echo "<td>".$fila->codigo."</td>";
                          echo "<td>".$fila->nombre."</td>";
                          echo "<td>".$fila->categoria."</td>";
                          echo "<td>".$fila->proveedor."</td>";
                          echo "<td>".$fila->cantidad."</td>";
                    if ($fila->disp==1) {
                       echo "<td>Disponible.</td>";
                        //echo "<td><img src='imagenes.php?id=" . $fila->idempleados . "&tipo=empleado' width=100 height=180></td>";
                       echo "<td style='text-align:center;'><button align='center' type='button' class='btn btn-default' onclick=confirmar(" . $producto . ",1);><i class='fa fa-remove'></i>
                          </button></td>";
                    }else
                    {
                       echo "<td>No disponible.</td>";
                        //echo "<td><img src='imagenes.php?id=" . $fila->idempleados . "&tipo=empleado' width=100 height=180></td>";
                       echo "<td style='text-align:center;'><button align='center' type='button' class='btn btn-default' onclick=confirmar(" . $producto . ",2);><i class='fa fa-check'></i>
                          </button></td>";
                    }
                         echo "<td style='text-align:center;'><button align='center' type='button' class='btn btn-default' onclick=modificar(" . $producto . ");><i class='fa fa-edit'></i>
                          </button></td>";
                          echo "<td style='text-align:center;'><button align='center' type='button' class='btn btn-default' onclick=kardex(" . $producto . ");><i class='fa fa-list'></i>
                           </button></td>";

                          echo "</tr>";
                           }
                      }
                       ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
        <!-- /page content -->

        <!-- footer content -->
        <?php include "footer.php"; ?>
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>

<?php

include "conexion.php";

$bandera = $_REQUEST["bandera"];
$baccion = $_REQUEST["baccion"];
$user = $_REQUEST["user"];
if ($bandera == 'enviar') {
    echo "<script type='text/javascript'>";
    echo "document.location.href='editproductos.php?id=" . $baccion . "';";
    echo "</script>";
    # code...
}
if ($bandera == "desactivar") {
  $consulta = "UPDATE productos SET disponibilidad = '0' WHERE idproductos = '".$baccion."'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("Exito");
    } else {
        msg("No Exito");
    }
}
if ($bandera == "activar") {
  $consulta = "UPDATE productos SET disponibilidad = '1' WHERE idproductos = '".$baccion."'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("Exito");
    } else {
        msg("No Exito");
    }
}

function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "document.location.href='listaproductos.php';";
    echo "</script>";
}
?>
