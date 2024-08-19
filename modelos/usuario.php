<?php
class usuario
{
    private $bd;
    private $usuario;

    public function __construct()
    {
        $this->bd = bd::conectar();
    }
    
    public function logginUsuario ($nick, $pass){
        $cliente = new cliente();
        $editor= new editor();

        $tipos= [$cliente, $editor];

        $i=0;
        $usuarios["id"]= -1;
        while ($usuarios["id"]==-1 && $i<count($tipos)){
            $usuarios= new $tipos[$i];
            $usuarios = $usuarios->loggin($nick, $pass);
            $i++;
        }
        return $usuarios;
    }
}
