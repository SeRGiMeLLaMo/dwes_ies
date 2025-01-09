<?php
//Archivo: funciones.inc.php

//Funcion para saludar
function saludar($nombre){
    return "Hola, $nombre! Bienvenido a nuestra pagina";

}

// Función para sumar dos números
function sumar($a, $b) {
    return $a + $b;
}

// Función para obtener el mayor de dos números
function obtenerMayor($a, $b) {
    return ($a > $b) ? $a : $b;
}
?>