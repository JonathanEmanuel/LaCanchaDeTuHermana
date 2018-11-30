<?php
    require_once('./core/dbAbstractModel.php');

    class Torneos extends dbAbstractModel {
        public $TorneoId;
        public $Nombre;
        public $Inicio;
        public $Fin;
        public $FotoURL;
        public $torneos = array();

        // Guarda un Torne
        public function guardar($nombre, $inicio, $fin, $fotoURL){
            $this->query = "
                INSERT INTO torneos(Nombre, Inicio, Fin, FotoURL)
                VALUES ('$nombre', '$inicio', '$fin', '$fotoURL');
            ";
            $this->consultaSimple();

            $this->query = "
                SELECT MAX(TorneoId) AS TorneoId
                FROM torneos
            ";

            $this->consultaResultados();

            // echo( 'ID: ' . $this->rows[0]['TorneoId']);


            return $this->rows[0];

        }

        public function actualizar($torneoId, $nombre, $inicio, $fin, $fotoURL){
            $this->query = "
                UPDATE torneos
                SET nombre = '$nombre',
                    inicio = '$inicio',
                    fin = '$fin',
                    FotoURL = '$fotoURL'
                WHERE TorneoId = '$torneoId';
            ";
            $this->consultaSimple();

            $this->query = "
            SELECT MAX(TorneoId) AS TorneoId
            FROM torneos
            ";

            $this->consultaResultados();

            // echo( 'ID: ' . $this->rows[0]['TorneoId']);


            return $this->rows[0];

        }

        // Consulta en DB Torneos
        public function listar()
        {
            $this->query = "
                    SELECT TorneoId, Nombre, Inicio, Fin, FotoURL
                    FROM torneos 
                    WHERE Borrado IS NULL
                ";
           $this->consultaResultados();
           return $this->rows;

        }

        // Consulta Tornes aplicando filtro en nombre
        public function buscar($palabra){
            $this->query = "
                    SELECT TorneoId, Nombre, Inicio, Fin, FotoURL
                    FROM torneos 
                    WHERE Borrado IS NULL AND Nombre LIKE '%$palabra%'
                ";
            $this->consultaResultados();

            return $this->rows;
        }

        // Carga Datos del Torneo
        public function cargar($torneoId){
            $this->query = "
                SELECT TorneoId, Nombre, Inicio, Fin, FotoURL
                FROM torneos 
                WHERE TorneoId = '$torneoId' AND  Borrado IS NULL;

                
            ";
            $this->consultaResultados();

            
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

        // Baja Logica a torneo
        public function baja($torneoId){
            $this->query = "
                UPDATE torneos
                SET Borrado = NOW()
                WHERE TorneoId = '$torneoId'   
            ";
            $this->consultaSimple();

        }

        // Consulta cantidad de Torneos 
        public function cantidad(){
            $this->query = "
            SELECT MAX(TorneoId) AS TorneoId
            FROM torneos
            ";
            $this->consultaResultados();

            return $this->rows;
        }

    }


?>
