<?php 
    include_once 'Conexion.php';

    class Usuario {
        var $objetos;

        public function __construct() {
            $db = new Conexion();
            $this->acceso = $db->pdo; /* La variable acceso contiene la conexión a la BD */
        }

        function loguearse($user, $pass) {
            $sql = "SELECT * FROM usuario 
                    /* JOIN tipo_usuario ON id_tipo = tipo_usuario.id */
                    WHERE user=:user and pass=:pass";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':user'=>$user, ':pass'=>$pass));
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }

        function verificar_usuario($user) {
            $sql = "SELECT * FROM usuario WHERE user=:user";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':user'=>$user));
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }

        function registrar_usuario($username, $pass, $nombres, $apellidos, $dni, $email, $telefono) {
            $sql = "INSERT INTO usuario(user, pass, nombres, apellidos, dni, email, telefono, id_tipo) 
            VALUES(:user, :pass, :nombres, :apellidos, :dni, :email, :telefono, :id_tipo)";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':user'=>$username, ':pass'=>$pass, ':nombres'=>$nombres, ':apellidos'=>$apellidos, ':dni'=>$dni, ':email'=>$email, ':telefono'=>$telefono, ':id_tipo'=>2));
        }
    }   