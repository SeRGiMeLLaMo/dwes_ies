<?php
interface Operaciones {
    public function depositar($cantidad);
    public function retirar($cantidad);
}

class Cuenta implements Operaciones {
    private $saldo = 0;

    public function depositar($cantidad) {
        $this->saldo += $cantidad;
    }

    public function retirar($cantidad) {
        if ($cantidad <= $this->saldo) {
            $this->saldo -= $cantidad;
        }
    }

    public function obtenerSaldo() {
        return $this->saldo;
    }
}

$cuenta = new Cuenta();
$cuenta->depositar(500);
$cuenta->retirar(50);
echo $cuenta->obtenerSaldo(); // Salida: 450
?>