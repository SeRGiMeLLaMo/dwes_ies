<?php

require_once __DIR__ . '/../models/Client.php';

class ClientController {
    public function showForm() {
        // Cargar la vista del formulario
        require_once __DIR__ . '/../views/form.php';
    }

    public function handleForm() {
        // Validar si el formulario fue enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $categoria = $_POST['categoria'] ?? '';
            $fechaFinMensualidad = $_POST['fecha_fin_mensualidad'] ?? '';

            // Crear un objeto Client con los datos del formulario
            $client = new Client($nombre, $categoria, $fechaFinMensualidad);

            // Pasar los datos a la vista de resultados
            require_once __DIR__ . '/../views/result.php';
        } else {
            // Si no es un POST, mostrar el formulario nuevamente
            $this->showForm();
        }
    }
}
?>
