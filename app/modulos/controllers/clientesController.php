<?php
    require_once(MODELOS . 'clientesModel.php');



    class clientesController
    {
        // Validar Sesion y roles
        function __construct(){
		    session_start();
            
        }

        // Ruta default del controlado, mostrara la pagina de torneos (Grilla de tornes, btn Crear Torneo, etc...)
        public function index(){
            $clientes = new Clientes;
            $listaClientes = $clientes->listar();

            $nombrePanel = "Clientes";
    
            require_once(VISTAS . "html/inc/head.php");
			require_once(VISTAS . "html/inc/nav.php");
            require_once(VISTAS . "html/inc/header.php");

            require_once(VISTAS . "html/clientes.php");
            require_once(VISTAS . "html/inc/modalCliente.php");
            require_once(VISTAS . "html/inc/footer.php");
            // JS con funciones para el Panel
            echo('<script src="../publico/js/clientes.js"></script>');

        }

        // Guarda o Actualiza un Cliente
        public function guardar($parametros = array()){

            if(  isset($_POST["clienteId"]) && isset($_POST["nombres"]) && isset($_POST['apellido']) 
                && isset($_POST['email']) && isset($_POST['usuario'])  && isset($_POST['telefono']) && isset($_POST['password']) ){
                $clienteId = $_POST["clienteId"];
                $nombres = $_POST["nombres"];
                $apellido = $_POST["apellido"];
                $email = $_POST["email"];
                $usuario = $_POST["usuario"];
                $telefono = $_POST["telefono"];
                $password = $_POST["password"];
                
                $cliente = new clientes;

                // Si el Id es cero, no esta guardado aun en al db, por lo tanto hace el insert, de los contrario actualiza el registro por Id
                if( $clienteId == 0){
                    // Verifica que el email no exista
                    if ($cliente->exiteEmail($email)){
                        echo (
                            json_encode(
                                array('Estado' => 'Email Existente',
                                      'Datos' => array()
                                )
                            )
                        );
                    } else {
                        $usuarioId = $cliente->guardar($nombres, $apellido, $email, $usuario, $telefono, $password)['UsuarioId'];
                 

                        echo( json_encode(
                            array(
                                'Estado' => 'Guardador',
                                'Datos' =>   array('ClienteId' => $usuarioId,
                                                    'Nombres' => $nombres,
                                                    'Apellido' => $apellido,
                                                    'Email' => $email,
                                                    'Telefono' => $telefono
                                                )
                            )
      
                            ));
                    }

                } else {
                    //echo("Actualizar");
                    $clienteId = $cliente->actualizar($clienteId, $nombres, $apellido, $email, $usuario, $telefono, $password)['UsuarioId'];

                    echo(
                        json_encode( array('clienteId' => $clienteId ))
                    );
                }
            } else {
                echo("No se recibieron todas los Campos");
            }


        }

        public function eliminar($parametro){

        }
    }
    

?>