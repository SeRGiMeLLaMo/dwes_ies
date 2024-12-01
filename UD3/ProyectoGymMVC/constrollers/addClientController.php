<?php
session_start(); // Iniciar la sesión

// Importar la clase Client
require_once '../model/client.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $actividadPrincipal = $_POST['actividadPrincipal'];
    $subactividades = $_POST['subactividades'];
    $fecha = $_POST['fecha'];

    // Definir las subactividades predefinidas para cada actividad principal
    $subactividadesMap = [
        "defensa_personal" => ["Boxeo", "Kick-boxing", "Sanda"],
        "cardio" => ["Crossfit", "Máquinas específicas"],
        "fuerza" => ["Halterofilia", "Mancuernas", "Calistenia"]
    ];

    // Obtener las subactividades según la actividad principal seleccionada
    $subactividades = isset($subactividadesMap[$actividadPrincipal]) ? $subactividadesMap[$actividadPrincipal] : [];

    // Crear una instancia del modelo Client
    $cliente = new Client($nombre, $actividadPrincipal, $fecha);

    // Guardar en la variable de sesión
    if (!isset($_SESSION['clientes'])) {
        $_SESSION['clientes'] = []; // Inicializar el array de clientes en sesión si no existe
    }
    $_SESSION['clientes'][] = $cliente; // Añadir el cliente al array de clientes en sesión

    // Guardar un mensaje de éxito en la sesión
    $_SESSION['success_message'] = "Cliente guardado correctamente.";

    // Redirigir de nuevo a home.php
    //header("Location: ../vistas/home.php");
   
    include __DIR__ . '$../vistas/home.php';

    exit();
}
?>
