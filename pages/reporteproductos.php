<?php
 $numeroFilas=55; // cuantas filas por llamarPagina
 function dameFecha($fecha,$xdias=0){
   list($year,$mon,$day)=explode('-',$fecha);
   return date('d-m-Y',mktime(0,0,0,$mon,$day+$xdias,$year));
 }
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Reporte de Listado de Productos</title>
     <style type="text/css">
     .formatocontenidotabla{
       font-family: Courier,Courier,monospace;
       font-size: 12px;
     }
     </style>
     <style type="text/css">
     .titulotabla{
       font-family: Arial,Helvetica,sans-serif;
       font-size: 12px;
     }
     </style>
    <style type="text/css">
    @media all{
      div.saltopagina{
        display: none;
      }
    }
    @media print{
      div.saltopagina{
        display: block;
        page-break-before: always;
      }
    }
  </style>
  <script type="text/javascript">
  function ocultar(){
    document.formulario.boton.style.visibility="hidden";
    print();
    document.formulario.boton.style.visibility="visible";
  }
</script>
</head>
<body>
  <?php function encabezado(){
  ?>
    <div id="reporte">
      <table border="0" width="100%">
        <tr>
          <th align="left" class="titulotabla">REPORTE LISTADO DE PRODUCTOS</th>
          <th align="right" class="titulotabla">Fecha generacion:<?php echo date("d-m-Y"); ?></th>
        </tr>
        <tr>
          <th align="left" class="titulotabla"></th>
          <th align="right" class="titulotabla">Hora generado:<?php echo date("H:i:s"); ?></th>
        </tr>
        <tr>
          <th colspan="2" align="left" class="titulotabla"></th>
        </tr>
      </table>
      <br>
      <table border="1" class="formatocontenidotabla" cellspacing=0 cellpadding=0 rules="all">
        <tr>
            <td width="55" align="center"><strong>N&deg;</strong></td>
            <td width="300" align="center"><strong>Nombre</strong></td>
            <td width="300" align="center"><strong>Categoria</strong></td>
          </tr>
      </table>
    </div>
  <?php }
  $contador=0;
  $numpagina=0;
  $datos=0;
  include "conexion.php";
  $result =$conexion->query("select categoria,nombreproductos from productos,categorias where categorias.idcategoria=productos.idcategoria order by nombreproductos");
  $cuantasPaginas=mysqli_num_rows($result);
  //$flor=explode(".",$cuantasPaginas*20);
  $flor=explode(".",$cuantasPaginas);
  $cuantasPaginas=$flor[0]+1;
  if ($result) {
    while($fila=$result->fetch_object()){
      //for($i=0;i <=20 ;$i++){
      if($contador%$numeroFilas==0){
        encabezado();
        echo "<table border='1' class='formatocontenidotabla' cellspacing='0' cellpadding='0' rules='all'>";

      }
      $contador++;
      echo "<tr>";
      echo "<td width='55' align='center'>".$contador."</td>";
      echo "<td width='300'>".$fila->nombreproductos."</td>";
      echo "<td width='300'>".$fila->categoria."</td>";
      echo"</tr>";
      if($contador%$numeroFilas==0){
        $numPagina++;
        echo "</table>";
        echo "<div align='center' class='formatocontenidotabla'>".$numPagina."de".ceil(number_format($cuantasPaginas/$numeroFilas,4))."</div>";
        echo "<div class='saltopagina'></div>";
      }
    }
  }
//}
  echo "</table>";
  echo "<div align='center' class='formatocontenidotabla'>".($numPagina+1)."de".ceil(number_format($cuantasPaginas/$numeroFilas,4))."</div>";
  ?>
  <form id="formulario" name="formulario" method="post" action="">
    <div align="center">
      <input type="button" name="boton" value="Imprimir" onclick="ocultar()"/>
    </div>
</form>
</body>
 </html>
