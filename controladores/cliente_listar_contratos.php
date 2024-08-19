<?php
include("../vistas/head.html");
?>

<body>
    <main>
        <?php
        require_once("../Funciones/funciones.php");
        require_once("../modelos/bd.php");
        require_once("../modelos/proyecto.php");
        require_once("../modelos/contrato.php");
        require_once("../modelos/multimedia.php");
        require_once("../modelos/editor.php");
        $id = checkLoggin();
        pintaMenu($id);
        checkUser($id);


        $contrato = new contrato();
        if (isset($_GET["num"])) {
            $contrato->desactivarContrato($_SESSION["id"]);
            header("Location: ../controladores/cliente_listar_contratos.php");
        } else {
            // Listo los contratos activos
            $contratos = $contrato->listarContratosCliente($_SESSION["id"]);
            if ($contratos == false) {
                // print_r($contratos);
                echo "<script>function mostrarAlerta() {
                alert('Actualmente no tienes ningun contrato activo');
            }
            mostrarAlerta();</script>";
            } else {
                include("../vistas/cliente_listar_contratos.php");
            }

            // Listo los proyectos activos
            $proyecto = new proyecto();
            $proyectos = $proyecto->listarProyectosCliente($_SESSION["id"]);
            if ($proyectos == false) {
                echo "<h2 class='text-center mt-5'>No tienes proyectos activos</h2>";
                echo"
                <section class='container mt-3 d-flex justify-content-start align-items-center'>
                <a href='../controladores/cliente_nuevo_proyecto.php?nuevo' class='w-100'>
                    <button class='btn btn-success btn-lg btn-block' name='añadirCliente'>Iniciar nuevo proyecto</button>
                </a>
            </section>
                ";
            } else {


                $multimedia = new multimedia();
                $destacada = $multimedia->imagenDestacadaProyecto($proyectos[0]["cod"]);
                include("../vistas/cliente_listar_proyectos.php");
            }
        }
        ?>


    </main>

    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>