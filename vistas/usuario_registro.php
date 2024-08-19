<?php
echo"
<section class='container mt-5'>
    <form action='../controladores/registro.php' method='POST'>
        <div class='mb-3'>
            <label for='nombre' class='form-label' >Nombre:</label>
            <input type='text' class='form-control' id='nombre' name='nombre' required>
        </div>
        <div class='mb-3'>
            <label for='nick' class='form-label'>Nick:</label>
            <input type='text' class='form-control' id='nick' name='nick' required>
        </div>
        <div class='mb-3'>
            <label for='telefono' class='form-label'>Teléfono:</label>
            <input type='text' class='form-control' id='telefono' name='telefono' required>
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