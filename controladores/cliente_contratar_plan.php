<?php
include("../vistas/head.html");
?>

<body>
    <?php
    require_once("../Funciones/funciones.php");
    require_once("../modelos/bd.php");
    require_once("../modelos/contrato.php");
    require_once("../modelos/proyecto.php");
    $id = checkLoggin();


    // $contrato= new contrato();
    // $contratos= $contrato->peticionesContrato($_SESSION["id"]);
    // echo"<h3>$contratos</h3>";
    // $proyecto= new proyecto();
    // $contador= $proyecto->proyectosContrato($_SESSION["id"]);
    // echo"<h3>$contador</h3>";
    if (!isset($_SESSION["id"])) {
        header("refresh:0;url=../vistas/acceso.php");
    } else {
        $contrato = new contrato();
        if (!$contrato->listarContratosCliente($_SESSION["id"])) {
            $contrato2 = new contrato();
            $contrato2->insertarContrato($_SESSION["id"], $_GET["codigo"]);
            header("refresh:0;url=./cliente_listar_contratos.php");
        } else {
            echo "<script>function mostrarAlerta() {
                alert('Ya tienes un plan activado, se va a cancelar y sustituir por el nuevo plan');
            }
            mostrarAlerta();</script>";
            $contrato2 = new contrato();
            $contrato2->desactivarContrato($_SESSION["id"]);
            $contrato3 = new contrato();
            $contrato3->insertarContrato($_SESSION["id"], $_GET["codigo"]);
            header("refresh:0;url=./cliente_listar_contratos.php");
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>