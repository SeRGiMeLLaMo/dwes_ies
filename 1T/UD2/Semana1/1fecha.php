<?php
//muestra una fecha
echo"<br> 1" . date ("D-Y-m-d");

//establece la zona horaria
date_default_timezone_set("America/Toronto");
echo"<br> 2" . date ("D-Y-m-d, e");

$fecha="2024-10-01";

// echo date_format ($date, 'Y-m-d H:i:s');
// Si quieres otra fecha, hay que convertir la cadena a una fecha con strtotime
echo "<br> 3" . date ("D-Y-m-d", strtotime($fecha));
?>