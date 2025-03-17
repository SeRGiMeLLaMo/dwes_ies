<?php
include 'db.php';
include 'models/Encuestas.php';

class EncuestasController {
    private $encuestasModel;

    public function __construct($pdo) {
        $this->encuestasModel = new Encuestas($pdo);
    }

    public function index() {
        $encuestas = $this->encuestasModel->getAll();
        include 'views/encuestas/index.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->encuestasModel->crear($_POST['pregunta'], $_POST['respuesta_a'], $_POST['respuesta_b']);
            header("Location: index.php");
        }
    }

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->encuestasModel->editar($_POST['id'], $_POST['pregunta'], $_POST['respuesta_a'], $_POST['respuesta_b']);
            header("Location: index.php");
        }
    }

    public function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->encuestasModel->eliminar($_POST['id']);
            header("Location: index.php");
        }
    }
}
?>