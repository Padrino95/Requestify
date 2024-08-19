<?php
echo"
<section class='container mt-5'>
    <form action='../controladores/admin_modificar_estilo.php' method='POST'>
    <div class='mb-3'>
            <label for='id' class='form-label' >id:</label>
            <input type='text' class='form-control' id='id' name='id' value='$_GET[id]' readonly required>
        </div>
        <div class='mb-3'>
            <label for='nombre' class='form-label' >Nombre:</label>
            <input type='text' class='form-control' id='nombre' name='nombre' value='$_GET[nombre]' required>
        </div>
        <div class='mb-3'>
            <label for='descripcion' class='form-label'>Descripcion:</label>
            <input type='text' class='form-control' id='descripcion' name='descripcion' value='$_GET[descripcion]' required>
        </div>
        <button type='submit' class='btn btn-primary' name='enviar'>Enviar</button>
    </form>
</section>
";
?>