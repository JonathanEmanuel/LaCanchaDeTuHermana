<nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
          aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="./"><i class="fa fa-futbol-o" aria-hidden="true"></i> La Cancha de tu Hermana</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li <?php  if($nombrePanel == "Principal")  echo('class="active"'); ?>><a href="index">Principal</a></li>
          <li <?php  if($nombrePanel == "Clientes")  echo('class="active"'); ?> ><a href="clientes">Clientes</a></li>
          <li <?php  if($nombrePanel == "Torneos")  echo('class="active"'); ?> ><a href="torneos">Torneos</a></li>
          <li <?php  if($nombrePanel == "Equipos")  echo('class="active"'); ?>><a href="equipos">Equipos</a></li>
          <li <?php  if($nombrePanel == "Jugadores")  echo('class="active"'); ?>><a href="jugadores">Jugadores</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown dropdown-submenu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo($_SESSION['usuario']); ?> <i class="fa fa-caret-down" aria-hidden="true"></i> </a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Cuenta</a></li>
                <li><a href="#"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Configuraciones</a></li>
                
                <li><a href="cuenta/salir"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i> Salir</a></li>
              </ul>
            </li>
        </ul>
      </div>
    </div>
  </nav>