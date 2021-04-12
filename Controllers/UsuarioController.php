<?php 
    include_once '../Models/Usuario.php';
    $usuario = new Usuario();
    /* echo $_POST['user'];
    echo $_POST['pass']; */

if($_POST['funcion'] == 'login') {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    
    $usuario->loguearse($user, $pass);
}

