<?php
// Archivo: index.php

// Incluir el archivo de funciones
include 'funciones.inc.php';
// Llamar a las funciones y almacenar los resultados
$nombre = "Ana";
$mensajeSaludo = saludar($nombre);

$num1 = 7;
$num2 = 3;
$suma = sumar($num1, $num2);
$mayor = obtenerMayor($num1, $num2);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de Include en PHP</title>
</head>
<body>
    <h1>Página de Inicio</h1>

    <!-- Mostrar resultados de las funciones -->
    <p><?php echo $mensajeSaludo; ?></p>
    <p>La suma de <?php echo $num1; ?> y <?php echo $num2; ?> es: <?php echo $suma; ?></p>
    <p>El mayor entre <?php echo $num1; ?> y <?php echo $num2; ?> es: <?php echo $mayor; ?></p>
</body>
</html>