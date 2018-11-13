<?php
	
	require_once(VISTAS.'cuentaView.php');
	require_once(MODELOS . 'cuentaModel.php');
	/**
	* 
	*/
	class CuentaController {

		function __construct() {
			session_start();
		}
		// Validaciones de usuario y clave
		private function validarDatosPOST() {
			// Verifica si recible las variables por $_POST
			$usuario_valido = (isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : "";
			$password_valido = (isset($_POST['clave'])) ? htmlspecialchars($_POST['clave']) : "";

			return array('email'=>$usuario_valido, 'clave'=>$password_valido);


		}

		public function ingresar($datos=array()) {
			// Valida datos
			$arrayDatosValidos = $this->validarDatosPOST();

			// Instancia al modelos
			$instancia = new cuentaVista(); // Inicia vista JSON

			if ($arrayDatosValidos['email'] != "" && $arrayDatosValidos['clave'] != "") {
				$usuario = new Cuenta;
				$usuario->buscarEmailPassword($arrayDatosValidos['email'], $arrayDatosValidos['clave'] );
				
				if($usuario->msj == "Existe") {
					//Iniciar Variables de Session
					$this->iniciarSesion($usuario);
					
					$instancia->logueCorrecto($usuario);
				} else { //  Si no existe
					$instancia->datosInvalidos();
				} 
			}
			else {
				$instancia->datosInvalidos();
			}
		}


		public function salir($datos=''){
			//session_start();
			unset($_SESSION['usuario']);
			unset($_SESSION['key']);
			  // Borra todas las variables de sesión 
  			
		
			//session_destroy();
			header('location: ../../index.php'); //redirige fuera de app
			//header('location: /');
			exit();
			//echo "Salistes...";
		}


		private function iniciarSesion($usuario) {
		//	session_start();
		
			$_SESSION['usuariioId'] = $usuario->usuarioId;
			$_SESSION['usuario'] = $usuario->email;
			$_SESSION['perfilId'] = $usuario->PerfilUsuarioId;
			$_SESSION['key'] = "LaDeTuHermana";// md5("oraguasoft2018");
		
/* 		$_SESSION['usuariioId'] = $usuario["usuarioId"];
		$_SESSION['usuario'] = $usuario["email"];
		$_SESSION['perfilUsuarioId'] = $usuario["perfilUsuarioId"];
			$_SESSION['key'] = "LaDeTuHermana";// md5("oraguasoft2018"); */
		}


	}
?>
