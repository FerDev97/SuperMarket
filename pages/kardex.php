<?php
  $idproducto=$_REQUEST["id"];
  include 'conexion.php';
  $consulta = "select * from productos where idproductos=".$idproducto;
    $resultado = $conexion->query($consulta);
    if ($resultado) {
      while ($fila=$resultado->fetch_object()) {
        $nombre=$fila->nombreproductos;
      }
    }

 ?>
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
        function ejecutar()
        {
          if(document.getElementById('fechaK').value=="" || document.getElementById('descripcionK').value=="" || document.getElementById('cantidadK').value=="" || document.getElementById('vunitarioK').value==""){
            alert("Complete los campos");
          }else{

            var sub=document.getElementById('subtotalK').value;
            var acc=document.getElementById('accion').value;
            var id=document.getElementById('baccion').value;
            var des=document.getElementById('descripcionK').value;
            var can=document.getElementById('cantidadK').value;
            var fec=document.getElementById('fechaK').value;
            var vun=document.getElementById('vunitarioK').value;
            var sub=document.getElementById('subtotalK').value;
            var ban=document.getElementById('bandera').value="add";
            document.location.href="addKardex.php?id="+id+"&bandera=add&fechaR="+fec+"&accion="+acc+"&descripcionR="+des+"&cantidadR="+can+"&vunitarioR="+vun+"&subtotalR="+sub;
            }
        }
        function llamado()
        {
          var opciones=document.getElementsByName("accion");
          var accion="";
          for (var i = 0; i < opciones.length; i++) {
            if (opciones[i].checked==true) {
              accion=opciones[i].value;
            }
          }
          if (accion=="compra") {
            document.getElementById("accion").value=1;
          }else {
            document.getElementById("accion").value=0;
          }
          alert(document.getElementById("accion").value);
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
        function subtotal()
        {
          var sub=(document.getElementById('cantidadK').value  * document.getElementById('vunitarioK').value);
          document.getElementById('subtotalK').value=sub;


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
            <?php include"menu.php"; ?>
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
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">Fernando

                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Ajustes</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ayuda</a></li>
                    <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
      <form id="supermarket" name="supermarket" action="" method="post">
      <input type="hidden" name="bandera" id="bandera">
      <input type="hidden" name="baccion" id="baccion" value="<?php echo $idproducto; ?>">
      <input type="hidden" name="accion" id="accion" value="1">
      <input type="hidden" name="fecha" id="fechaR">
      <input type="hidden" name="fecha" id="descripcionR">
      <input type="hidden" name="fecha" id="cantidadR">
      <input type="hidden" name="fecha" id="vunitarioR">
      <input type="hidden" name="fecha" id="subtotalR">
      <input type="hidden" name="user" id="user">
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kardex del producto:  <?php echo $nombre;?></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kardex<small>Listado</small></h2>
                    <br>
                    <br>
                    <span  data-toggle='modal' data-target='#myModal'>
                      <button type="button" class="btn btn-primary" data-toggle='tooltip' data-placement='right' title='Ingresos o Salidas' >Acciones</button>
                    </span>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Resultados por pagina.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Fecha</th>
                          <th>Descripcion</th>
                          <th colspan="3">Entradas</th>
                          <th colspan="3">Salidas</th>
                          <th colspan="3">Saldo</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td class="warning">Cantidad</td>
                          <td class='danger'>V.Unitario</td>
                          <td class='info'>V.Total</td>
                          <td class="warning">Cantidad</td>
                          <td class='danger'>V.Unitario</td>
                          <td class='info'>V.Total</td>
                          <td class="warning">Cantidad</td>
                          <td class='danger'>V.Unitario</td>
                          <td class='info'>V.Total</td>
                        </tr>
                        <?php
                      include 'conexion.php';
                      $result = $conexion->query("select * from kardex");
                      if ($result) {
                        while ($fila = $result->fetch_object()) {
                          echo "<tr>";
                          echo "<td>".$fila->fecha."</td>";
                          echo "<td>".$fila->descripcion."</td>";
                          if ($fila->movimiento==1){
                            echo "<td class='warning'>".$fila->cantidad."</td>";
                            echo "<td class='danger'>".$fila->vunitario."</td>";
                            $total=($fila->cantidad)*$fila->vunitario;
                            echo "<td class='info'>".$total."</td>";
                            echo "<td class='warning'>0</td>";
                            echo "<td class='danger'>0</td>";
                            echo "<td class='info'>0</td>";
                          }else {
                            echo "<td class='warning'>0</td>";
                            echo "<td class='danger'>0</td>";
                            echo "<td class='info'>0</td>";
                            echo "<td class='warning'>".$fila->cantidad."</td>";
                            echo "<td class='danger'>".$fila->vunitario."</td>";
                            $total=($fila->cantidad)*$fila->vunitario;
                            echo "<td class='info'>".$total."</td>";
                          }
                          echo "<td class='warning'>".$fila->cantidads."</td>";
                          echo "<td class='danger'>".$fila->vunitarios."</td>";
                          echo "<td class='info'>".$fila->vtotals."</td>";

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
        <h4 class="modal-title">Ingresos/Salidas-- <?php echo $nombre; ?></h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label >Fecha:</label>
          <input type="date" class="form-control" id="fechaK">
      </div>
      <div class="form-group">
        <label >Descripcion:</label>
        <input type="text" class="form-control" id="descripcionK">
    </div>
    <div class="form-group">
      <label for="compra" >Ingreso:</label>
      <input type="radio" class="radio-inline" id="accion2" name="accion" value="compra" checked onclick="llamado()">
      <label >Salida:</label>
      <input type="radio" class="radio-inline" id="accion2" name="accion" value="venta" onclick="llamado()">
  </div>
  <div class="form-group">
    <label >Cantidad:</label>
    <input type="number" class="form-control" id="cantidadK" min="1" placeholder="0" onkeyup="subtotal()">
</div>
<div class="form-group">
  <label >Valor Unitario:</label>
  <input type="number" class="form-control" step="0.01" min="0.01" id="vunitarioK" placeholder="$0.00" onkeyup="subtotal()">
</div>
<div class="form-group">
  <label >Subtotal:</label>
  <input type="number" class="form-control" step="0.01" min="0.01" id="subtotalK" placeholder="$0.00" readonly>

</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default"  onclick="ejecutar()">Completar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

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
