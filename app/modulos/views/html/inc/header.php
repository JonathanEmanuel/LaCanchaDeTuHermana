<header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <?php
            // Si fue declarada antes la varible $nombrePanel 
            if(isset($nombrePanel)){
              switch ($nombrePanel) {
                case 'Torneos':
                  echo('
                        <h1><i class="fa fa-' .'trophy' .'" aria-hidden="true"></i> '. $nombrePanel .' <small>'. $_SESSION['usuario'].'</small></h1>
                  ');
                  break;
                
                default:
                  echo('
                    <h1><i class="fa fa-home" aria-hidden="true"></i> Principal <small>Administre aqui su pagina</small></h1>
                  ');
                  break;
              }
            } else {

            }

          ?>
        </div>
        <div class="col-md-2">
          <?php if($nombrePanel == "Principal") {
            echo('
              <div class="dropdown crear">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="true">
                  <i class="fa fa-plus-square" aria-hidden="true"></i> Crear Entidad
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuCrearEntidad">
                  <li><a type="button" data-toggle="modal" data-target="#modalNuevoEquipo">Agregar Equipo</a></li>
                  <li><a href="#">Agregar Jugador</a></li>
                  <li><a href="#">Agregar Usuario</a></li>
                </ul>
              </div>
              ');
            }else {
              echo("
                <button id='btn-nuevo-$nombrePanel' class='btn btn-default'>
                  <i class='fa fa-plus-square' aria-hidden='true'></i> 
                $nombrePanel</button>
              ");
            }
          ?>
        </div>
      </div>
    </div>
  </header>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="active">Principal</li>
      </ol>
    </div>
  </section>