<?php
//UNIDAD 2
    print "<h2> UD2. ARRAYS </h2>";

    //1.Introduccion a arrays
        //*print_r($SERVER);
        print"<br>
        Un array es un tipo de datos que nos permite almacenar varios valores. 
        Cada miembro del array se almacena en una posición a la que se hace referencia utilizando un valor clave. 
        Las claves pueden ser numéricas o asociativas.";
        print"<br> Array asociativo y sus dos formas de crearlo:";

            $persona = array(
                "nombre" => "Jesús",
                "apellidos" => "Perez",
                //clave - valor
            );

            //apartir de PHP 5.4

            $alumno = [
                "nombre" => "Jesús",
                "ciclo" => "2DAM",
            ];

            print "<br> Array persona:";
            print_r ($persona);


            print "<br> Array alumno:";
            print_r ($alumno);

    //2.Array Numerico y sus tres formas de crearlo    
        print "<h2> Array Numerico y sus tres formas de crearlo:</h2>";
            // array numérico
            $modulos = array(0 => "Programación", 1 => "Bases de datos", 2 => "Desarrollo web en entorno servidor");
            $alumnos1 = array("Antonio", "Rafa", "Sergio", "Francisco"); 
            $alumnos2 = ["Antonio", "Rafa", "Sergio", "Francisco"];

            print "<br> Array modulos:";
            print_r ($modulos);

            print "<br> Array alumnos1:";
            print_r ($alumnos1);

            print "<br> Array alumno2:";   
            print_r ($alumnos2);    

            print "<br> El alumno 2 es ". $alumnos1[1];
            print "<br> El alumno 2 es $alumnos1[1]";


    //3.Cadenas o variables de texto como arrays
        print "<h2> Cadenas o variables de texto como arrays:</h2>";
            print "<br> print_r de la variable TEXTO para ver que las cadenas se pueden tratar como arrays  ";
            $texto= "hola";
            print_r ($texto);
            print "<br /> ELEMENTO CADENA DE TEXTO hola [3]: ". $texto[3];

    //4.Arrays bidimensionales o multidimensionales    
        print "<h2> Arrays bidimensionales o multidimensionales:</h2>";
            $ciclos = array(
                "DAW" => array("PR" => "Programacion", "BD" => "Bases de datos", "DW" => "Desarrollo web"),
                "DAM" => array("PR" => "Programacion", "BD" => "Bases de datos", "PMDM" => "Programacion multimedia y dispositivos moviles"),
            );
            print "<br> Array ciclos:";
            print_r($ciclos);

            print "<br> Fila arrays ciclos:";
            print_r($ciclos["DAW"]);

            print "<br>Elemento PR de la fila arrays ciclos:";
            print_r($ciclos["DAW"]["PR"]);

            $deportes = [
                "futbol" => ["Real Madrid","FC Barcelona", "Real Betis"],
                "baloncesto" => ["Real Madrid","FC Barcelona", "Unicaja"],
                "tenis" => ["Stefanos Tsitsipas","Rafa Nadal", "Alcaraz"]
            ];

            $deportes2 = [
                ["Real Madrid","FC Barcelona", "Real Betis"],
                ["Real Madrid","FC Barcelona", "Unicaja"],
                ["Stefanos Tsitsipas","Rafa Nadal", "Alcaraz"]
            ];
            
            print "<br/> Asociativo (clave valor) :<br/>";
            print_r($deportes);
            print "<br/> Numerico :<br/>";
            print_r($deportes2);

    //5.Arrays sin especificar tamaño
        print "<br/> <h2> Arrays sin especificar tamaño</h2><br/>";  

        $cena_navidad[]="Francisco";

        $cena_navidad[]="Adrian Lucena";

        $cena_navidad[]="Rafael Lucena";

        print_r ($cena_navidad);


    

    //6.FOREACH
        print "<br/> <h2> Recorrer los Arrays </h2><br/>"; 
        print "<br/> FOREACH <br/>";
            //$modulos = array(0 => "Programación", 1 => "Bases de datos", 2 => "Desarrollo web en entorno servidor");

            foreach ($cena_navidad as $invitado) {
                print "Invitado:  $invitado <br/>";
            }

            foreach ($cena_navidad as $id => $invitado) {
                print "El ". $id+1 . " invitado es: ". $invitado . "<br/>";
            }

    //7.ANEXO FOREACH con clave valor <br />";
       /* print "<h2>FOREACH con clave valor de la variable SERVER </h2>";
        
        
        foreach ($_SERVER as $clave => $valor) 
        {
            print "<br/>";
            print "<tr/>";
                print "<td> Clave: ".$clave."</td> --------- Valor: ";
                print "<td>".$valor."</td>";
            print "</tr>";

        }
        */

    //8.Recorrer  Arrays con current, reset...

        echo "<br><h2> Recorrer  Arrays con current, reset... </h2><br/>";

        $musica = array("country", "Breakbeat", "Flamenco");
        //
        print_r($musica);

        echo "<br><h2> Recorrer con while NEXT </h2><br/>";
        while ($valor = current($musica)) 
        {

            print "<br/> El estilo de la musica es: ". $valor;
            next($musica);
        }

        echo "<br><br /> <b> Recorrerlo uno a uno </b>";

        print "<br/>Reinicio el puntero con reset: ".reset($musica) ;
        print "<br/>La clave de la posición actual del array es: ". key($musica) ;
        print "<br/>El elemento del array musica es ".current($musica) ;
        next($musica);
        next($musica);
        print "<br/>El elemento del array musica es ".current($musica) ;

        //estamos en el tercer elemento
        prev($musica);
        print "<br/>La clave de la posicion actual del array es: ".key($musica) ;
        print "<br/>El elemento del array musica es ".current($musica) ;


        print "<br/>Reinicio el puntero con reset: ".reset($musica) ;
        print "<br/>La clave de la posición actual del array es: ". key($musica) ;
        print "<br/>El elemento final del array musica es ".end($musica) ;
        print "<br/>La clave de la posición actual del array es: ". key($musica) ;

    //9.Funciones importantes para tratar arrays        
        print "<h2>Funciones importantes para tratar arrays </h2>";

            //Eliminamos un elemento del array deportes
            print "<br/>Eliminamos un elemento del array musica";
            unset($musica[2]);

            unset($musica[0]);

            print_r($musica);

            print "<br/>Ordenar un array con sort <br/>";

            $musica[0]= "Banda Cornetas y tambores";
            //se encarga de ordenarlo
            sort($musica);
            print_r($musica);

            print "<br><h3>Busqueda con in_array </h3></br>";

            //busqueda con in_array
            $para_buscar = "Cumbia";
            if (in_array($para_buscar, $musica)) 
            {

                print "<br/>Existe el elemento ". $para_buscar ;
                print "Su clave es ". array_search ($para_buscar, $deportes);
            }

            else
            print "<br/>No existe el elemento ". $para_buscar ;

            $para_buscar = "0";
            if (in_array($para_buscar, $musica)) 
            {
                print "<br/>Existe el elemento con clave ". $para_buscar ;
                print "El elemento es  ". $musica[$para_buscar];
            }

            else
            print "<br/>No existe el elemento ". $para_buscar ;
     
?>