<?php
class contrato
{
    private $bd;
    private $contrato;

    public function __construct()
    {
        $this->bd = bd::conectar();
    }
    
    // Funcion para insertar un contrato
    public function insertarContrato($cliente, $servicio){
        $horaActual = date("Y-m-d");
        $insercion = $this->bd->prepare("insert into contratos values (null,'A',NOW(),?,?)");
        $insercion->bind_param("ii", $cliente, $servicio);
        $insercion->execute();
        $insercion->close();
    }
    // Funcion para borrar un contrato
    public function desactivarContrato($cliente){
        $modificacion=$this->bd->prepare("update contratos set estado='D' where id_cliente=? and estado='A'");
        $modificacion->bind_param('i', $cliente);
        $modificacion->execute();
        $modificacion->close();
    }
    // Función para listar todos los contratos
    public function listarContratos(){
        $listar = $this->bd->query("SELECT * from contratos ORDER BY fecha DESC");
        $this->contrato = $listar->fetch_all(MYSQLI_ASSOC);
        return $this->contrato;
    }

    // Funcion para listar todos los contratos de un cliente
    public function listarContratosCliente($cliente){
        $listar=$this->bd->prepare("SELECT num, servicios.nombre, precio, peticiones FROM contratos, servicios WHERE codigo=cod_servicio and  id_cliente=? and estado='A'");
        $listar->bind_param("i", $cliente);
        $listar->bind_result($num, $nombrePlan, $precio, $peticiones);
        $listar->execute();
        $listar->store_result();
        if ($listar->num_rows() > 0){ 
            $listar->fetch();
            $this->contrato["num"]=$num;
            $this->contrato["nombrePlan"]=$nombrePlan;
            $this->contrato["precio"]=$precio;
            $this->contrato["peticiones"]=$peticiones;
            return $this->contrato;
        }else {
            return false;
        }
        $listar->close();
    }
    // Funcion para comprobar si un usuario tiene un contrato activo
    public function contratoActivo($usuario){
        $listar=$this->bd->query("select * from contratos where id_cliente=$usuario and estado='A'");
        $this->contrato=[];
        $this->contrato=$listar->fetch_all(MYSQLI_ASSOC);
        
        $listar->close();
        if (empty($this->contrato)) {
            return -1; 
        } else {
            return $this->contrato; 
        }
    }

    // Funcion para contar cuantas peticiones permite un contrato activo
    public function peticionesContrato($cliente){
        $select= $this->bd->prepare("SELECT peticiones from servicios, contratos where cod_servicio=codigo and estado='A' and id_cliente=?");
        $select->bind_param('i', $cliente);
        $select->bind_result($peticiones);
        $select->execute();
        $select->store_result();
        if ($select->num_rows()>0) {
            $select->fetch();
            $this->contrato=$peticiones;
            return $this->contrato;
        }else{
            return -1;
        }
        $select->close();
    }
}

