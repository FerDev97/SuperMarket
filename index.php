<?php session_start();
if ($_SESSION["tipousuario"]=="Administrador") {
	Header("Location: pages/indexAdmin.php");
}else {
	//$errorLogin=$_GET["error"];
	//if($errorLogin=="login") {

	if ($_SESSION["tipousuario"]=="Cliente" || $_SESSION["tipousuario"]=="Empleado" ) {
		header('Location: pages/indexCliente.php');
	}else {
		//session como invitado
		$_SESSION["tipousuario"]="invitado";
		$_SESSION["usaurio"]="Invitado";
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
