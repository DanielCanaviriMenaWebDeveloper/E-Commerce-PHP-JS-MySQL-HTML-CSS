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

if($_POST['funcion'] == 'registrar_usuario') {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $usuario->registrar_usuario($username, $pass, $nombres, $apellidos, $dni, $email, $telefono);
    echo 'success';
}   

if($_POST['funcion'] == 'obtener_datos') {
    $usuario->obtener_datos($_SESSION['id']);
   /*  var_dump($usuario); */
    foreach($usuario->objetos as $objeto) {
        $json[] = array(
            'username' => $objeto->user,
            'nombres' => $objeto->nombres,
            'apellidos' =>$objeto->apellidos,
            'dni' =>$objeto->dni,
            'email' =>$objeto->email,
            'telefono' =>$objeto->telefono,
            'avatar' =>$objeto->avatar,
            'tipo_usuario' =>$objeto->tipo,
        );
        /* Del servidor al frontend php no nos permite enviar un array de datos, por ese motivo lo enviamos como String */
        $jsonstring = json_encode($json[0]); /* Al ser solo un registro el envio usamos la posición 0 del array donde esta ese registro. */
        echo $jsonstring;
    }

}   

