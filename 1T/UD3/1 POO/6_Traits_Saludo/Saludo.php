<?php
trait Saludo {
    public function decirHola() {
        return "Hola!";
    }
}

class Usuario {
    use Saludo;
}

class Administrador {
    use Saludo;
}

$usuario = new Usuario();
echo $usuario->decirHola(); // Salida: Hola!

$admin = new Administrador();
echo $admin->decirHola(); // Salida: Hola!
?>