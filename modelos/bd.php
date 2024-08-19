<?php
class bd
{
    public static function conectar()
    {
        $conexion = new mysqli("localhost", "root", "", "requestify");
        $conexion->set_charset("utf8");
        return $conexion;
    }
}