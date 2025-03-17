<?php
session_start(); // Asegurarse de que la sesión está iniciada

// Verificar si hay un mensaje de éxito
if (isset($_SESSION['success_message'])) {
    // Mostrar la alerta en HTML
    echo '<div class="alert success">' . $_SESSION['success_message'] . '</div>';
    
    // Limpiar el mensaje de éxito después de mostrarlo
    unset($_SESSION['success_message']);
}
?>

<script type="text/javascript">
    // Verificar si el elemento de la alerta existe
    var alert = document.getElementById('success-alert');
    if (alert) {
        // Configurar el temporizador para que la alerta se cierre después de 3 segundos
        setTimeout(function() {
            alert.style.display = 'none';
        }, 3000); // 3000 milisegundos = 3 segundos
    }
</script>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymStructure - Gestión de Gimnasio</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar con menú de navegación -->
        <aside class="sidebar">
            <div class="logo">
                <img src="./images/logo.png" alt="Logo" class="logo-icon">
            </div>
            <nav class="menu">
                <a class="menu-item" href="home.php">Clientes</a>
                <a class="menu-item" href="actividades.html">Actividades</a>
                <a class="menu-item" href="quienesSomos.html">Quienes Somos</a>
                <a class="menu-item" href="reportes.html">Reportes</a>
            </nav>
        </aside>
        
        <!-- Contenido principal -->
        <main class="main-content">
            <div class="header">
                <h1>Clientes</h1>
                <a class="add-client-btn" href="addCliente.html">+ Añadir cliente</a>
            </div>
            
            <!-- Tabla de clientes -->
            <div class="client-table">
                <div class="table-header">
                    <div class="column-title">Nombre</div>
                    <div class="column-title">Actividad</div>
                    <div class="column-title">Fin de Mensualidad</div>
                </div>
                
                <?php
                // Verificar si hay clientes en la sesión
                if (isset($_SESSION['clientes']) && count($_SESSION['clientes']) > 0) {
                    // Recorrer y mostrar cada cliente
                    foreach ($_SESSION['clientes'] as $cliente) {
                        echo '<div class="table-row">';
                        echo '<div class="table-cell">' . htmlspecialchars($cliente["nombre"]) . '</div>';

                        // Obtener el nombre de la actividad principal
                        $actividadPrincipalNombre = '';
                        switch ($cliente["actividadPrincipal"]) {
                            case 'defensa_personal':
                                $actividadPrincipalNombre = 'Defensa Personal';
                                break;
                            case 'cardio':
                                $actividadPrincipalNombre = 'Cardio';
                                break;
                            case 'fuerza':
                                $actividadPrincipalNombre = 'Fuerza';
                                break;
                            default:
                                $actividadPrincipalNombre = 'Desconocida';
                        }

                        // Mostrar la actividad principal
                        echo '<div class="table-cell">';
                        echo '<strong>' . htmlspecialchars($actividadPrincipalNombre) . '</strong><br>';
                        echo '</div>';

                        echo '<div class="table-cell">' . htmlspecialchars($cliente["fecha"]) . '</div>';
                        echo '</div>';
                    }
                } else {
                    // Mostrar mensaje si no hay clientes registrados
                    echo '<div class="table-row"><div class="table-cell" colspan="3">No hay clientes registrados.</div></div>';
                }
                ?>
            </div>
        </main>

        <!-- Imagen de fondo a la derecha -->
        <aside class="image-sidebar">
            <img src="./images/gym-image.jpeg" alt="Imagen del gimnasio" class="gym-image">
        </aside>

        
    </div>
    <?php include 'footer.php'; ?> <!-- Incluir el pie de página -->
</body>
</html>
