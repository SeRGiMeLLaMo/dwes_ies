<?php
class Animal {
    public $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function hacerSonido() {
        return "El animal hace un sonido";
    }
}

// Clase Perro que hereda de Animal
class Perro extends Animal {
    public function hacerSonido() {
        return "Guau Guau<br>";
    }
}

class pato extends Animal {
    public function hacerSonido() {
        return "cua cua";
    }
}

$perro = new Perro("Max");
echo $perro->hacerSonido(); // Salida: Guau Guau

$pato = new Pato("Donald");
echo $pato->hacerSonido(); // Salida: cua cua
?>