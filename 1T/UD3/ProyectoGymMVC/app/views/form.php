<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Cliente</title>
</head>
<body>
    <div class="container">
        <h1>Formulario Cliente</h1>
        <form method="POST" action="index.php">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <option value="">Seleccione una opción</option>
                <option value="fuerza">Fuerza</option>
                <option value="cardio">Cardio</option>
                <option value="defensa_personal">Defensa Personal</option>
            </select>

            <label for="fecha_fin_mensualidad">Fecha de fin de mensualidad:</label>
            <input type="date" id="fecha_fin_mensualidad" name="fecha_fin_mensualidad" required>

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
