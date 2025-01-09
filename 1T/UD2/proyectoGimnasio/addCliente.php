<?php
session_start(); // Iniciar la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $actividadPrincipal = $_POST['actividad'];
    $fecha = $_POST['fecha'];

    // Definir las subactividades predefinidas para cada actividad principal
    $subactividadesMap = [
        "defensa_personal" => ["Boxeo", "Kick-boxing", "Sanda"],
        "cardio" => ["Crossfit", "Máquinas específicas"],
        "fuerza" => ["Halterofilia", "Mancuernas", "Calistenia"]
    ];

    // Obtener las subactividades según la actividad principal seleccionada
    $subactividades = isset($subactividadesMap[$actividadPrincipal]) ? $subactividadesMap[$actividadPrincipal] : [];

    // Crear un array de datos para el cliente
    $cliente = [
        "nombre" => $nombre,
        "actividadPrincipal" => $actividadPrincipal,
        "subactividades" => $subactividades,
        "fecha" => $fecha
    ];

    // Guardar en la variable de sesión
    if (!isset($_SESSION['clientes'])) {
        $_SESSION['clientes'] = []; // Inicializar el array de clientes en sesión si no existe
    }
    $_SESSION['clientes'][] = $cliente; // Añadir el cliente al array de clientes en sesión

    // Guardar un mensaje de éxito en la sesión
    $_SESSION['success_message'] = "Cliente guardado correctamente.";

    // Redirigir de nuevo a home.html
    header("Location: home.php");
    exit();
}
?>
