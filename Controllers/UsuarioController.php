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

/* Los datos recibidos son mediante AJAX usando FormData,
    por tanto cada uno de los campos son accedidos mediante el atributo name 
    definidos en el formulario de donde se obtienen.. */
if($_POST['funcion'] == 'editar_datos') {
    $id_usuario = $_SESSION['id'];
    $nombres = $_POST['nombres_mod'];
    $apellidos = $_POST['apellidos_mod'];
    $dni = $_POST['dni_mod'];
    $email = $_POST['email_mod'];
    $telefono = $_POST['telefono_mod'];
    /* Forma de capturar un archivo y su nombre, usando FormData */
    $avatar = $_FILES['avatar_mod']['name'];
    /* echo $avatar; */
    if ($avatar != "") { /* Si la variable $avatar no esta vacio significa que se esta enviando una imágen. */
        $nombre = uniqid() . '-' . $avatar; /* Agrega un código unico al nombre de la imágen */
        $ruta = '../Util/img/Users/' . $nombre; /* Concatena la ruta donde se almacenara la imágen y el nombre de la imágen */
        /* move_uploaded_file(string $filename, string $destination) */
        move_uploaded_file($_FILES['avatar_mod']['tmp_name'], $ruta); /* tmp_name : C:\xampp\tmp\phpB840.tmp - Ruta del Archivo Temporal*/
        $usuario->obtener_datos($id_usuario);
        foreach($usuario->objetos as $objeto) {
            $avatar_actual = $objeto->avatar; /* Obtiene el nombre actual del campo llamado avatar correspondiente a la tabla usuario de nuestra BD */
            if($avatar_actual != 'user_default.jpg') { /* Evita qu se borre la imágen por defecto que tiene todos los usuarios */
                unlink('../Util/img/Users/' . $avatar_actual); /* Borra la imágen que esta en la ruta definida */
            }
        }
        /* Reasigno la imagen del avatar dentro la sesión actual */
        $_SESSION['avatar'] = $nombre;
    }else {
        $nombre = "";
    }
    
    $usuario->editar_datos($id_usuario, $nombres, $apellidos, $dni, $email, $telefono, $nombre);
    echo 'success'; 
}

if($_POST['funcion'] == 'cambiar_contra') {
    $id_usuario = $_SESSION['id'];
    $pass_old = $_POST['pass_old'];
    $pass_new = $_POST['pass_new'];
    $usuario->comprobar_pass($id_usuario, $pass_old);
    if (!empty($usuario->objetos)) {
        $usuario->cambiar_contra($id_usuario, $pass_new);
        echo "success";
    }else {
        echo "error";
    }
}
