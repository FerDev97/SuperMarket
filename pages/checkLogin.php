<?php
			$loginNombre = $_REQUEST["usuario"];
			$loginPassword =$_REQUEST["contra"];
      $correcto=false;
    include "../config/conexion.php";
      $result = $conexion->query("select * from usuarios where idusuario= '$loginNombre' AND contrasena='$loginPassword'");
if ($result) {
    while ($fila = $result->fetch_object()) {
        $contra = $fila->contrasena;
				$usuario=$fila->idusuario;
				$tipousuario=$fila->tipousuario;
				$estado=$fila->estadousuario;
        if($contra==$loginPassword && $estado==1){
          $correcto=true;
        }
    }
}
			if(isset($loginNombre) && isset($loginPassword)) {
				if($correcto==true) {
					session_start();
					$_SESSION["logueado"] = TRUE;
					$_SESSION["usuario"] = $usuario;
					$_SESSION["tipousuario"] = $tipousuario;
					header("Location: ../index.php");
				}
				else {
					Header("Location: login.php?aux=true");
				}
			}
 ?>
