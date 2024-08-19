<?php
class proyecto
{
    private $bd;
    private $proyecto;

    public function __construct()
    {
        $this->bd = bd::conectar();
    }

    // Función para insertar un proyecto
    public function insertarProyecto($titulo,$descripcion, $num_contrato, $id_cliente, $cod_editor)
    {
        $insercion = $this->bd->prepare("INSERT INTO proyectos VALUES (null,?,NOW(),null,'A',?,?,?,null,null,?)");
        $insercion->bind_param("ssiii",$titulo , $descripcion, $num_contrato, $id_cliente, $cod_editor);
        $insercion->execute();
        $insercion->close();
    }

    // Función para borrar un proyecto
    public function borrarProyecto($cod)
    {
        $borrar = $this->bd->prepare("delete from proyectos where cod =?");
        $borrar->bind_param("i", $cod);
        $borrar->execute();
        $borrar->close();
    }
    // Función para obtener el id del ultimo proyecto insertado de un cliente
    public function ultimoProyectoCliente($cliente){
        $listar= $this->bd->query("SELECT cod FROM proyectos WHERE id_cliente=$cliente ORDER BY cod DESC LIMIT 1");
        $this->proyecto=$listar->fetch_array(MYSQLI_ASSOC);
        return $this->proyecto;
    }

    // Función para listar los proyectos de un cliente
    // public function listarProyectosCliente($id_cliente)
    // {
    //     $listar = $this->bd->query("SELECT cod, f_inicio, descripcion, cod_editor from proyectos, multimedias where cod=cod_proyecto and id_cliente = $id_cliente");
    //     $this->proyecto = $listar->fetch_all(MYSQLI_ASSOC);
    //     return $this->proyecto;
    // }
    public function listarProyectosCliente($id_cliente)
    {
        $listar = $this->bd->query("SELECT * from proyectos where id_cliente = $id_cliente");
        $this->proyecto = $listar->fetch_all(MYSQLI_ASSOC);
        return $this->proyecto;
    }

    // Función para listar los proyectos de un editor
    public function listarProyectosEditor($cod_editor)
    {
        $listar = $this->bd->query("SELECT * from proyectos where cod_editor = $cod_editor");
        $this->proyecto = $listar->fetch_all(MYSQLI_ASSOC);
        return $this->proyecto;
    }

    // Funcion para contar cuantos contratos hay asociados a un proyecto
    public function proyectosContrato($cliente)
    {
        $select = $this->bd->prepare("SELECT count(*) FROM proyectos, contratos where num=num_contrato and contratos.estado='A' and proyectos.id_cliente=?");
        $select->bind_param('i', $cliente);
        $select->bind_result($contador);
        $select->execute();
        $select->fetch();
        $this->proyecto = $contador;
        return $this->proyecto;
    }

    // Funcion para finalizar un proyecto
    public function finalizarProyecto($codProyecto){
        $this->bd->query("UPDATE proyectos SET estado='F', f_fin=NOW()  WHERE cod=$codProyecto");
    }

    // Funcion para puntuar un proyecto finalizado
    public function puntuarProyecto($cod, $puntos, $comentario){
        $puntuar=$this->bd->prepare("UPDATE proyectos SET puntos=?, comentario=? WHERE cod=?");
        $puntuar->bind_param('isi', $puntos, $comentario, $cod);
        $puntuar->execute();
        $puntuar->close();
    }

    // Funcion para comprobar que un proyecto está puntuado
    public function proyectoPuntuado($cod){
        $puntuacion=$this->bd->query("SELECT cod FROM proyectos WHERE cod=$cod AND puntos IS NOT NULL");
        return $puntuacion;
    }


    // Funcion para sacar el codigo del ultimo proyecto de un editor
    public function ultimoProyecto($editor){
        $listar=$this->bd->query("SELECT cod FROM proyectos WHERE cod_editor=$editor ORDER BY f_fin DESC LIMIT 1");
        $this->proyecto=$listar->fetch_array(MYSQLI_ASSOC);
        return $this->proyecto;
    }

    // Funcion para listar informacion de un proyecto
    public function listarProyecto($proyecto){
        $listar=$this->bd->query("SELECT titulo, descripcion, cod_editor, id_cliente, puntos, comentario FROM proyectos WHERE cod=$proyecto");
        $this->proyecto=$listar->fetch_array(MYSQLI_ASSOC);
        return $this->proyecto;
    }

    

}