<?php 
    include_once 'Conexion.php';

    class UsuarioDistrito {
        var $objetos;

        public function __construct() {
            $db = new Conexion();
            $this->acceso = $db->pdo; 
        }

        function crear_dirección($id_usuario, $id_distrito, $direccion, $referencia) {
            $sql = "INSERT INTO usuario_distrito(direccion, referencia, id_distrito, id_usuario) 
            VALUES(:direccion, :referencia, :id_distrito, :id_usuario)";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':direccion'=>$direccion, ':referencia'=>$referencia, ':id_distrito'=>$id_distrito, ':id_usuario'=>$id_usuario));
        }
    }   