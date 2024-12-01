<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Encuestas</title>
</head>
<body>
    <h1>Gestión de Encuestas</h1>

    <form method="POST" action="index.php?action=crear">
        <input type="hidden" name="id" value="<?= isset($encuesta) ? $encuesta['id'] : '' ?>">
        <label>pregunta: <input type="text" name="pregunta" required></label><br>
        <label>respuesta_a: <input type="text" name="respuesta_a" required></label><br>
        <label>respuesta_b: <input type="text" name="respuesta_b" required></label><br>
        <button type="submit">Añadir Encuesta</button>
    </form>

    <h2>Lista
    <h2>Lista de Encuestas</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>pregunta</th>
            <th>respuesta_a</th>
            <th>respuesta_b</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($encuestas as $encuesta): ?>
        <tr>
            <td><?= $encuesta['id'] ?></td>
            <td><?= $encuesta['pregunta'] ?></td>
            <td><?= $encuesta['respuesta_a'] ?></td>
            <td><?= $encuesta['respuesta_b'] ?></td>
            <td>
                <form method="POST" action="index.php?action=editar" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $encuesta['id'] ?>">
                    <input type="text" name="pregunta" value="<?= $encuesta['pregunta'] ?>" required>
                    <input type="text" name="respuesta_a" value="<?= $encuesta['respuesta_a'] ?>" required>
                    <input type="text" name="respuesta_b" value="<?= $encuesta['respuesta_b'] ?>" required>
                    <button type="submit">Actualizar</button>
                </form>
                <form method="POST" action="index.php?action=eliminar" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $encuesta['id'] ?>">
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="generatorPDF.php">Generar PDF de encuestas</a>
</body>
</html>