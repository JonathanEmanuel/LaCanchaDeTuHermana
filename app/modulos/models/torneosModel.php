<?php
    require_once('./core/dbAbstractModel.php');

    class Torneos extends dbAbstractModel {
        public $id;
        public $nombre;
        public $torneos = array();

        // Guarda un Torne
        public function guardar($nombre, $inicio, $fin, $fotoURL){
            $this->query = "
                INSERT INTO torneos(Nombre, Inicio, Fin, FotoURL)
                VALUES ('$nombre', '$inicio', '$fin', '$fotoURL');
            ";
            $this->consultaSimple();
        }

        // Consulta en DB Torneos
        public function listar()
        {
            $this->torneos = array(
                array('id' => 1, 'nombre' => 'Torneo1'  ),
                array('id' => 2, 'nombre' => 'Torneo 02'  ),
                array('id' => 3, 'nombre' => 'Torneo 3'  ),

            );

            return $this->torneos;
    
        }
        
    }


?>
