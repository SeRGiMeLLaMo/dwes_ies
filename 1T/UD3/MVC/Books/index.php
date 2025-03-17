<?php
require_once 'config.php';
require_once 'controllers/BookController.php';

$controller = new BookController();
$controller->displayBooks();
?>
