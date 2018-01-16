<?php
$conexion = new mysqli('localhost', 'root', '', 'superabi');
if ($conexion->connect_errno) {
    echo "Error de conexion";
}
