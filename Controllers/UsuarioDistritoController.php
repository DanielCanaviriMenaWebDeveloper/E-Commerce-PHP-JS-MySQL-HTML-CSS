<?php 
    include_once '../Models/UsuarioDistrito.php';
    include_once '../Util/Config/config.php'; /* Archivo donde se define las variables globales */
    $usuario_distrito = new UsuarioDistrito();
    session_start();
    
if($_POST['funcion'] == 'crear_direccion') {
    $id_usuario = $_SESSION['id'];
    $id_distrito = $_POST['id_distrito'];
    $direccion = $_POST['direccion'];
    $referencia = $_POST['referencia'];

    $usuario_distrito->crear_dirección($id_usuario, $id_distrito, $direccion, $referencia);
    echo 'success';
}

if($_POST['funcion'] == 'llenar_direcciones') {
    $id_usuario = $_SESSION['id'];
    $usuario_distrito->llenar_direcciones($id_usuario);
    $json = array();
    foreach ($usuario_distrito->objetos as $objeto) {
        $json[] = array(
            /* Encriptación del id */
            /* Encriptamos usando un método de PHP : openssl_encrypt(dato_a_encriptar, método_encriptación, llave) */
            'id'=>openssl_encrypt($objeto->id, CODE, KEY),
            'direccion' => $objeto->direccion,
            'referencia' => $objeto->referencia,
            'departamento' => $objeto->departamento,
            'provincia' => $objeto->provincia,
            'distrito' => $objeto->distrito
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if ($_POST['funcion'] == 'eliminar_direccion') {
    /* Procedo primero a Desencriptar el id que esta Encriptado */
    /* Desemcriptamos usando un método de PHP : openssl_decrypt(dato_a_desencriptar, método_encriptación, llave) */
    $id_direccion = openssl_decrypt($_POST['id'], CODE, KEY);
    /* Proceso de filtración para verificar que id recibido sea siempre desencriptado. */
    if(is_numeric($id_direccion)) { /* Si el dato desencriptado es de tipo númerico esta correcto caso contario era 
        un dato que no estaba encriptado por tanto saldra un error. */
        $usuario_distrito->eliminar_direccion($id_direccion);
        echo 'success';    
    } else {
        /* Mensaje que se muestra cuando se intento alterar el id desde la vista. */
        echo 'error';
    } 
}


