<?php
include("../vistas/head.html");
?>

<body>
    <?php
    require_once("../Funciones/funciones.php");
    require_once("../modelos/cliente.php");
    require_once("../modelos/bd.php");

    $id = checkLoggin();
    pintaMenu($id);
    ?>

    <main>
        <?php
        /////////////////////////////////////////////////INSERTAR CLIENTES/////////////////////////////////
        if (isset($_GET["error"])) {
        ?>
            <script>
                alert("Debes rellenar todos los datos")
            </script>
        <?php
            header("refresh:0; url=../vistas/acceso.php");
        } elseif (isset($_POST['enviar'])) {
            $nombre = trim($_POST['nombre']);
            $nick = trim($_POST['nick']);
            $pass = trim($_POST['contrasena']);
            $tel = trim($_POST["telefono"]);

            if ($nombre != "" && $nick != "" && $pass != "" && $tel != "") {
                $socio = new cliente();
                $socios = $socio->insertarCliente($nombre, $tel, $nick, $pass);
                header("refresh:0; url=../vistas/acceso.php");
            } else {
                header("refresh:0; url=./registro.php?error=1");
            }
        } else {
            include("../vistas/usuario_registro.php");
        }
        ?>
    </main>

    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>