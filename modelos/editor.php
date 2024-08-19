<?php
class editor
{
    private $bd;
    private $editor;

    public function __construct()
    {
        $this->bd = bd::conectar();
    }

    public function insertarEditor($nombre, $nick, $presentancion, $foto, $tipo, $pass, $estilo)
    {
        $insercion = $this->bd->prepare("insert into editores values (null,?,?,?,?,?,?,?)");
        $contraseña = md5(md5(md5(md5(md5($pass)))));
        $insercion->bind_param("sssssss", $nombre, $nick, $presentancion, $foto, $tipo, $contraseña, $estilo);
        $insercion->execute();
        $insercion->close();
    }
    //función para borrar un editor
    public function borrareditor($id)
    {
        // sacamos la ruta de la imagen
        $rutaBorrar = $this->bd->prepare("select foto from editores where id =?");
        $rutaBorrar->bind_param("i", $id);
        $rutaBorrar->bind_result($ruta);
        $rutaBorrar->execute();
        $rutaBorrar->fetch();
        $rutaBorrar->close();

        //borramos la iamgen de local 
        unlink("../assets/imagenes/editores/$ruta");

        $borrar = $this->bd->prepare("delete from editores where id =?");
        $borrar->bind_param("i", $id);
        $borrar->execute();
        $borrar->close();
    }

    // Funcion para modificar un editor
    public function modificarEditor($id, $nombre, $presentacion, $nick, $tipo, $foto, $pass, $estilo)
    {
        // sacamos la ruta de la imagen
        $rutaBorrar = $this->bd->prepare("select foto from editores where id =?");
        $rutaBorrar->bind_param("i", $id);
        $rutaBorrar->bind_result($ruta);
        $rutaBorrar->execute();
        $rutaBorrar->fetch();
        $rutaBorrar->close();

        //borramos la iamgen de local 
        unlink("../assets/imagenes/editores/$ruta");

        $contraseña = md5(md5(md5(md5(md5($pass)))));
        $modificacion = $this->bd->prepare("update editores set nombre =?, presentacion =?, nick =?, tipo=?, foto=?, pass =?, cod_estilo=? where id =?");
        $modificacion->bind_param("sssssssi", $nombre, $presentacion, $nick, $tipo, $foto, $contraseña, $estilo, $id);
        $modificacion->execute();
        $modificacion->close();
    }
    // Funcion para modificar editor sin foto
    public function modificarEditorSinFoto($id, $nombre, $presentacion, $nick, $tipo, $pass, $estilo)
    {
        $contraseña = md5(md5(md5(md5(md5($pass)))));
        $modificacion = $this->bd->prepare("update editores set nombre =?, presentacion =?, nick =?, tipo=?, pass =?, cod_estilo=? where id =?");
        $modificacion->bind_param("sssssii", $nombre, $presentacion, $nick, $tipo, $contraseña, $estilo, $id);
        $modificacion->execute();
        $modificacion->close();
    }

    // Función para buscar un editor por nombre
    public function buscarEditorPorNombre($nombre)
    {
        $buscar = $this->bd->prepare("SELECT id, nombre, presentacion, nick, foto, tipo from editores where nombre like ?");
        $buscar->bind_param("s", $nombre);
        $buscar->bind_result($id, $nombre, $presentacion, $nick, $foto, $tipo);
        $buscar->execute();
        $buscar->store_result();
        if ($buscar->num_rows() > 0) {
            $i = 0;
            while ($buscar->fetch()) {
                $this->editor[$i]['id'] = $id;
                $this->editor[$i]['nombre'] = $nombre;
                $this->editor[$i]['presentacion'] = $presentacion;
                $this->editor[$i]['nick'] = $nick;
                $this->editor[$i]['tipo'] = $tipo;
                $this->editor[$i]['foto'] = $foto;
                $i++;
            }
            return $this->editor;
        } else {
            return -1;
        }
        $buscar->close();
    }

    // Función para buscar editor por id
    public function buscarEditorPorId($id){
        $buscar = $this->bd->prepare("SELECT nombre, presentacion, foto from editores where id =?");
        $buscar->bind_param("i", $id);
        $buscar->bind_result($nombre, $presentacion, $foto);
        $buscar->execute();
        $buscar->store_result();
        $buscar->fetch();
        $this->editor['nombre'] = $nombre;
        $this->editor['presentacion'] = $presentacion;
        $this->editor['foto'] = $foto;
        $buscar->close();
        return $this->editor;
    }

