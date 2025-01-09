<?php
    echo "Hola, mundo!";



    echo "Hola, ", "mundo!";


    
    $nombre = "Juan";
    echo "Hola, " . $nombre . "!";


    echo "Hola," , $nombre, $nombre, "adios";// echo puede recibir varios parametros y es la unica que acepta coma
    //print("Hola.$nombre"); //print solo puede recibir un parametro
    print("Hola.$nombre");

        #ESPECIFICADORES: %d = decimal / %s = string
            $nombre = "Pedro Porro";
            $valor = 10;
            $deporte = "Futbol";

            printf ("<p>%s cobra %dk euros al mes y juega a %s.</p>", $nombre, $valor, $deporte);

?>