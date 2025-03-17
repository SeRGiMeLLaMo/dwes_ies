<?php
$persona1 = 10;
$persona2 = 20;

if ($persona1 > $persona2) {
    echo "La persona 1 es mayor que la persona 2";
} else if ($persona1 < $persona2) {
    echo "La persona 1 es menor que la persona 2";
} else {
    echo "La persona 1 y la persona 2 tienen la misma edad";
}

// Operador ternario

/*
1. Sintaxis Basica del operador Ternario:
La sintaxis basica de un operador ternario es la siguiente:

(condicion) ? valor_si_verdadero : valor_si_falso;
*/
$interruptor = true;
echo ($interruptor) ? "<br> encendido" : "<br> apagado"; 

//Operador terbario anidado NO VALIDO desde el PHP 7.4

//"La persona 2 es mayor que la persona 1";

//switch
$pie=42;

switch ($pie) {
    case 42:
        echo "<br> tienes un pie estandar";
        break;
    case 45:
        echo "<br> tienes un pie muy grande";
        break;
    case 36:
        echo "<br> tienes un pie muy pequeño";
        break;
    default:
        echo "<br> no se que numero de pie tienes";
}


//MATCH
//A diferencia de switch, la comprobacion es una comprobacion de identidad (===)
//Identidad es cuando tiene mismo valor y tipo de dato.
//en lugar de una comprobacion de igualdad debil (==), solo cuando tienen el mismo valor 
$salida = match($pie) {
    $pie < 42 =>  "<br> tienes un pie mas pequeño",
    $pie <= 42 =>  "<br> tienes un pie menor o igual a la media",
    $pie == 42 =>  "<br> tienes un pie estandar",
    $pie >= 42 =>  "<br> tienes un pie mayor o igual a la media",
    $pie > 42 =>  "<br> tienes un pie mas grande",

    default =>  "<br> no se que numero de pie tienes"

};
echo($salida);


?>