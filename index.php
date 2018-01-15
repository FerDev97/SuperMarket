<?php session_start();
if ($_SESSION["tipoUsuario"]=="Administrador") {
	Header("Location: pages/indexAdmin.php");
}else {
	//$errorLogin=$_GET["error"];
	//if($errorLogin=="login") {
	if ($_SESSION["tipoUsuario"]=="Cliente" || $_SESSION["tipoUsuario"]=="Empleado" ) {
		header('Location: pages/indexCliente.php');
	}else {
		//session como invitado
		$_SESSION["usuario"]="invitado";
		$_SESSION["tipoUsuario"]="cliente";
		msg($_SESSION["usuario"]);
		msg($_SESSION["tipoUsuario"]);
		header('Location: pages/indexCliente.php');
	}
}
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
  //  echo "document.location.href='cuenta.php';";
    echo "</script>";
}

 ?>
