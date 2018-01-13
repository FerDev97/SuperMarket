<?php
include "conexion.php";

$bandera = $_REQUEST["bandera"];
$idproducto = $_REQUEST["id"];
$fecha = $_REQUEST["fechaR"];
$descripcion = $_REQUEST["descripcionR"];
$accion = $_REQUEST["accion"];
$cantidad = $_REQUEST["cantidadR"];
$vunitario = $_REQUEST["vunitarioR"];
$subtotalK = $_REQUEST["subtotalR"];

if ($bandera == 'enviar') {
    echo "<script type='text/javascript'>";
    echo "document.location.href='editproductos.php?id=" . $baccion . "';";
    echo "</script>";
    # code...
}
if ($bandera=="add") {
  //codigo para guardar en la tabla kardex
  //Primero obgtendremos el numero de productos disponibles del que queremos Agregar
  $consulta="select * from productos where idproductos=".$idproducto;
  $resultado=$conexion->query($consulta);
  if ($resultado) {
    while ($fila=$resultado->fetch_object()) {
      $cantidadP=$fila->cantidadproductos;
      $margen=($fila->margen)/100;
    }
  }
  //Obtendremos el ultimo valor total del saldo en el kardex
  $consulta1="select * from kardex where idproducto='".$idproducto."' order by idkardex";
  $resultado1=$conexion->query($consulta1);
  if($resultado1->num_rows<1)
  {
    $valorTotalAnterior=0;
  }else {
    if ($resultado1) {
      while ($fila1=$resultado1->fetch_object()) {
        $valorTotalAnterior=$fila1->vtotals;
      }
    }else {
        msg(mysqli_error($conexion));
    }
  }
  if ($accion==1) {
    //va a ser compra
    $cantidadP=$cantidadP+$cantidad;
    $nuevoValorTotalS=$valorTotalAnterior+$subtotalK;

    $nuevoValorTotalS=number_format($nuevoValorTotalS, 2, ".", "");
    $valorUnitarioS=$nuevoValorTotalS/$cantidadP;
    $valorUnitarioS=number_format($valorUnitarioS, 2, ".", "");
    $consulta3  = "INSERT INTO kardex VALUES('null','" . $idproducto . "','" . $fecha . "','" . $descripcion . "','" . $accion . "','" . $cantidad . "','" . $vunitario . "','" . $cantidadP . "','" . $valorUnitarioS . "','" . $nuevoValorTotalS . "')";
    $resultado3 = $conexion->query($consulta3);
    if ($resultado3) {
        //msg("Exito Compra");
        //AHORA A ACTUALIZAR LOS NUEVOS VALORES QUE TENDRA DICHO Producto
        //nuevo precio del productos
        $tporcen=$valorUnitarioS*$margen;
        $nuevoPrecio=$vunitario/(1-$margen);
        $nuevoPrecio=number_format($nuevoPrecio, 2, ".", "");
        $consulta4="UPDATE productos set cantidadproductos='".$cantidadP."',preciocompra='".$vunitario."',precioventa='".$nuevoPrecio."' where idproductos='".$idproducto."'";
        $resultado = $conexion->query($consulta4);
        if ($resultado) {
          //  msg("Exito Producto");
          header('Location:kardex.php?id='.$idproducto);
        } else {
            //msg("No Exito Producto");
        }
      } else {
        msg(mysqli_error($conexion));
    }
  }else {
    //va a ser una venta
    $cantidadP=$cantidadP-$cantidad;
    $nuevoValorTotalS=$valorTotalAnterior-$subtotalK;
    $nuevoValorTotalS=number_format($nuevoValorTotalS, 2, ".", "");
    $valorUnitarioS=$nuevoValorTotalS/$cantidadP;
    $valorUnitarioS=number_format($valorUnitarioS, 2, ".", "");
    $consulta3  = "INSERT INTO kardex VALUES('null','" . $idproducto . "','" . $fecha . "','" . $descripcion . "','" . $accion . "','" . $cantidad . "','" . $vunitario . "','" . $cantidadP . "','" . $valorUnitarioS . "','" . $nuevoValorTotalS . "')";
    $resultado3 = $conexion->query($consulta3);
    if ($resultado3) {
        //msg("Exito Compra");
        //AHORA A ACTUALIZAR LOS NUEVOS VALORES QUE TENDRA DICHO Producto
        //nuevo precio del productos
        $consulta4="UPDATE productos set cantidadproductos='".$cantidadP."'where idproductos='".$idproducto."'";
        $resultado = $conexion->query($consulta4);
        if ($resultado) {
          //  msg("Exito Producto");
          header('Location:kardex.php?id='.$idproducto);
        } else {
            //msg("No Exito Producto");
        }
      } else {
        msg(mysqli_error($conexion));
    }
}
}

?>
