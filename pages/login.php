<?php
$aux=$_REQUEST["aux"];
$redir=$_REQUEST["redir"];
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Super Market| </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <script type="text/javascript">
      function verificar()
      {
        var user=document.getElementById("usuario").value;
        var contra=document.getElementById("contra").value;
        if (user=="" || contra=="") {
          alert("Por favor ingrese todos los campos.");
        }else {
          if (document.getElementById("redir").value=="ok") {
            alert("Voy a redireccionar.");
            location.href ="checkLogin.php?usuario="+user+"&contra="+contra+"&redir=ok";
          }else {
              location.href ="checkLogin.php?usuario="+user+"&contra="+contra;
          }

        }
      }
    </script>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="">
              <h1>Iniciar Sesion</h1>
              <input type="hidden" id="redir" value="<?php echo $redir;?>">
              <div>
                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" required="" value=""/>
              </div>
              <div>
                <input type="password" name="contra" id="contra" class="form-control" placeholder="Contraseña" required="" value=""/>
              </div>
              <?php
              if (isset($aux)) {
                echo "<label style='color:red;'>Usuario o contraseña invalidos.</label>";
              }
              ?>
              <div>
                <button type="button" class="btn btn-default submit" aling="center" onclick="verificar()">Entrar</button>
              </div>
              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">¿Aún no estás en SuperMarket?
                  <a href="Rclientes.php" class="to_register"> Registrarte </a>
                </p>

                <div class="clearfix"></div>
                <br />
                <div>
                  <h1><i class="fa fa-star"></i> SuperMarket </h1>
                    Super Market fue hecho por: <a href="">Fernando Y Jessica</a>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
