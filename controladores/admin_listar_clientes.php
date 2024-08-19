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
    checkAdmin($id);
    ?>

    <main>
        <?php
        /////////////////////////////////////////////////LISTAR CLIENTES/////////////////////////////////
        $cliente = new cliente();
        $clientes = $cliente->listarClientes();
        include("../Vistas/admin_listar_clientes.php");
        ?>
    </main>

    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>