<?php
require_once('./core/vista.php');
	/* 
	* Renderiza el JSON con los datos recibidos en el array
	*	------------------------------------------
	*	{
	*	    "status": 200,
	*	    "message": true | false,
	*	    "data": []
	*	}
	*	-------------------------------------------------
	*/
	class CuentaVista extends Vista {
		
		private $user = array();

		function __construct($datos = '') {
			
			//$this->data[] = array('nombre' => 'julian', 'apellido' => 'cruz');
			//$this->renderJSON();
		}

		public function logueCorrecto($usuario) {
			$this->message = "Logueo Correcto";
			/*
			$this->user['id'] = $usuario->usuarioId;
			$this->user['email'] = $usuario->email;
			$this->user['nombre'] = $usuario->nombre;
			*/
			$this->user['id'] = $usuario->usuarioId;
			$this->user['email'] = $usuario->email;
			$this->user['nombre'] = $usuario->nombreUsuario;
			// retorna JSON
			$this->data[] = $this->user;
			$this->renderJSON();

		}

// {"id_cuenta":"6","email":"noelia@gmail.com","fecha_creacion":"2017-10-27","msj":"El usuario ya existe"}
		public function registroExitoso() {
			$this->success =  true;
			$this->message = "Registro exitoso";
			$this->renderJSON();
		}


		public function emailExistente() {
			$this->success =  false;
			$this->message = "El email ya esta registrado";
			$this->renderJSON();
		}


		public function datosInvalidos() {
			$this->success = false;
			$this->message = "Usuario o contraseña invalidos";
			$this->renderJSON();
		}




	}
	



?>