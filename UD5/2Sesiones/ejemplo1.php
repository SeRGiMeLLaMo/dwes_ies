<?php
session_start();
SESSION["usuario"] = "pepe";
echo "Bienvenido, " . $_SESSION["usuario"];
?>