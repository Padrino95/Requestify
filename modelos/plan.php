<?php

class plan
{

    private $bd;
    private $plan;


    public function __construct()
    {
        $this->bd = bd::conectar();
    }

    public function listarPlanes()
    {
        $planes=$this->bd->query("SELECT * FROM servicios");
        $this->plan=$planes->fetch_all(MYSQLI_ASSOC);
        return $this->plan;
    }
}
