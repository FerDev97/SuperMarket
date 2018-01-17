<?php  session_start();

$_SESSION["tipousuario"]="invitado";
$_SESSION["usuario"]="Invitado";
unset($_SESSION["acumulador"]);
unset($_SESSION["matriz"]);
header('Location: indexCliente.php');

 ?>
