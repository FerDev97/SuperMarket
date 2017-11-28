<?php
include "../config/conexion.php";
$id = $_REQUEST["id"];
$tipo = $_REQUEST["tipo"];
if ($tipo=='cliente') {
	$result = $conexion->query("select fotoclientes as foto,tipofotoc as tipo from clientes where idclientes=" . $id . "");
if ($result) {
    while ($fila = $result->fetch_object()) {
        $imagen = $fila->foto;
        $tipo   = $fila->tipo;
        header("Content-type: " . $tipofotoc . "");
        echo $imagen;
    }
} else {
    echo '<option value="">Error en la BD </opcion>';
}
}

//cuando la imagen la solicite un administrador
if ($tipo=='administrador') {
	$result = $conexion->query("select fotoadministradores as foto,tipofotoa as tipo from administradores where idadministradores=" . $id . "");
if ($result) {
    while ($fila = $result->fetch_object()) {
        $imagen = $fila->foto;
        $tipo   = $fila->tipo;
        header("Content-type: " . $tipo . "");
        echo $imagen;
    }

} else {
    echo '<option value="">Error en la BD admin</opcion>';
}
}
//cuando la imagen la solicite un empleado
if ($tipo=='empleado') {
    $result = $conexion->query("select fotoempleados as foto,tipofotoe as tipo from empleados where idempleados=" . $id . "");
if ($result) {
    while ($fila = $result->fetch_object()) {
        $imagen = $fila->foto;
        $tipo   = $fila->tipo;
        header("Content-type: " . $tipo . "");
        echo $imagen;
    }

} else {
    echo '<option value="">Error en la BD empleado</opcion>';
}
}
//cuando la imagen la solicite un producto
if ($tipo=='producto') {
    $result = $conexion->query("select fotoproductos as foto,tipofotop as tipo from productos where idproductos=" . $id . "");
if ($result) {
    while ($fila = $result->fetch_object()) {
        $imagen = $fila->foto;
        $tipo   = $fila->tipo;
        header("Content-type: " . $tipo . "");
        echo $imagen;
    }

} else {
    echo '<option value="">Error en la BD producto</opcion>';
}
}

?>



