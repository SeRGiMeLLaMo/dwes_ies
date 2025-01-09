<?php 
/*
Para declarar una clase, se utiliza la palabra clave class seguido del nombre de la clase. 
Para instanciar un objeto a partir de la clase, se utiliza new:
*/
class Persona {
    private string $nombre;

    public function setNombre(string $nom) {
        $this->nombre=$nom;
    }

    public function imprimir(){
        echo $this->nombre;
        echo '<br>';
    }
}

$bruno = new Persona(); // creamos un objeto
$bruno->setNombre("Bruno Díaz"); // llamamos a su setter
$bruno->imprimir(); // imprimimos

$fran = new Persona(); // creamos otro objeto
$fran->setNombre("Alejandro López"); // llamamos a su setter
$fran->imprimir(); // imprimimos

?>



