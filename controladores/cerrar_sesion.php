<?php
if (isset($_GET["cerrar"])) {
    session_start();
    setcookie("sesion", null, time() - 3600, "/");
    session_destroy();
    $_SESSION = [];
    header("Refresh:0; url=../vistas/acceso.php");
}