<?php
// Modificar el nivel alcanzado por el jugador
setcookie("nivel_jugador", "2", time() + 86400, "/");

// Cambiar el nivel a 3
setcookie("nivel_jugador", "3", time() + 86400, "/");

echo "Has avanzado al nivel: " . $_COOKIE['nivel_jugador'];

// Para eliminar la cookie, se establece una fecha de expiración en el pasado
setcookie("puntaje_jugador", "", time() - 3600, "/");

echo "Puntaje reiniciado.";
?>