<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3 - Usando Sesiones</title>
</head>

<body style="background-color:rgb(246,243,229);">

    <h2>Usando Sesiones</h2>

    <?php
    /*
      Alumno: [Nombre Apellido1 Apellido2]
      Fecha: [DD/MM/AAAA]
      Finalidad: Ejercicios UD5 - Usando sesiones en PHP
    */

    // Inicia una nueva sesión o recupera la sesión existente
    sessi*****();

    // --------------------
    // Ejemplo 1: Crear y mostrar una variable de sesión
    // --------------------

    // Crear una variable de sesión llamada 'newsession' y asignarle un valor
    $_SESSION["newsession"] = "****";

    // Mostrar el valor de la variable de sesión 'newsession'
    echo "<p><strong>Valor de la sesión 'newsession':</strong> </p>";

    // --------------------
    // Ejemplo 2: Crear, mostrar y eliminar una variable de sesión
    // --------------------

    // Crear otra variable de sesión llamada 'sessiontwo'
    $_SESSION["****"] = "Hello, I am **??**";

    // Mostrar el valor de 'sessiontwo' antes de eliminarla
    echo "<p><strong>Antes de borrar 'sessiontwo':</strong> " . $_SESSION["sessiontwo"] . "</p>";

    // Eliminar la variable de sesión 'sessiontwo' utilizando unset()
    unset($_SESSION["sessiontwo"]);

    // Intentar mostrar la variable de sesión después de eliminarla (generará un aviso)
    echo "<p><strong>Después de borrar 'sessiontwo':</strong> " . ($_SESSION["sessiontwo"] ?? "La sesión ha sido eliminada") . "</p>";

    // --------------------
    // Ejemplo 3: Contador de visitas utilizando sesiones
    // --------------------

    // Verificar si la variable de sesión 'visitas' ya existe
    if (isset($_SESSION['visitas'])) {
        // Si existe, incrementar el contador
        $_SESSION['visitas']++;
    } else {
        // Si no existe, inicializarla con 0
        $_SESSION['visitas'] = 0;
    }

    // Mostrar el número de visitas
    echo "<p><strong>Número de visitas:</strong> " . $_SESSION['visitas'] . "</p>";

    // --------------------
    // Ejemplo 4: Almacenar la fecha y hora de cada visita
    // --------------------

    // Añadir la fecha y hora actuales al array de visitas
    $_SESSION['visitarFecha'] = date('d-m-Y H:i:s');

    // Mostrar todas las fechas de visitas almacenadas
    echo "<p><strong>Fechas de visitas:</strong></p>";
    echo "<ul>";
    foreach ($_SESSION['visitarFecha'] as $fecha) {
        echo "<li>" . $fecha . "</li>";
    }
    echo "</ul>";

    ?>
</body>

</html>