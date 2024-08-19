<?php
class multimedia
{
    private $bd;
    private $multimedia;

    public function __construct()
    {
        $this->bd = bd::conectar();
    }

    // Función para insertar un multimedia en Raw
    public function insertarMultimediaRaw($ruta, $cod_proyecto)
    {
        $insercion = $this->bd->prepare("INSERT INTO multimedias VALUES (null,?,NOW(),?,0, 'R')");
        $insercion->bind_param("si", $ruta, $cod_proyecto);
        $insercion->execute();
        $insercion->close();
    }
    // Funcion para insertar un multimedia ya editado
    public function insertarEditada($ruta, $cod_proyecto){
        $insercion = $this->bd->prepare("INSERT INTO multimedias VALUES (null,?,NOW(),?,0, 'E')");
        $insercion->bind_param("si", $ruta, $cod_proyecto);
        $insercion->execute();
        $insercion->close();
    }

    // Funcion para contar las imagenes Raw de un proyecto
    public function numeroImagenes($proyecto){
        $contar= $this->bd->query("SELECT COUNT(*) AS total FROM multimedias WHERE ruta LIKE '%$proyecto%'");
        $this->multimedia= $contar->fetch_array(MYSQLI_ASSOC);
        $contar->close();
        return $this->multimedia;
    }

    // Funcion para marcar como destacada la foto de un proyecto
    public function marcarDestacada($foto){
        $favorita= $this->bd->query("UPDATE multimedias SET destacada=1 WHERE id=$foto");
        // $favorita->close();
    }
    // Funcion para listar imagen destacada de un proyecto
    public function imagenDestacadaProyecto($proyecto)
    {
        $destacada = $this->bd->query("SELECT ruta FROM multimedias WHERE cod_proyecto=$proyecto and destacada=1");
        $this->multimedia = $destacada->fetch_array(MYSQLI_ASSOC);
        return $this->multimedia;
    }

    // Funcion para listar todas las imagenes de un proyecto en Raw
    public function listarFotosProyectoRaw($proyecto)
    {
        $listar = $this->bd->query("SELECT id, ruta FROM multimedias WHERE cod_proyecto=$proyecto AND estado='R'");
        $this->multimedia = $listar->fetch_all(MYSQLI_ASSOC);
        return $this->multimedia;
    }

    // Funcion para listar todas las imagenes editadas de un proyecto
    public function listarFotosProyectoEditadas($proyecto){
        $listar = $this->bd->query("SELECT id, ruta FROM multimedias WHERE cod_proyecto=$proyecto AND estado='E'");
        $this->multimedia = $listar->fetch_all(MYSQLI_ASSOC);
        return $this->multimedia;
    }

     // Funcion para listar 3  imagenes de un proyecto
     public function listar3FotosProyecto($proyecto)
     {
         $listar = $this->bd->query("SELECT id, ruta FROM multimedias WHERE cod_proyecto=$proyecto ORDER BY ruta DESC LIMIT 3");
         $this->multimedia = $listar->fetch_all(MYSQLI_ASSOC);
         return $this->multimedia;
     }

    // Función para borrar un proyecto
    // public function borrarProyecto($cod)
    // {
    //     $borrar = $this->bd->prepare("delete from proyectos where cod =?");
    //     $borrar->bind_param("i", $cod);
    //     $borrar->execute();
    //     $borrar->close();
    // }

    // Función para listar los proyectos de un cliente
    // public function listarProyectosCliente($id_cliente)
    // {
    //     $listar = $this->bd->query("SELECT cod, f_inicio, descripcion, cod_editor from proyectos, multimedias where cod=cod_proyecto and id_cliente = $id_cliente");
    //     $this->proyecto = $listar->fetch_all(MYSQLI_ASSOC);
    //     return $this->proyecto;
    // }
    // public function listarProyectosCliente($id_cliente)
    // {
    //     $listar = $this->bd->query("SELECT * from proyectos where id_cliente = $id_cliente");
    //     $this->proyecto = $listar->fetch_all(MYSQLI_ASSOC);
    //     return $this->proyecto;
    // }

    // // Función para listar los proyectos de un editor
    // public function listarProyectosEditor($id_editor)
    // {
    //     $listar = $this->bd->query("SELECT * from proyectos where id_editor = $id_editor");
    //     $this->proyecto = $listar->fetch_all(MYSQLI_ASSOC);
    //     return $this->proyecto;
    // }

    // // Funcion para contar cuantos contratos hay asociados a un proyecto
    // public function proyectosContrato($cliente)
    // {
    //     $select = $this->bd->prepare("SELECT count(*) FROM proyectos, contratos where num=num_contrato and contratos.estado='A' and proyectos.id_cliente=?");
    //     $select->bind_param('i', $cliente);
    //     $select->bind_result($contador);
    //     $select->execute();
    //     $select->fetch();
    //     $this->proyecto = $contador;
    //     return $this->proyecto;
    // }

    // Funcion para listar todas las fotos de un editor
    public function fotosEditor($editor){
        $listar= $this->bd->query("SELECT ruta FROM multimedias, proyectos WHERE cod=cod_proyecto AND cod_editor=$editor");
        $this->multimedia = $listar->fetch_all(MYSQLI_ASSOC);
        $listar->close();
        return $this->multimedia;
    }

    // Funcion para listar 4 fotos aleatorias de un editor
    public function seisFotosEditor($editor){
        $listar= $this->bd->query("SELECT ruta FROM multimedias, proyectos WHERE cod=cod_proyecto AND cod_editor=$editor ORDER BY RAND() LIMIT 6");
        $this->multimedia = $listar->fetch_all(MYSQLI_ASSOC);
        $listar->close();
        return $this->multimedia;
    }
}
