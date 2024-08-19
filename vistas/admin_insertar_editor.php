<?php
echo"
<section class='container mt-5'>
    <form action='../controladores/admin_insertar_editor.php' method='POST' enctype='multipart/form-data'>
        <div class='mb-3'>
            <label for='nombre' class='form-label' >Nombre:</label>
            <input type='text' class='form-control' id='nombre' name='nombre' required>
        </div>
        <div class='mb-3'>
            <label for='nick' class='form-label'>Nick:</label>
            <input type='text' class='form-control' id='nick' name='nick' required>
        </div>
        <div class='mb-3'>
            <label for='rol' class='form-label'>Rol:</label>
            <select id='rol' name='tipo' class='form-select form-select-sm' required>
                <option value='A'>Administrador</option>
                <option value='E'>Editor</option>
            </select>
        </div>
        <div class='mb-3'>
            <label for='contrasena' class='form-label'>Contraseña:</label>
            <input type='password' class='form-control' id='contrasena' name='contrasena' required>
        </div>
        <div class='mb-3'>
            <label for='imagen' class='form-label'>Foto:</label>
            <input type='file' class='form-control' id='imagen' name='imagen' required>
        </div>
        <div class='mb-3'>
            <label for='presentacion' class='form-label'>Presentación:</label>
            <textarea id='presentacion' name='presentacion' class='form-control' rows='6' cols='50' required></textarea>
        </div>

        <div class='mb-3'>
        <label for='opciones' class='form-label'>Selecciona una opción:</label>
        <select id='opciones' name='estilo' class='form-select'>";
            foreach ($estilos as $value) {
                echo "<option value='$value[cod]'>$value[nombre]</option>";
            }
            echo"
        </select>
        </div>


        <button type='submit' class='btn btn-primary' name='enviar'>Enviar</button>
    </form>
</section>
";
?>