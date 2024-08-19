<?php
require_once("../modelos/bd.php");
require_once("../modelos/estilo.php");

$r_estilo= new estilo();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postBody = file_get_contents("php://input");
    $datos= json_decode($postBody, true);

    $nombre=$datos['nombre'];
    $descripcion= $datos['descripcion'];
    $r_estilo->insertarEstilo($nombre,$descripcion);

    // Respuesta
    $respuesta= array(
        'mensaje' => 'Datos introducidos correctamente'
    );
    // $respuesta= ["mensaje" =>"datos introducidos correctamente"];
    // $respuesta= ["datos introducidos correctamente"];

    // Paso la respuesta a JSON
    $respuestaJSON= json_encode($respuesta);

    // Indico que voy a devolver un JSON
    header('Content-Type: application/json');

    // Lo devuelvo con un echo
    echo $respuestaJSON;
}else{
    // Si no recibo lal solicitud POST
    http_response_code(405); // Método no permitido
    echo json_encode(array('error' => 'Método no permitido'));
}
?>