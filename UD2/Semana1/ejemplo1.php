<?php
    // Código PHP aquíç
    //Comentarios de una sola linea

    echo "<h1>Hola Mundo</h1>";

    //Conclusiones personales

    /*Comentarios
    de varias
    lineas*/

    echo "<p>Primer script PHP</p>";

    echo "<p>El lenguaje PHP es un lenguaje de programación POCO TIPADO </p>";

    echo "<p>  Vamos a ver algunos tipos de datos y mostrarlo  </p>";

    $lunes; // variable sin valor

    $lunes= "Jesusito hazlo viernes"; // cadena de caracteres

    $dia_mes = 1; // entero

    //$2hola = "hola";  // error de sintaxis

    echo "<p> Concatenando variables </p>";

    echo "El lunes pienso" . $lunes . " y es dia " . $dia_mes . " del mes";
    
    echo "<br>"; //salto de linea
    
    echo $lunes;

    echo "<br>"; //salto de linea
    
    echo $dia_mes; 

    //PHP soporta varios tipos de datos, entre los mas comunes se encuentran:

    $numero_pie = 42;

    $precio = 19.99;

    $campaña = "2024/25";

    $descuento = true;

    $colores = array("rojo", "verde", "azul");

    echo"<p> Mostrando valores de tipos creados </p>";

    echo $numero_pie;

    echo "<br>";

    echo $precio;

    echo "<br>";

    echo $campaña;

    echo "<br>";

    echo $descuento;

    echo "<br>";

    echo $colores[2];

    echo "<br>";

    class Coche {
        public $marca;
        public function __construct($marca) {
            $this->marca = $marca;
        }
    }
    
    $miCoche = new Coche("Toyota");

    $x = 10; // Ámbito global

    function miFuncion() {
        global $x; // Hace $x accesible dentro de la función
        echo $x;

    }



    miFuncion(); // Imprime: 10

    function contador() {
        static $contador = 0; // Persiste su valor entre llamadas
        $contador++;
        echo $contador;
    }

    contador(); // Imprime: 1
    contador(); // Imprime: 2
    contador(); // Imprime: 3

?>
<?php
    $foo = "0";  // $foo es string (ASCII 48)
    $foo += 2;   // $foo es ahora un integer (2)
    $foo = $foo + 1.3;  // $foo es ahora un float (3.3)
    $foo = 5 + "10"; // $foo es integer (15)
    $foo = 5 + "10";     // $foo es integer (15)

?>

