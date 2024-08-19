<?php
session_start(); // Iniciar la sesión al principio del archivo

require_once("../modelos/bd.php");
require_once("../modelos/mensaje.php");

$r_mensaje = new mensaje();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postBody = file_get_contents("php://input");
    $datos = json_decode($postBody, true);

    $proyecto = $datos['proyecto'];

    $respuesta = $r_mensaje->listarMensajes($proyecto);

    // Añadir el ID de la sesión a la respuesta
    foreach ($respuesta as &$mensaje) {
        $mensaje['session_id'] = isset($_SESSION['id']) ? $_SESSION['id'] : null;
    }

    // Paso la respuesta a JSON
    $respuestaJSON = json_encode($respuesta);

    // Indico que voy a devolver un JSON
    header('Content-Type: application/json');

    // Lo devuelvo con un echo
    echo $respuestaJSON;
} else {
    // Si no recibo la solicitud POST
    http_response_code(405); // Método no permitido
    echo json_encode(array('error' => 'Método no permitido'));
}
?>
