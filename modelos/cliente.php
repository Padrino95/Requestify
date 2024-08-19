<?php
class cliente
{
    private $bd;
    private $cliente;

    public function __construct()
    {
        $this->bd = bd::conectar();
    }

    public function insertarCliente($nombre, $telefono ,$nick, $pass)
    {
        $insercion = $this->bd->prepare("insert into clientes values (null,?,?,?,?)");
        $contraseña = md5(md5(md5(md5(md5($pass)))));
        $insercion->bind_param("ssss", $nombre, $telefono, $nick, $contraseña);
        $insercion->execute();
        $insercion->close();
    }
    // Función para borrar un cliente
    public function borrarCliente($id)
    {
        $borrar = $this->bd->prepare("delete from clientes where id =?");
        $borrar->bind_param("i", $id);
        $borrar->execute();
        $borrar->close();
    }

    // Función para buscar un cliente por nombre
    public function buscarClientePorNombre($nombre)
    {
        $buscar = $this->bd->prepare("SELECT id, nombre, telefono, nick from clientes where nombre like ?");
        $buscar->bind_param("s", $nombre);
        $buscar->bind_result($id, $nombre, $telefono, $nick);
        $buscar->execute();
        $buscar->store_result();
        if ($buscar->num_rows() > 0) {
            $i = 0;
            while ($buscar->fetch()) {
                $this->cliente[$i]['id'] = $id;
                $this->cliente[$i]['nombre'] = $nombre;
                $this->cliente[$i]['telefono'] = $telefono;
                $this->cliente[$i]['nick'] = $nick;
                $i++;
            }
            return $this->cliente;
        } else {
            return -1;
        }
        $buscar->close();
    }
    // Funcion para buscar cliente por id
    public function buscarClientePorId($id)
    {
        $listar= $this->bd->query("SELECT * FROM clientes WHERE id = $id");
        $this->cliente= $listar->fetch_array(MYSQLI_ASSOC);
        $listar->close();        
        return $this->cliente;
    }

    // Función para listar todos los clientes
    public function listarClientes()
    {
        $listar=$this->bd->query("SELECT * from clientes where id>0");
        $this->cliente=$listar->fetch_all(MYSQLI_ASSOC);
        return $this->cliente;
    }

    // Función para modificar un cliente
    public function modificarCliente($id, $nombre, $telefono, $nick, $pass){
        $contraseña = md5(md5(md5(md5(md5($pass)))));
        $modificacion = $this->bd->prepare("update clientes set nombre =?, telefono =?, nick =?, contraseña =? where id =?");
        $modificacion->bind_param("ssssi", $nombre, $telefono, $nick, $contraseña, $id);
        $modificacion->execute();
        $modificacion->close();
    }

    public function loggin ($nick, $pass){
        $contraseña = md5(md5(md5(md5(md5($pass)))));
        $buscar = $this->bd->prepare("SELECT id, nombre, telefono from clientes where nick =? and contraseña =?");
        $buscar->bind_param("ss", $nick, $contraseña);
        $buscar->bind_result($id, $nombre, $telefono);
        $buscar->execute();
        $buscar->store_result();

        if ($buscar->num_rows() > 0) {
            $buscar->fetch();
            $usuario["id"] = $id;
            $usuario["nombre"] = $nombre;
            $usuario["telefono"] = $telefono;
            $usuario["tipoU"]= "C";
            return $usuario;
        } else {
            $usuario["id"] = -1;
            return $usuario;
        }
        $buscar->close();
    }

    // Funcion para saber el nombre de un cliente a partir de su id
    public function nombreClienteId($id){
        $listar= [];
        $listar= $this->bd->query("SELECT nick FROM clientes WHERE id = $id");
        $this->cliente= $listar->fetch_array(MYSQLI_ASSOC);
        return $this->cliente;
    }
}
