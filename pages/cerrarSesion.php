<?php  session_start();

$_SESSION["tipousuario"]="invitado";
$_SESSION["usuario"]="Invitado";
header('Location: indexCliente.php');

 ?>
