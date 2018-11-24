<?php
    require_once('./core/dbAbstractModel.php');

    class Clientes extends dbAbstractModel {
        public $id;
        public $nombre;
        public $torneos = array();

        // Consulta en DB Clientes
        public function listar()
        {

            $this->query = 'select Nombres, Apellido, Email, Descripcion from usuarios, perfilusuario where usuarios.PerfilUsuarioId = perfilusuario.PerfilUsuarioId';
           $this->consultaResultados();
           return $this->rows;
        }
        
    }


?>
