<?php 
    include_once '../Models/Provincia.php';
    $provincia = new Provincia();
    session_start();
    
if($_POST['funcion'] == 'llenar_provincia') {
    $id_departamento = $_POST['id_departamento'];
    $provincia->llenar_provincia($id_departamento);
    /* Si $id_departamento esta vacio de igual forma creamos un array para ser decodificado, en 
    este caso sera un array vacio. */
    $json = array();
    /* print_r($departamento); */
   /*  var_dump($departamento); */
    foreach($provincia->objetos as $objeto) {
        $json[] = array(
            'id' => $objeto->id,
            'nombre' => $objeto->nombre
        );
    }
    /* var_dump($json); */
     /* Del servidor al frontend php no nos permite enviar un array de datos, por ese motivo lo enviamos como String */
    $jsonstring = json_encode($json); 
    echo $jsonstring;
}   

