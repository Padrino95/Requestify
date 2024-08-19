<?php
echo"
<section class='container mt-5'>
<h1 class='text-center'>Confirme su contraseña o introduzca una nueva</h1>
    <form action='../controladores/admin_modificar_cliente.php' method='POST'>
    <div class='mb-3'>
            <label for='id' class='form-label' >id:</label>
            <input type='text' class='form-control' id='id' name='id' value='$_GET[id]' readonly required>
        </div>
        <div class='mb-3'>
            <label for='nombre' class='form-label' >Nombre:</label>
            <input type='text' class='form-control' id='nombre' name='nombre' value='$_GET[nombre]' required>
        </div>
        <div class='mb-3'>
            <label for='nick' class='form-label'>Nick:</label>
            <input type='text' class='form-control' id='nick' name='nick' value='$_GET[nick]' required>
        </div>
        <div class='mb-3'>
            <label for='telefono' class='form-label'>Telefono:</label>
            <input type='text' class='form-control' id='telefono' name='telefono' value='$_GET[telefono]' required>
        </div>
        <div class='mb-3'>
            <label for='contrasena' class='form-label'>Contraseña:</label>
            <input type='password' class='form-control' id='contrasena' name='contrasena'>
        </div>
        <button type='submit' class='btn btn-primary' name='enviar'>Enviar</button>
    </form>
</section>
";
?>