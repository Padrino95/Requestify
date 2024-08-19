<?php
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    $file_path = '../assets/imagenes/proyectos/' . $file;

    // Verifica que el archivo exista
    if (file_exists($file_path)) {
        // Define encabezados
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file_path).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_path));
        
        // Limpia la salida
        ob_clean();
        flush();
        
        // Lee el archivo y envíalo al usuario
        readfile($file_path);
        exit;
    } else {
        print_r($file_path);
        echo "El archivo no existe.";
    }
} else {
    echo "No se ha especificado un archivo para descargar.";
}
?>
