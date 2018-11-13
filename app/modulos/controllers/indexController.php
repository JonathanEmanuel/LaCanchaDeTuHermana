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
		
		echo("Usuario: ");
		echo($_SESSION['usuario']);
		//require_once("html/header.php");
		//require_once("html/menu.php");

		// Segun el perfilId mostrar panel o pagina para el visitante
		switch ($_SESSION['perfilId']) {
			case '1':	// Administrador
				//require_once("html/header.php");

				echo("<h4>PANEL DEL ADMINISTRADOR");
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