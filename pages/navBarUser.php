<?php session_start(); ?>
<div class="nav_menu">
  <nav>
    <div class="nav toggle">
      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>

    <ul class="nav navbar-nav navbar-right">
      <li class="">
        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          <img src="images/img.jpg" alt=""><?php echo $_SESSION["id"];?>
          <span class=" fa fa-angle-down"></span>
        </a>
        <ul class="dropdown-menu dropdown-usermenu pull-right">
          <?php
          if ($_SESSION["tipousuario"]=="Administrador") {
            echo "<li><a href='editadministradores.php?id=".$_SESSION["id"]."'>Perfil</a></li>";
          }
          if ($_SESSION["tipousuario"]=="Cliente") {
            echo "<li><a href='editclientes.php?id=".$_SESSION["id"]."'>Perfil</a></li>";
          }
          if ($_SESSION["tipousuario"]=="Empleado") {
            echo "<li><a href='editempleados.php?id=".$_SESSION["id"]."'>Perfil</a></li>";
          }
           ?>

          <li>
            <a href="javascript:;">
              <span class="badge bg-red pull-right">50%</span>
              <span>Ajustes</span>
            </a>
          </li>
          <li><a href="javascript:;">Ayuda</a></li>
          <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
        </ul>
      </li>
    </ul>
  </nav>
</div>
