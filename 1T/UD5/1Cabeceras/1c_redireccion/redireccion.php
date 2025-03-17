<?php
// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener la cabecera seleccionada por el usuario
    $cabecera = isset($_POST['cabecera']) ? $_POST['cabecera'] : null;

    // Definir la URL de redirección
    $url_redireccion = 'https://www.ejemplo.com'; // URL de destino para la redirección

    // Validar que se ha seleccionado una cabecera válida
    if ($cabecera && in_array($cabecera, ['301', '302', '303', '307', '308'])) {
        // Enviar la cabecera de redirección correspondiente
        header("Location: $url_redireccion", true, $cabecera);
        exit(); // Terminar la ejecución del script después de la redirección
    } else {
        echo "Selecciona un tipo de cabecera válido.";
    }
}
?>