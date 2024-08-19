<?php
require_once("../modelos/bd.php");
require_once("../modelos/mensaje.php");

$r_mensaje= new mensaje();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postBody = file_get_contents("php://input");
    $datos= json_decode($postBody, true);

    $texto=$datos['texto'];
    $proyecto= $datos['proyecto'];
    $editor=$datos['editor'];
    $cliente=$datos['cliente'];
    $nick=$datos['nick'];
    $idRemitente= $datos['idRemitente'];

    $r_mensaje->insertarMensaje($texto,$proyecto, $editor, $cliente, $nick, $idRemitente);

    // Respuesta
    $respuesta= array(
        'mensaje' => 'Mensaje introducido correctamente'
    );
    // $respuesta= ["mensaje" =>"Mensaje introducido correctamente"];
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