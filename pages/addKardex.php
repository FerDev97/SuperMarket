<?php
include "conexion.php";

$bandera = $_REQUEST["bandera"];
$baccion = $_REQUEST["baccion"];
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
      msg("Margen: ".$margen);
    }
  }
  //Obtendremos el ultimo valor total del saldo en el kardex
  $consulta1="select * from kardex where idproducto='".$idproducto."' order by idkardex";
  $resultado1=$conexion->query($consulta1);
  if($resultado1->num_rows<1)
  {
    $valorTotalAnterior=0;
    msg("Valor T Anterior:".$valorTotalAnterior);
  }else {
    if ($resultado1) {
      while ($fila1=$resultado1->fetch_object()) {
        $valorTotalAnterior=$fila1->vtotals;
        msg("Valor T Anterior:".$valorTotalAnterior);
      }
    }else {
        msg(mysqli_error($conexion));
    }
  }


  if ($accion==1) {
    //va a ser compra
    msg("Va a ser compra");
    msg($fecha);
    msg($descripcion);
    msg($accion);
    msg($cantidad);
    msg($vunitario);
    msg($subtotalK);
    $cantidadP=$cantidadP+$cantidad;
    $nuevoValorTotalS=$valorTotalAnterior+$subtotalK;
    $valorUnitarioS=$cantidadP/$nuevoValorTotalS;
    $consulta3  = "INSERT INTO kardex VALUES('null','" . $idproducto . "','" . $fecha . "','" . $descripcion . "','" . $accion . "','" . $cantidad . "','" . $vunitario . "','" . $cantidadP . "','" . $valorUnitarioS . "','" . $nuevoValorTotalS . "')";
    $resultado3 = $conexion->query($consulta3);
    if ($resultado3) {
        msg("Exito Compra");
        //AHORA A ACTUALIZAR LOS NUEVOS VALORES QUE TENDRA DICHO Producto
        //nuevo precio del productos
        $nuevoPrecio=($valorUnitarioS*$margen)+$valorUnitarioS;
        $consulta4="UPDATE productos set cantidadproductos='".$cantidadP."',precioproductos='".$nuevoPrecio."'";
        $resultado = $conexion->query($consulta);
        if ($resultado) {
            msg("Exito Producto");
        } else {
            msg("No Exito Producto");
        }
      } else {
        msg(mysqli_error($conexion));
    }
  }
  else {
    //va a ser una venta
    $consulta  = "INSERT INTO kardex VALUES('".$numeroPartida1."','" . $concepto . "','" . $fecha . "','" . $idanio . "')";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("Exito Partida");
      } else {
        msg("No Exito Partida");
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
    //echo "document.location.href='kardex.php';";
    echo "</script>";
}
?>
