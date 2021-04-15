<?php 
    include_once 'Conexion.php';

    class Usuario {
        var $objetos;

        public function __construct() {
            $db = new Conexion();
            $this->acceso = $db->pdo; /* La variable acceso contiene la conexión a la BD */
        }

        function loguearse($user, $pass) {
            $sql = "SELECT * FROM usuario";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }
    }   