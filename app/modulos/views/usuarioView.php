<?php
    require_once('./core/vista.php');
    class CuentaVista extends Vista {

        public function generarJSON($datos="") {
            $this->message = " Correcto";
            $this->data = $datos;
            $this->renderJSON();
        }
    }
		

?>