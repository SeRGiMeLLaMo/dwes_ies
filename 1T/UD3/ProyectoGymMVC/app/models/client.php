<?php

class Client {
    private $nombre;
    private $categoria;
    private $fechaFinMensualidad;

    public function __construct($nombre, $categoria, $fechaFinMensualidad) {
        $this->nombre = $nombre;
        $this->categoria = $categoria;
        $this->fechaFinMensualidad = $fechaFinMensualidad;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getFechaFinMensualidad() {
        return $this->fechaFinMensualidad;
    }
}
?>
