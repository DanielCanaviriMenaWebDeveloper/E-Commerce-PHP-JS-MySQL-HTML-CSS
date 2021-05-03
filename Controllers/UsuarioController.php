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

if($_POST['funcion'] == 'verificar_sesion') {
    if(!empty($_SESSION['id'])) {  /* Si se cumple la condición existe una sesión abierta */
        $json[] = array(
            'id' => $_SESSION['id'],
            'user' => $_SESSION['user'],
            'tipo_usuario' => $_SESSION['tipo_usuario'],
            'avatar' => $_SESSION['avatar']
        );
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
    } else {
        echo '';
    }
}   

if($_POST['funcion'] == 'verificar_usuario') {
    $username = $_POST['value'];
    $usuario->verificar_usuario($username);
    /* var_dump($usuario);  */ 
    /* Si el atributo objetos de nuestro objeto usuario contiene registros, significa que existe el usuario. */
    if($usuario->objetos != null) {
        echo 'success'; 
    }
}   

