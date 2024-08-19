<?php
class estilo
{
    private $bd;
    private $estilo;

    public function __construct()
    {
        $this->bd = bd::conectar();
    }
    
    // Funcion para insertar un estilo
    public function insertarEstilo($nombre, $descripcion){
        $insercion = $this->bd->prepare("insert into estilos values (null,?,?)");
        $insercion->bind_param("ss", $nombre, $descripcion);
        $insercion->execute();
        $insercion->close();
    }
    // Función para listar todos los estilos
    public function listarEstilos(){
        $listar = $this->bd->query("SELECT * from estilos where cod>0");
        $this->estilo = $listar->fetch_all(MYSQLI_ASSOC);
        return $this->estilo;
    }

    // Funcion para modificar un estilo
    public function modificarEstilo($id, $nombre, $descripcion){
        $modificacion = $this->bd->prepare("update estilos set nombre =?, descripcion =? where cod =?");
        $modificacion->bind_param("ssi", $nombre, $descripcion, $id);
        $modificacion->execute();
        $modificacion->close();
    }
}
