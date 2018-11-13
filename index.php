<?php
    /*
      Primer archivo que se carga:
        1- Verifica si existe una session previamente creada (Usuario Logueado)
            Si: Redirige app/ para cargar el controlador frontal y luego pagina de inicio para el usuario
            No: Carga HTML para el login

    */
    require_once("app/config.php");

    if( empty($_SESSION['key']) ) {
        require_once("app/modulos/views/login.php");

    } else {
        echo("USUARIO LOGUEADO");
    }

?>