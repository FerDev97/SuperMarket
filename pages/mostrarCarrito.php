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
        function procesar()
        {
          if (document.getElementById("logged").value=="si") {
            alert("Ya esta loggeado y puede comprar");
            document.getElementById("bandera").value="comprar";
            document.supermarket.submit();
          }else {
            alert("Por favor inicie sesion antes de comprar.");
            document.location.href="login.php?redir=ok";
          }
        }
        function verC(id,maximo)
        {
          var valor=document.getElementById(""+id).value;
          if (valor<1 || valor=="-" || valor=="e") {
            alert("La cantidad deseada es invalida");
            var valor=document.getElementById(""+id).value=1;
          }else {
            if (valor>maximo) {
              alert("La cantidad deseada excede el maximo disponible.");
              var valor=document.getElementById(""+id).value=document.getElementById(""+id).max;
            }
          }
        }
        function quitarCarrito(id,precioV,opcion)
        {
          if (id==""){
            document.getElementById("carrito").innerHTML="";
            return;
          }
          if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        }else  {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
          if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("carrito").innerHTML=xmlhttp.responseText;
          }
        }
        //opciones para el carrito
              if(opcion=="quitar")
              {
                alert("Va a quitar");
                alert("ID:"+id);
                alert("Opcion:"+opcion);
                xmlhttp.open("GET","ajaxCarrito.php?id="+id+"&opcion="+opcion+"&precio="+precioV,true);
                xmlhttp.send();
                location.reload();
              }
        }
        function ajaxCarrito(id,precioV,opcion)
        {

          if (opcion!=0) {
            alert("El producto es:"+id+" y la cantidad deseada es: "+document.getElementById(""+id).value+"A :"+precioV);
            alert(opcion);
            var cantidad=document.getElementById(""+id).value;
          }
          if (id==""){
            document.getElementById("carrito").innerHTML="";
            return;
          }
          if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        }else  {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
          if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("carrito").innerHTML=xmlhttp.responseText;
          }
        }
        //opciones para el carrito
              if(opcion=="agregar")
              {
                xmlhttp.open("GET","ajaxCarrito.php?id="+id+"&opcion="+opcion+"&cantidad="+cantidad+"&precio="+precioV,true);
                xmlhttp.send();
              }
              if(opcion=="quitar")
              {
                xmlhttp.open("GET","ajaxCarrito.php?id="+id+"&opcion="+opcion+"&cantidad="+cantidad+"&precio="+precioV,true);
                xmlhttp.send();

              }
              if(opcion==0)
              {
                xmlhttp.open("GET","ajaxCarrito.php?id="+id+"&opcion=mostrar",true);
                xmlhttp.send();
              }
        }
    </script>
  </head>
  <body class="nav-md" onload="ajaxCarrito('0','0','0');">
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
            <?php   if ($_SESSION["tipousuario"]=="invitado" || $_SESSION["tipousuario"]=="Cliente") {
                if ($_SESSION["tipousuario"]=="Cliente") {
                echo "<input type='hidden' id='logged' value='si'></input>";
              }else {
                echo "<input type='hidden' id='logged' value='no'></input>";
              }
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
                <h3>Productos <small> Listado de todos los productos en el carrito.</small></h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Productos<small>Listado</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Resultados por pagina.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Producto</th>
                          <th>Cantidad</th>
                          <th>Precio Unitario</th>
                          <th>Subtotal</th>
                          <th>Quitar</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                      include 'conexion.php';
                      //RECORRER LA MATRIZ DE LOS PRODUCTOS
                      $acumulador=$_SESSION['acumulador'];
                      $matriz=$_SESSION['matriz'];
                      for ($i=1; $i <=$acumulador ; $i++) {
                        if (array_key_exists($i, $matriz)) {
                          $result = $conexion->query("select p.idproductos as idprod, p.codigoproductos as codigo, p.nombreproductos as nombre,p.preciocompra as precioC,p.precioventa as precioV,p.cantidadproductos as cantidad, c.categoria as categoria,p.disponibilidad as disp, pr.nombre as proveedor from productos as p, categorias as c, proveedores as pr where p.idcategoria=c.idcategoria and p.idproveedor=pr.idproveedor and p.disponibilidad=1 and p.cantidadproductos>0 and p.idproductos=".$matriz[$i][0]);
                          if ($result) {
                            while ($fila = $result->fetch_object()) {
                              echo "<tr>";
                              $producto=$fila->idprod;
                              echo "<td>".$fila->nombre."</td>";
                              echo "<td> ".$matriz[$i][1]."</td>";
                              echo "<td>".$matriz[$i][2]."</td>";
                              echo "<td>".$matriz[$i][3]."</td>";
                              $totalDelTotal=$totalDelTotal+$matriz[$i][3];
                              echo "<td style='text-align:center;'> <button title='Agregar al carrito.' align='center' type='button' class='btn btn-default' onclick=quitarCarrito(" . $i . ",".$fila->precioV.",'quitar');><i class='fa fa-remove'></i>
                               </button></td>";
                              echo "</tr>";
                               }
                          }
                        }
                      }
                      echo "<tr class='danger' border='1'>";
                        echo "<td colspan='4'>TOTAL:</td>";
                        echo "<td >".$totalDelTotal."</td>";
                      echo "</tr>";
                       ?>
                      </tbody>
                    </table>
                    <input type="button" class="btn btn-default" value="Pagar." data-toggle="tooltip" data-placement="bottom" title="Proceder a efectuar la compra." onclick="procesar()"/>
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
}
if ($bandera == "comprar") {
  // $consulta = "UPDATE productos SET disponibilidad = '0' WHERE idproductos = '".$baccion."'";
  //   $resultado = $conexion->query($consulta);
    // if ($resultado) {
    //     msg("Exito");
    // } else {
    //     msg("No Exito");
    // }
    msg("Esta a punto de comprar.");
    $usuario=$_SESSION['usuario'];
    msg("El dia actual es".date('d')."-".date('m')."-".date('y'));
    $fechaactual=date('d')."-".date('m')."-".date('y');
    $consulta="INSERT INTO ventas VALUES('null','".$fechaactual."','".$usuario."')";
    $resultVenta = $conexion->query($consulta);
    if ($resultVenta) {
      msg("Se ha registrado la venta.");
    }
    //agarrar el id de la venta registrada
    $resultNum = $conexion->query("select * from ventas");
    if ($resultNum) {
      while ($fila = $resultNum->fetch_object()) {
        $idventa=$fila->idventa;
      }
    }
    $acumulador=$_SESSION['acumulador'];
    $matriz=$_SESSION['matriz'];
    for ($i=1; $i <=$acumulador ; $i++) {
      if (array_key_exists($i, $matriz)) {
        //consulta para los datos de los productos.
        $result = $conexion->query("select p.idproductos as idprod, p.codigoproductos as codigo, p.nombreproductos as nombre,p.preciocompra as precioC,p.precioventa as precioV,p.cantidadproductos as cantidad, c.categoria as categoria,p.disponibilidad as disp, pr.nombre as proveedor from productos as p, categorias as c, proveedores as pr where p.idcategoria=c.idcategoria and p.idproveedor=pr.idproveedor and p.disponibilidad=1 and p.cantidadproductos>0 and p.idproductos=".$matriz[$i][0]);
        if ($result) {
          while ($fila = $result->fetch_object()) {
            msg($fila->nombre);
            //Ahora se va a registrar la venta.
            $resultDetalle = $conexion->query("INSERT INTO detalles VALUES('null','".$idventa."','".$fila->idprod."','".$fila->precioV."','".$matriz[$i][2]."')");
            if ($resultDetalle) {
              msg("Se ha agregado a detalle.");
            }
            //Obtendremos el ultimo valor total del saldo en el kardex
            $idproducto=$fila->idprod;
            $cantidadP=$fila->cantidad;
            $consulta1="select * from kardex where idproducto='".$fila->idprod."' order by idkardex";
            $resultado1=$conexion->query($consulta1);
            if($resultado1->num_rows<1)
            {
              $valorTotalAnterior=0;
            }else {
              if ($resultado1) {
                while ($fila1=$resultado1->fetch_object()) {
                  $valorTotalAnterior=$fila1->vtotals;
                  msg("Obtiene el valor total anterior.");
                }
              }else {
                  msg(mysqli_error($conexion));
              }
            }
            //va a ser una venta
            $cantidadP=$cantidadP-$matriz[$i][1];
            $subtotalK=$matriz[$i][3];
            $nuevoValorTotalS=$valorTotalAnterior-$subtotalK;
            $nuevoValorTotalS=number_format($nuevoValorTotalS, 2, ".", "");
            $valorUnitarioS=$nuevoValorTotalS/$cantidadP;
            $valorUnitarioS=number_format($valorUnitarioS, 2, ".", "");
            $consulta3  = "INSERT INTO kardex VALUES('null','" . $idproducto . "','" . $fechaactual . "','Venta realizada.','0','" . $matriz[$i][1] . "','" . $matriz[$acumulador][2] . "','" . $cantidadP . "','" . $valorUnitarioS . "','" . $nuevoValorTotalS . "')";
            $resultado3 = $conexion->query($consulta3);
            if ($resultado3) {
                msg("Entra al result del kardex");
                //msg("Exito Compra");
                //AHORA A ACTUALIZAR LOS NUEVOS VALORES QUE TENDRA DICHO Producto
                //nuevo precio del productos
                $consulta4="UPDATE productos set cantidadproductos='".$cantidadP."'where idproductos='".$idproducto."'";
                $resultado = $conexion->query($consulta4);
                if ($resultado) {
                    msg("Se redujo la cantidad.");
                  //header('Location:kardex.php?id='.$idproducto);
                } else {
                    //msg("No Exito Producto");
                }
              } else {
                msg(mysqli_error($conexion));
            }
          }
        }
      }
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
    //echo "document.location.href='listaproductos.php';";
    echo "</script>";
}
?>
