<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-lock"></i> Todos los productos. <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="todosP.php">Lista</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> Categorias.<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php
                      include "../config/conexion.php";
                      $result = $conexion->query("select * from categorias where estado='1' group by categoria order by categoria");
                      if ($result) {
                          while ($fila = $result->fetch_object()) {
                            echo "<li><a href='productosCategoria.php?idC=".$fila->idcategoria."&categoria=".$fila->categoria."'>".$fila->categoria."</a></li>";
                          }
                        }
                      ?>
                    </ul>
                  </li>
                  <!-- <li><a><i class="fa fa-list"></i> Kardex <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="kcompra.php">Compra</a></li>
                      <li><a href="kventa.php">Venta</a></li>
                    </ul>
                  </li> -->

                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
