<?php
// Guardar el puntaje del jugador en una cookie válida por 1 día
setcookie("puntaje_jugador", "1500", time() + 86400, "/");

// Acceder al puntaje
if (isset($_COOKIE['puntaje_jugador'])) {
    echo "Tu puntaje actual es: " . $_COOKIE['puntaje_jugador'];
}
?>