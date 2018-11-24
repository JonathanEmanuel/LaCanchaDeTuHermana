<?php
    require_once(MODELOS . 'torneosModel.php');



    class torneosController
    {
        // Validar Sesion y roles
        function __construct(){
		    session_start();
            
        }

        // Ruta default del controlado, mostrara la pagina de torneos (Grilla de tornes, btn Crear Torneo, etc...)
        public function index(){
            $torneos = new Torneos;
            $listaTorneo = $torneos->listar();

            $nombrePanel = "Torneos";
    
            require_once(VISTAS . "html/inc/head.php");
			require_once(VISTAS . "html/inc/nav.php");
            require_once(VISTAS . "html/inc/header.php");
            // Se elimino "breadcrumb" porque se cargara en el Header 
			//require_once(VISTAS . "html/inc/breadcrumb.php");

            require_once(VISTAS . "html/torneos.php");
            require_once(VISTAS . "html/inc/modalTorneo.php");
            require_once(VISTAS . "html/inc/footer.php");
            // JS con funciones para el Panel
            echo('<script src="../publico/js/torneos.js"></script>');

        }

        // Ruta guardar Torneo, espera recibir un json con las variables
        public function guardar($parametro= ''){
            //$post = json_decode(file_get_contents('php://input'), true);
            if(  isset($_POST["torneoId"]) && isset($_POST["nombre"]) && isset($_POST['inicio']) && isset($_POST['fin']) && isset($_POST['logoUrl'])  ){
                $torneo =  new Torneos;

                $torneoId = $_POST["torneoId"];
                $nombre = $_POST["nombre"];
                $inicio = $_POST["inicio"]; // date("y-m-d", strtotime( $_POST["inicio"]));
                $fin = $_POST["fin"];
                $logoUrl = $_POST["logoUrl"];
                
                if( $torneoId == 0){
                    $torneoId = $torneo->guardar($nombre, $inicio, $fin, $logoUrl)['TorneoId'];
         
                

                    echo( json_encode(
                        array('TorneoId' => $torneoId,
                              'Nombre' => $nombre,
                              'Inicio' => $inicio,
                              'Fin' => $fin,
                              'LogoUrl' => $logoUrl   
                            )
                        ));
                } else {
                    //echo("Actualizar");
                    $torneoId = $torneo->actualizar($torneoId, $nombre, $inicio, $fin, $logoUrl)['TorneoId'];
                    echo(
                        json_encode( array('TorneoId' => $torneoId ))
                    );
                }
 
                
            } else {
                // Retorna JSON con mensaje de error.
            }
         
         
        }

        public function cargar($parametros = 0){
            $torneo =  new Torneos;

            $torneo->cargar($parametros[0]);
            echo(json_encode($torneo));

        }

        public function baja($parametros=''){
            $torneo =  new Torneos;
            $torneo->baja($parametros[0]);
            echo ( $parametros[0]);
        }
    }
    

?>