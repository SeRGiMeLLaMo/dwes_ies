<?php
class MayorMenor {
    private int $mayor;
    private int $menor;

    public function setMayor(int $may) {
        $this->mayor = $may;
    }

    public function setMenor(int $men) {
        $this->menor = $men;
    }

    public function getMayor() : int {
        return $this->mayor;
    }

    public function getMenor() : int {
        return $this->menor;
    }
}

//crea una nueva función que devuelve un nuevo objeto con los valores mayor y menor que se le pasen
function maymen(array $numeros) : ?MayorMenor {
    $a = max($numeros);
    $b = min($numeros);

    $result = new MayorMenor();
    $result->setMayor($a);
    $result->setMenor($b);

    return $result;
}

$resultado =  maymen([1,76,9,388,41,39,25,97,22]);
echo "<br>Mayor: ".$resultado->getMayor();
echo "<br>Menor: ".$resultado->getMenor();

/*
Este código define una función en PHP llamada `maymen` que recibe un arreglo de números (`array $numeros`) y devuelve un objeto de tipo `MayorMenor` que contiene el mayor y el menor valor del arreglo. Vamos a analizar el código línea por línea:

### Explicación 

function maymen(array $numeros) : ?MayorMenor {
1. `function maymen(array $numeros) : ?MayorMenor`
   - Define una función llamada `maymen` que recibe un único parámetro:
     - `array $numeros`**: Es un arreglo (`array`) de números que se pasa a la función.
   - **`: ?MayorMenor`**: Especifica el tipo de retorno de la función. La interrogación (`?`) antes de `MayorMenor` indica que la función puede devolver un objeto de tipo `MayorMenor` o `null` (opcional, por si no hay números en el arreglo, aunque este caso no se maneja explícitamente en el código).

```php
    $a = max($numeros);
    $b = min($numeros);
    */