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
        <a class="navbar-brand" href="#">La Cancha de tu Hermana</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.html">Principal</a></li>
          <li><a href="torneos">Torneo</a></li>
          <li><a href="equipos.html">Equipo</a></li>
          <li><a href="jugadores.html">Jugadores</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><?php echo($_SESSION['usuario']); ?></a></li>
        </ul>
      </div>
    </div>
  </nav>