<?php
include("../vistas/head.html");
?>

<body>
    <?php
    require_once("../Funciones/funciones.php");
    require_once("../modelos/bd.php");
    require_once("../modelos/plan.php");
    $id = checkLoggin();
    pintaMenu($id);

    $plan= new plan();
    $planes= $plan->listarPlanes();
    ?>

    <main>
    <?php include("../vistas/usuario_listar_planes.php"); ?>
    </main>
    
    <?php pintarFooter(); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>