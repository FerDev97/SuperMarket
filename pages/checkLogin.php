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
					//obtener datos del admin
					if ($tipousuario=="Administrador") {
						//consulta para obtner los datos de los administradores.
						$result = $conexion->query("select * from administradores where idusuario= '$usuario'");
						if ($result) {
			    		while ($fila = $result->fetch_object()) {
											$id=$fila->idadministradores;
											$_SESSION["id"]=$id;
										}
								}

					}
					//obtener datos del cliente
					if ($tipousuario=="Cliente") {
						//consulta para obtner los datos de los clientes.
						$result = $conexion->query("select * from clientes where idusuario= '$usuario'");
						if ($result) {
			    		while ($fila = $result->fetch_object()) {
											$id=$fila->idclientes;
											$_SESSION["id"]=$id;
										}
								}

					}
					//obtener datos del empleado
					if ($tipousuario=="Empleado") {
						//consulta para obtner los datos de los empleados.
						$result = $conexion->query("select * from empleados where idusuario= '$usuario'");
						if ($result) {
			    		while ($fila = $result->fetch_object()) {
											$id=$fila->idempleados;
											$_SESSION["id"]=$id;
										}
								}

					}
					header("Location: ../index.php");
				}
				else {
					Header("Location: login.php?aux=true");
				}
			}
 ?>
