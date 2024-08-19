<?php
include_once '../funciones/funciones.php';
class mensaje
{
    private $bd;
    private $mensaje;

    public function __construct()
    {
        $this->bd = bd::conectar();
    }
    

    // Funcion para insertar un mensaje
    public function insertarMensaje($texto, $proyecto, $editor, $cliente, $remitente, $idRemitente ){
        $hora=obtenerHoraActual();
        $insercion = $this->bd->prepare("insert into mensajes values (null , ? , NOW() , ?,?,?,?,?,?)");
        $insercion->bind_param("ssiiisi", $texto, $hora, $proyecto, $editor, $cliente, $remitente, $idRemitente);
        $insercion->execute();
        $insercion->close();
    }

    
    // Función para listar todos los mensajes
    public function listarMensajes($proyecto){
        $listar = $this->bd->query("SELECT * from mensajes WHERE cod_proyecto=$proyecto");
        $this->mensaje = $listar->fetch_all(MYSQLI_ASSOC);
        return $this->mensaje;
    }
}
