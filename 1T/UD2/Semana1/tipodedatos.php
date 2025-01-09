
    <?php
    #Region uso de variables 
        // obtiene el tipo de dato que se le pasa como parámetro y devuelve una cadena de texto que puede ser
        //php array, boolean, double, integer, object, null, object, resource, string o unknown

        $variable=18.7;
        $variable=18;
        $variable="Hellow World";
        $variable=null;
        $variable=array (1,2,3,4);
        $variable=true;

        echo "El tipo de variable es: " . gettype($variable). "<br>"; //devuelve la variable de tipo

        echo"VAR_DUMP ->", var_dump($variable);

        echo"<br> ¿Es un array? ->", is_array($variable);

        $salida=is_array($variable);
        echo "<br> ¿La salida es boleana? ->". is_bool ($salida);
        echo"<br>";

        //settype
        $dinero = $saldo = "2.789";
        

        settype($dinero, "double");
        print"\$dinero vale $dinero y es de tipo:" . gettype($dinero);
        print "<br>";
        print "\$saldo vale $saldo y es de tipo:" . gettype($saldo);
        echo"<br>";

        //isset
        $zero = null;

        echo isset($saldo);
        echo isset($zero);

        echo"<br>";

        if(isset($zero)==null){
            print "La variable no existe";
        }else{
            print "La variable existe";
        }

        //unset

        echo "<br> A es ->";
        unset($a);
        echo "<br> A es ->", $a; //settype

        echo"<br>";

    #Region Ejemplo de ocultacion de errores
        // Desactivar toda las notificaciónes del PHP

        error_reporting(0);

        
        // Notificar solamente errores de ejecución

        error_reporting(E_ERROR | E_WARNING | E_PARSE);


        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);


        // Mostrar todos los errores menos el E_NOTICE

        // Valor predeterminado ya descrito en php.ini

        error_reporting(E_ALL ^ E_NOTICE);


        //Notificar todos los errores de PHP

        error_reporting(E_ALL);


        // Notificar todos los errores de PHP
        error_reporting(-1);

        

        // Lo mismo que error_reporting(E_ALL);

        ini_set('error_reporting', E_ALL);
        
    ?>
