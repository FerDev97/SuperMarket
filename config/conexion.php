<?php
$conexion = new mysqli('localhost', 'root', '', 'supermercado');
if ($conexion->connect_errno) {
    echo "Error de conexion";
}
