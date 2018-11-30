<?php
    require_once('./core/dbAbstractModel.php');

    class Clientes extends dbAbstractModel {
        public $usuarioId;
        public $nombres;
        public $apellido;
        public $email;
        public $nombreUsuario;
        public $telefono;
        public $rol;
        public $password;
        public $torneos = array();

        // Consulta en DB Clientes
        public function listar()
        {

           // $this->query = 'select Nombres, Apellido, Email, Descripcion from usuarios where usuarios.PerfilUsuarioId = perfilusuario.PerfilUsuarioId';
           $this->query = '
            SELECT U.usuarioId AS ClienteId, U.Nombres, U.Apellido, U.Email, R.Descripcion AS Rol
            FROM usuarios U
            JOIN usuarios_roles UR ON UR.UsuarioId = U.UsuarioId
            JOIN roles R ON R.RolId = UR.RolId
            WHERE U.Borrado IS NULL
           ';
           $this->consultaResultados();
           return $this->rows;
        }
        
        // Guarda un Cliente
        public function guardar($nombres, $apellido, $email, $usuario, $telefono, $password){
            // Inserta Usuario
            $this->query = "
                INSERT INTO usuarios(Nombres, Apellido, Email, NombreUsuario, Telefono, Password)
                VALUES ('$nombres', '$apellido', '$email', '$usuario', '$telefono', '$password');
            ";
            $this->consultaSimple();

            // Recupera Id
            $this->query = "
                SELECT DISTINCT MAX(UsuarioId) AS UsuarioId
                FROM usuarios
            ";
            $this->consultaResultados();

            $id = $this->rows[0]['UsuarioId'];
            //$this->cargarDatos($id);
            
           // Inserta Relacion Rol
            $this->query = "
                INSERT INTO usuarios_roles(UsuarioId, RolId)
                VALUEs ('$id', 2)
            ";
            $this->consultaSimple();


            return $this->rows[0];

        }

        // Verfica que el email no exista
        public function exiteEmail($email){
            $this->query = "
                SELECT 1 FROM Usuarios WHERE email = '$email'
            ";
            $this->consultaResultados();
            if (count($this->rows) == 1){
                return true;
            } else {
                return false;
            }
        }

        public function cargarDatos($id = '') {

            if ($id != '') {
                $this->query = "
                    SELECT U.usuarioId, U.nombres, U.apellido, U.email, U.nombreUsuario, U.telefono, U.password, R.Descripcion AS rol
                    FROM usuarios U
                    JOIN usuarios_roles UR ON UR.UsuarioId = U.UsuarioId
                    JOIN roles R ON R.RolId = UR.RolId
                    WHERE U.usuarioId = '$id'
                ";
                $this->consultaResultados();

                //echo count($this->rows);
            }

            if (count($this->rows) == 1) { // si existes el UsuarioId
                echo("exist");
                print_r($this->rows);
                echo("---------");

                foreach ($this->rows[0] as $propiedad => $valor) {
                    $this->$propiedad = $valor;

                }
                $this->msj = 'Existe';

            } else {
                $this->msj = 'No existe';
                //echo "FALSE";
            }

        }

        public function baja($id){
            //echo("Codigo baja " .$id . " ----");
            $this->query = "
                UPDATE usuarios
                SET Borrado = NOW()
                WHERE usuarioId = $id";
            $this->consultaSimple();
        }
    }


?>
