<?php
    require_once(MODELOS . 'torneosModel.php');



    class torneosController
    {
        // Validar Sesion y roles
        function __construct(){
		    session_start();
            
        }

        public function index(){
            require_once(VISTAS . "html/inc/head.php");
			require_once(VISTAS . "html/inc/nav.php");
			require_once(VISTAS . "html/inc/header.php");
			require_once(VISTAS . "html/inc/breadcrumb.php");
            $torneos = new Torneos;
            $listaTorneo = $torneos->listar();

			require_once(VISTAS . "html/torneos.php");

        }


        public function listar($parametros = 0){
            echo(" lista de torneos");


        }

        public function eliminar($parametro){

        }
    }
    

?>