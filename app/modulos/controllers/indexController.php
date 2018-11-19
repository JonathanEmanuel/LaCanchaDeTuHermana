<?php
//require_once('html/index.php');

class indexController {

	function __construct() {
		//echo 'index principal </br>';
		session_start();
		//echo $_SESSION["usuario"];
		//echo '</br>';
		//echo $_SESSION["key"];
		 

	}

	public function index($parametro = null) {
		if(empty($parametro)){
			$parametro = "sin parametro";
		}
		
		    /* Si no hay una sesión creada, redireccionar al index. */
		if(empty($_SESSION['key'])) { // Seria para poner un key generado en el inicio de sesion, HASH (DESARROLLAR!)
			header('Location: cuenta/salir');
		} 

		//require_once("html/header.php");
		//require_once("html/menu.php");

		// Segun el perfilId mostrar panel o pagina para el visitante
		switch ($_SESSION['perfilId']) {
			case '1':	// Administrador
				$nombrePanel = "Principal";
				require_once(VISTAS . "html/inc/head.php");
				require_once(VISTAS . "html/inc/nav.php");
				require_once(VISTAS . "html/inc/header.php");
            // Se elimino "breadcrumb" porque se cargara en el Header 

				require_once(VISTAS . "html/inc/modalEquipo.php");


				echo("<h4>PANEL DEL ADMINISTRADOR");
				echo("<h4>PANEL DEL ADMINISTRADOR");


				require_once(VISTAS . "html/inc/footer.php");

				break;
			case '2':	// Cliente
				echo "<h4> PANEL DEL CLIENTE </h4>";

				break;
            
			default:
				echo "<h4> NO EXISTE EL PERFIL </h4>";
				break;
		}


		//require_once("html/footer.php");
	}


}

?>