<?php

require_once __DIR__ . '/app/controllers/ClientController.php';

$controller = new ClientController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->handleForm();
} else {
    $controller->showForm();
}
?>
