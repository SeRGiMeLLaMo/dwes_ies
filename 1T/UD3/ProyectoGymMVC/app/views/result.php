<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <div class="container">
        <h1>Datos Recibidos</h1>
        <p><strong>Nombre:</strong> <?= htmlspecialchars($client->getNombre()) ?></p>
        <p><strong>Categoría:</strong> <?= htmlspecialchars($client->getCategoria()) ?></p>
        <p><strong>Fecha de fin de mensualidad:</strong> <?= htmlspecialchars($client->getFechaFinMensualidad()) ?></p>
        <a href="index.php" class="btn">Volver al formulario</a>
    </div>
</body>
</html>
