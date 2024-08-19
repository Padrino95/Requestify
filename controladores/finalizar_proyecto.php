<?php
include("../vistas/head.html");
?>

<body>
    <main>
        <?php
        require_once("../Funciones/funciones.php");
        require_once("../modelos/bd.php");
        require_once("../modelos/proyecto.php");
        $id = checkLoggin();
        pintaMenu($id);
        checkUser($id);



        if (isset($_GET["proyecto"])) {
            $proyecto= new Proyecto();
            $proyecto->finalizarProyecto($_GET["proyecto"]);
            header("Location: ../controladores/editor_listar_proyectos.php");
        }
        // $contrato = new contrato();
        // if (isset($_GET["num"])) {
        //     $contrato->desactivarContrato($_SESSION["id"]);
        //     header("Location: ../controladores/cliente_listar_contratos.php");
        // } else {
        //     // Listo los contratos activos
        //     $contratos = $contrato->listarContratosCliente($_SESSION["id"]);
        //     if ($contratos == false) {
        //         // print_r($contratos);
        //         echo "<script>function mostrarAlerta() {
        //         alert('Actualmente no tienes ningun contrato activo');
        //     }
        //     mostrarAlerta();</script>";
        //     } else {
        //         include("../vistas/cliente_listar_contratos.php");
        //     }
        //     // Listo los proyectos activos
        //     $proyecto = new proyecto();
        //     $proyectos = $proyecto->listarProyectosCliente($_SESSION["id"]);
        //     $multimedia = new multimedia();
        //     $destacada = $multimedia->imagenDestacadaProyecto($proyectos[0]["cod"]);
        //     include("../vistas/cliente_listar_proyectos.php");
        // }
        ?>


    </main>

    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>