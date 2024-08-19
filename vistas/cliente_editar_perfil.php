<?php
echo"
<section class='container mt-5'>
<h1 class='text-center'>Confirme su contraseña o introduzca una nueva</h1>
    <form action='../controladores/cliente_editar_perfil.php' method='POST' enctype='multipart/form-data'>
    <div class='mb-3'>
            <label for='id' class='form-label' >id:</label>
            <input type='text' class='form-control' id='id' name='id' value='$_SESSION[id]' readonly required>
        </div>
    <div class='mb-3'>
            <label for='nombre' class='form-label' >Nombre:</label>
            <input type='text' class='form-control' id='nombre' name='nombre' value='$info[nombre]' required>
        </div>
        <div class='mb-3'>
            <label for='nick' class='form-label'>Nick:</label>
            <input type='text' class='form-control' id='nick' name='nick' value='$info[nick]' required>
        </div>
        <div class='mb-3'>
            <label for='telefonno' class='form-label'>Teléfono:</label>
            <input type='text' class='form-control' id='nick' name='telefono' value='$info[telefono]' required>
        </div>
        <div class='mb-3'>
            <label for='contrasena' class='form-label'>Contraseña:</label>
            <input type='password' class='form-control' id='contrasena' name='contrasena' required>
        </div>
        <button type='submit' class='btn btn-primary' name='enviar'>Enviar</button>
    </form>
</section>
";
?>