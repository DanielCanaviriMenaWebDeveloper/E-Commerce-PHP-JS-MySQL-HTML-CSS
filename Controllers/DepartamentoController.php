<?php 
    include_once '../Models/Departamento.php';
    $departamento = new Departamento();
    session_start();
    
if($_POST['funcion'] == 'llenar_departamentos') {
    $departamento->llenar_departamentos();
    /* print_r($departamento); */
   /*  var_dump($departamento); */
    foreach($departamento->objetos as $objeto) {
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

