<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Categorias</title>

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
        function verificar(){
            if(document.getElementById('categoria').value=="" ){
              alert("Complete los campos.");
            }else{
              document.getElementById('bandera').value="add";
              document.supermarket.submit();
            }

          }
        function modificar(idc,categoria)
        {
          document.getElementById('baccion').value=idc;
          document.getElementById('nombreCategoria').value=categoria;

        }
        function ejecutar()
        {
          alert(document.getElementById('nombreCategoria').value);
          if (document.getElementById('nombreCategoria').value=="") {
            alert("Por favor ingrese un nombre valido.");
          }else {
            document.getElementById('bandera').value="modificar";
            document.getElementById('categoriaEditada').value=document.getElementById('nombreCategoria').value;
            document.supermarket.submit();
          }

        }


        function confirmar(id,op)
        {
          if (op==1) {
            if (confirm("!!Advertencia!! ¿Desea Desactivar Esta Categoria?")) {
            document.getElementById('bandera').value='desactivar';
            document.getElementById('baccion').value=id;
            document.supermarket.submit();
          }else
          {

          }
          }else{
            if (confirm("!!Advertencia!! Desea Activar Este Registro?")) {
            document.getElementById('bandera').value='activar';
            alert("Activar");
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
      <input type="hidden" name="categoriaEditada" id="categoriaEditada">
      <input type="hidden" name="user" id="user">
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Categorias<small>    Listado de las categorias.</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Registro <small>Datos de la categoria.</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" name="super" method="POST" enctype="multipart/form-data">
                      <!-- AUXILIARES -->

<input type="hidden" name="barcode" id="barcode" value="<?php echo $codigoProd; ?>">
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="categoria" name="categoria" placeholder="Categoria">
                        <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <br>

                      <div class="form-group">

                        <div class="col-md-9 col-sm-9 col-xs-12">

                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <input type="button" class="btn btn-primary" onclick="verificar()" value="Agregar" ></input>
                          <button class="btn btn-primary" type="reset">Cancelar</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-8 col-sm-8 col-xs-8">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Categorias <small>Listado</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Resultados por pagina.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                            <th>Estado</th>
                            <th>Activar/Desactivar</th>
                          <th>Editar</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                      include 'conexion.php';
                      $result = $conexion->query("select * from categorias");
                      if ($result) {
                        while ($fila = $result->fetch_object()) {
                          echo "<tr>";
                          $categoria=$fila->idcategoria;
                          echo "<td>".$fila->categoria."</td>";


                          if ($fila->estado==1) {
                            echo "<td style='text-align:center;width:40px;'>Activo</td>";
                            echo "<td style='text-align:center;width:40px;'><button align='center' type='button' class='btn btn-default' onclick=confirmar(" . $categoria . ",1);><i class='fa fa-remove'></i>
                               </button></td>";
                          }else {
                            echo "<td style='text-align:center;width:40px;'>Inactivo </td>";
                            echo "<td style='text-align:center; width:40px;'><button align='center' type='button' class='btn btn-default' onclick=confirmar(" . $categoria . ",2);><i class='fa fa-check'></i>
                               </button></td>";
                          }
                          echo "<td style='text-align:center;width:40px;'><button align='center' type='button' class='btn btn-default ' data-toggle='modal' data-target='#myModal' onclick=modificar(" . $categoria . ",'".$fila->categoria."');><i class='fa fa-edit'></i>
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
      <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modificar La categoria</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
    <label for="email">Categoria:</label>
    <input type="text" class="form-control" id="nombreCategoria">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default"  onclick="ejecutar()">Modificar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>

  </div>
</div>
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
