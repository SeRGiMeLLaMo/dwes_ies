<?php
// Recuperamos la información de la sesión
session_start();

// Y la destruimos
session_destroy();

// Si hemos creado cookies también las eliminamos

//Redirigimos al login
header("Location: login.php");
?>