<?php
    require_once(MODELOS . 'equiposModel.php');
    require_once(MODELOS . 'torneosModel.php');

    class equiposController {
        // Validar Sesion y roles
        function __construct(){
		    session_start();
            /* Si no hay una sesión creada, redireccionar al index. */
            if(empty($_SESSION['key'])) { // Seria para poner un key generado en el inicio de sesion, HASH (DESARROLLAR!)
                header('Location: ./cuenta/salir');
            } 

        }
        // index principal con ComboBox de Torneos y al seleccionar uno, carga Lista de Equipos.
        public function index(){
            // Carga lista de Torneos
            $torneos = new Torneos;
            $listaTorneo = $torneos->listar();

            $nombrePanel = "Equipos";
            // Carga Head, Menu y header comun de todos los paneles
            require_once(VISTAS . "html/inc/head.php");
			require_once(VISTAS . "html/inc/nav.php");
            require_once(VISTAS . "html/inc/header.php");

            // Carga Pagina del panel
            require_once(VISTAS . "html/equipos.php");
            // No se carga el modal como archivo externo, porque se lo incluyo dentro del container 
            // Donde esta #appEquipos, que se ejecutra la instancia de Vue.js
            //require_once(VISTAS . "html/inc/modalEquipo.php");

            require_once(VISTAS . "html/inc/footer.php");
            // JS con libreria Vue
            echo('<script src="../publico/lib/vue.js"></script>');
            echo('<script src="../publico/lib/vue-resource.min.js"></script>');

            // JS con funciones para el Panel
            echo('<script src="../publico/js/equipos.js"></script>');
           
        }

        // Guarda un equipo con sus jugadores
        public function guardar($parametros=array()){
            // Obtiene JSON como un String y lo convierte a Objeto
            $jsonString = file_get_contents('php://input');
            $jsonObjeto = json_decode($jsonString);

            print_r($jsonObjeto);
            echo($jsonObjeto->Nombre);
        }

        // Listar Equipos de un Torneo
        public function listar($parametros=''){

        }
    }
?>