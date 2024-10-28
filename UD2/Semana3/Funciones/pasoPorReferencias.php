<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de PHP con Parámetros por Referencia</title>
</head>
<body>
    <h1>Ejemplo de Funciones con Parámetros por Referencia</h1>

    <?php
     // Valores iniciales
    $numero = 5;
    $texto = "Hola Mundo";
    $valorA = 10;
    $valorB = 20;

    // Llamadas a las funciones
    incrementarValor($numero, 3); // Incrementa $numero por 3
    convertirMayusculas($texto); // Convierte $texto a mayúsculas
    intercambiarValores($valorA, $valorB); // Intercambia $valorA y $valorB

    // Mostrar resultados
    echo "<p>El valor incrementado es: $numero</p>";
    echo "<p>El texto en mayúsculas es: $texto</p>";
    echo "<p>Después de intercambiar, Valor A es: $valorA y Valor B es: $valorB</p>";
    ?>
</body>
</html>


<?php
   // Función 1: Incrementa el valor por referencia
   function incrementarValor(&$numero, $incremento) {
    $numero += $incremento;
}

// Función 2: Convierte una cadena a mayúsculas por referencia
function convertirMayusculas(&$texto) {
    $texto = strtoupper($texto);
}

// Función 3: Intercambia dos valores por referencia
function intercambiarValores(&$a, &$b) {
    $temp = $a;
    $a = $b;
    $b = $temp;
}

/*Explicación de las Funciones
incrementarValor(&$numero, $incremento):

Esta función recibe el parámetro $numero por referencia y lo incrementa por el valor de $incremento. Así, el cambio en $numero afecta directamente al valor original.
convertirMayusculas(&$texto):

Convierte la cadena $texto a mayúsculas usando strtoupper() y modifica el parámetro recibido por referencia.
intercambiarValores(&$a, &$b):

Intercambia los valores de $a y $b utilizando una variable temporal $temp y asigna los nuevos valores a las referencias.
Ejemplo de Salida
yaml
Copiar código
El valor incrementado es: 8
El texto en mayúsculas es: HOLA MUNDO
Después de intercambiar, Valor A es: 20 y Valor B es: 10
Este ejemplo ilustra el uso de parámetros por referencia en PHP
*/
?>