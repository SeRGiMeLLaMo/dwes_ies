<?php
class Encuestas {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM encuestas");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //Viene en el Punto 3 PDO 
    }

    public function crear($pregunta, $respuesta_a, $respuesta_b) {
        $stmt = $this->pdo->prepare("INSERT INTO encuestas (pregunta, respuesta_a, respuesta_b) VALUES (:pregunta, :respuesta_a, :respuesta_b)");
        $stmt->execute([':pregunta' => $pregunta, ':respuesta_a' => $respuesta_a, ':respuesta_b' => $respuesta_b]);
    }

    public function editar($id, $pregunta, $respuesta_a, $respuesta_b) {
        $stmt = $this->pdo->prepare("UPDATE encuestas SET pregunta = :pregunta, respuesta_a = :respuesta_a, respuesta_b = :respuesta_b WHERE id = :id");
        $stmt->execute([':pregunta' => $pregunta, ':respuesta_a' => $respuesta_a, ':respuesta_b' => $respuesta_b, ':id' => $id]);
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM encuestas WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM encuestas WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}