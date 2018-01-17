<?php session_start();

$opcion=$_REQUEST["opcion"];
$id=$_REQUEST["id"];
$cantidad=$_REQUEST["cantidad"];
$precio=$_REQUEST["precio"];
//compararemos la cantidad que desea agregar al carrito con la cantidad disponible en la base
include 'conexion.php';
$result = $conexion->query("select p.cantidadproductos as cantidad from productos as p where idproductos=".$id);
if ($result) {
  while ($fila=$result->fetch_object()) {
    $pdisponibles=$fila->cantidad;
  }
}
//contaremos cuantos productos tenemos ya en el carrito
$acumulador=$_SESSION['acumulador'];
$matriz=$_SESSION['matriz'];
for ($i=1; $i <=$acumulador ; $i++) {
  if (array_key_exists($i, $matriz)) {
    if ($matriz[$i][0]==$id) {
      // echo $matriz[$i][0];
      // echo "Es igual a=".$id." ";
      $totalcarrito=$totalcarrito+$matriz[$i][1];
      // echo "Su total hasta ahorita es: ".$totalcarrito;
      // echo "Y la cantidad maxima es: ".$pdisponibles;
    }
  }
}
if ($totalcarrito+$cantidad>$pdisponibles) {
  $cant=$totalcarrito+$cantidad-$pdisponibles;
}else {

}
if ($opcion=="agregar") {
  if (isset($cant)) {
    $totalDelTotal="La cantidad que desea agregar supera por: ".$cant." a la cantidad disponible.";
  }else {
    $acumulador=$_SESSION["acumulador"];
  	$matriz=$_SESSION["matriz"];
  	$acumulador++;
    $matriz[$acumulador][0]=$id;
  	$matriz[$acumulador][1]=$cantidad;
  	$matriz[$acumulador][2]=$precio;
    $subtotal=$precio*$cantidad;
  	$matriz[$acumulador][3]=$subtotal;
    $_SESSION['acumulador']=$acumulador;
  	$_SESSION['matriz']=$matriz;
    //conteo para saber cuanto se lleva en $total
    $acumulador=$_SESSION['acumulador'];
    $matriz=$_SESSION['matriz'];
    for ($i=1; $i <=$acumulador ; $i++) {
    	if (array_key_exists($i, $matriz)) {
    		$totalDelTotal=$totalDelTotal+$matriz[$i][3];
    	}
    }
  }
    if (isset($cant)) {
      echo '<label>'.$totalDelTotal.'</label>';
      echo '<a id="menu_toggle"><i class="fa fa-shopping-cart"></i></a>';

    }else {
        echo '<a id="menu_toggle" href="mostrarCarrito.php"><i class="fa fa-shopping-cart"></i>Total:'.$totalDelTotal.'</a>';
    }

}
if($opcion=="quitar") {
  $indice=$_GET["id"];
	$matriz=$_SESSION['matriz'];
	unset($matriz[$id]);//eliminacion de un indice en la matriz
	$_SESSION['matriz']=$matriz;
  $acumulador=$_SESSION['acumulador'];
  $matriz=$_SESSION['matriz'];
  for ($i=1; $i <=$acumulador ; $i++) {
    if (array_key_exists($i, $matriz)) {
      $totalDelTotal=$totalDelTotal+$matriz[$i][3];
    }
  }
    echo '<a id="menu_toggle" href="mostrarCarrito.php"><i class="fa fa-shopping-cart"></i>Total:'.$totalDelTotal.'</a>';

}
if($opcion=="mostrar") {
  $acumulador=$_SESSION['acumulador'];
  $matriz=$_SESSION['matriz'];
  for ($i=1; $i <=$acumulador ; $i++) {
    if (array_key_exists($i, $matriz)) {
      $totalDelTotal=$totalDelTotal+$matriz[$i][3];
    }
  }
    echo '<a id="menu_toggle" href="mostrarCarrito.php"><i class="fa fa-shopping-cart"></i>Total:'.$totalDelTotal.'</a>';

}

function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "document.location.href='listaproductos.php';";
    echo "</script>";
}
 ?>