    // Funcion para filtrar editores por estilos de edicion
    public function filtrarPorEstilo($estilo){
        $buscar = $this->bd->prepare("SELECT id, editores.nombre, presentacion, nick, foto from editores where cod_estilo=?");
        $buscar->bind_param("i", $estilo);
        $buscar->bind_result($id, $nombre, $presentacion, $nick, $foto);
        $buscar->execute();
        $buscar->store_result();
        if ($buscar->num_rows() > 0) {
            $this->editor=[];
            $i = 0;
            while ($buscar->fetch()) {
                $this->editor[$i]['id'] = $id;
                $this->editor[$i]['nombre'] = $nombre;
                $this->editor[$i]['presentacion'] = $presentacion;
                $this->editor[$i]['nick'] = $nick;
                $this->editor[$i]['foto'] = $foto;
                $i++;
            }
            return $this->editor;
        }
    }

    // Función para listar todos los editores
    public function listarEditores()
    {
        $listar = $this->bd->query("SELECT * from editores where id>0");
        $this->editor = $listar->fetch_all(MYSQLI_ASSOC);
        return $this->editor;
    }

    public function loggin($nick, $pass)
    {
        $contraseña = md5(md5(md5(md5(md5($pass)))));
        $buscar = $this->bd->prepare("SELECT id, nombre, presentacion, foto, tipo from editores where nick =? and pass =?");
        $buscar->bind_param("ss", $nick, $contraseña);
        $buscar->bind_result($id, $nombre, $presentancion, $foto, $tipo);
        $buscar->execute();
        $buscar->store_result();


        if ($buscar->num_rows() > 0) {
            $buscar->fetch();
            $usuario["id"] = $id;
            $usuario["nombre"] = $nombre;
            $usuario["presentancion"] = $presentancion;
            $usuario["foto"] = $foto;
            $usuario["tipo"] = $tipo;
            $usuario["tipoU"]= "E";
            return $usuario;
        } else {
            $usuario["id"] = -1;
            return $usuario;
        }
        $buscar->close();
    }

    // Función para mostrar un editor aleatorio
    public function editorAleatorio()
    {
        $listar = $this->bd->query("SELECT * FROM editores ORDER BY RAND() LIMIT 1");
        $this->editor = $listar->fetch_all(MYSQLI_ASSOC);
        return $this->editor;
    }

    // Función para listar las fotos y las ids de los editores
    public function listarFotosEditores()
    {
        $listar = $this->bd->query("SELECT id, foto FROM editores where id>0 ORDER BY RAND() LIMIT 5");
        $this->editor = $listar->fetch_all(MYSQLI_ASSOC);
        return $this->editor;
    }

    public function siguienteEditor()
    {
        $consulta = $this->bd->query("select AUTO_INCREMENT from information_schema.tables where table_schema= 'requestify' and table_name='editores'");
        $datos = $consulta->fetch_all(MYSQLI_ASSOC);
        return $datos[0]['AUTO_INCREMENT'];
    }


    // Funcion para sacar el editor
    public function editorMes(){
        // $this->proyecto=$this->bd->query("SELECT cod_editor FROM proyectos
        // WHERE YEAR(f_inicio) = YEAR(CURDATE()) AND MONTH(f_inicio) = MONTH(CURDATE())
        // GROUP BY cod_editor HAVING AVG(PUNTOS) >= ALL (SELECT AVG(PUNTOS) FROM proyectos WHERE YEAR(f_inicio) = YEAR(CURDATE()) AND MONTH(f_inicio) = MONTH(CURDATE()) GROUP BY cod_editor)");

        $listar=$this->bd->query("SELECT cod_editor FROM proyectos WHERE YEAR(f_inicio) = YEAR(CURDATE()) AND MONTH(f_inicio) = MONTH(CURDATE()) GROUP BY cod_editor HAVING AVG(PUNTOS) = ( SELECT MAX(promedio_puntos) FROM ( SELECT AVG(PUNTOS) AS promedio_puntos FROM proyectos WHERE YEAR(f_inicio) = YEAR(CURDATE()) AND MONTH(f_inicio) = MONTH(CURDATE()) GROUP BY cod_editor ) AS subquery )");
        $this->editor=$listar->fetch_array(MYSQLI_ASSOC);
        return $this->editor;
    }
}
