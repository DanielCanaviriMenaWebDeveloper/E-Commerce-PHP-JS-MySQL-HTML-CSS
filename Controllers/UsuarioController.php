<?php 
    include_once '../Models/Usuario.php';
    $usuario = new Usuario();
    /* echo $_POST['user'];
    echo $_POST['pass']; */
    session_start();
if($_POST['funcion'] == 'login') {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $usuario->loguearse($user, $pass);
    /* var_dump($usuario); */
    if($usuario->objetos != null) {
        foreach($usuario->objetos as $objeto) {
            /* var_dump($usuario); */
            $_SESSION['id'] = $objeto->id;
            $_SESSION['user'] = $objeto->user;
            $_SESSION['tipo_usuario'] = $objeto->id_tipo;
            $_SESSION['avatar'] = $objeto->avatar;
        }
        echo 'logueado';
    }
}

