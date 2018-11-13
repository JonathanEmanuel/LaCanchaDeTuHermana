<?php
require_once('./core/dbAbstractModel.php');

	/*
	 * Sera la clase que se comunicara con la clase Abstacta
	 * GET: (Busca el email) ? Carga los atributos : atributos vacios
	 *
	*/

class Cuenta extends dbAbstractModel {
	
	// ATRIBUTOS PRIVADOS
	private $clave;

	public $usuarioId;
	public $PerfilUsuarioId;
	public $nombreUsuario;
	public $email;
	public $nombres;
	public $apellido;
	public $telefono;
	private $password;

	// FUNCIONES PUBLICAS
	function __construct() {


	}

	//Telefono	PerfilUsuarioId	Borrado

	public function buscarEmailPassword($email, $password){
		$this->query = "				
			SELECT usuarioId, apellido, nombres, nombreUsuario, password, email, telefono, PerfilUsuarioId
			FROM usuarios
			WHERE email = '$email' AND password = '$password' AND Borrado IS NULL
		";
		$this->consultaResultados();

		if (count($this->rows) == 1) { // si existes el email y password -> Carga los datos del usuario
			//print_r($this->rows);
			foreach ($this->rows[0] as $propiedad => $valor) {
				$this->$propiedad = $valor;
			}
			$this->msj = 'Existe';
			//echo ("EXITES");
		} else {
			$this->msj = 'No existe';
			//echo ("NO EXISTE");
		}
	}

	public function get($email = '') {

		if ($email != '') {
			$this->query = "
							SELECT usuarioId, apellido, nombres, nombreUsuario, password, email, telefono, perfilUsuarioId
							FROM usuarios
							WHERE email = '$email' and Borrado IS NULL
							";
			$this->consultaResultados();

			//echo count($this->rows);
		}

		if (count($this->rows) == 1) { // si existes el email
			//print_r($this->rows);
			foreach ($this->rows[0] as $propiedad => $valor) {
				$this->$propiedad = $valor;

			}
			$this->msj = 'Existe';

		} else {
			$this->msj = 'No existe';
			//echo "FALSE";
		}

	}

	public function set($datos=array()) {
		if(array_key_exists('email', $datos)) {
			$this->get($datos['email']);
			if ($datos['email'] != $this->email) {


				foreach ($datos as $campo => $valor) {
						$$campo = $valor;

					}
				$this->query = "
								INSERT INTO Cuenta(email, password, fecha_creacion, ultimo_acceso, key_login )
								VALUES ('$email', '$password', '$fechaCreacion', '$ultimoAcceso', '$keyLogin');";
		
				$this->consultaSimple();
				$this->msj = "Registro Exitoso";

			} else {
				$this->msj = "El usuario ya existe";
			}
			
		}
	}


	public function edit() {
		//
	}

	public function delete() {
		//
	}


	public function validarUsuario($hash) {
		$hashsistema = md5($this->email . $this->clave);
		if($hashsistema == $hash) {
			return true;
		}else {
			return false;
		}
	}

	public function getter($atributo) {
		return $this->$atributo;
	}
}



?>
