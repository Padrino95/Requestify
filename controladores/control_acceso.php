<?php
if (isset($_POST["enviar"])) {
    $error = 0;
    if (!$_POST["nick"] || !$_POST["pass"]) {
        $error = 1;
        header("Refresh:0; url=../vistas/acceso.php?error=$error");
    } else {
        $nick = trim($_POST["nick"]);
        $pass = trim($_POST["pass"]);

        require_once("../modelos/bd.php");
        require_once("../modelos/usuario.php");
        require_once("../modelos/cliente.php");
        require_once("../modelos/editor.php");

        $usuario = new usuario();
        $info = $usuario->logginUsuario($nick, $pass);
        if ($info["id"] == -1) {
            $error = 2;
            header("Refresh:0; url=../vistas/acceso.php?error=$error");
        } else {
            session_start();
            $_SESSION["id"] = $info["id"];
            $_SESSION["nick"] = $nick;
            $_SESSION["tipoU"]= $info["tipoU"];
            if (isset($_POST["recordar"])) {
                setcookie("sesion", session_encode(), time() + (30 * 24 * 60 * 60), "/");
            }
            header("Refresh:0; url=../index.php");
        }
    }
}
