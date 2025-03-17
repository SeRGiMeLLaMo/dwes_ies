<?php
// Archivo: index.php
// Incluir el archivo de funciones
include "funciones.inc.php";


//variables PHP
$precio_movil = 350;
precio_con_iva();
$precio = 10;
$condicional = true;
$precio = 10;
$precio_iva = precio_iva_argumento($precio);
$precio = 100;
$precio_iva = precio_iva_defecto($precio, 0.30);
$precio = 36;  //100325


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>5 Funciones</title>
    <!-- Enlace al CDN de Pico CSS -->
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.5.6/css/pico.min.css">
    <!-- Enlace al archivo CSS externo -->
    <!-- <link rel="stylesheet" href="styles.css">-->
</head>
<body>
    <header>
        <h1>5. Funciones</h1>
        <nav>
            <ul>
                <li><a href="#">Funciones</a></li>
                <li><a href="#">Argumentos</a></li>
                <li><a href="#">Include/Require</a></li>
                <li><a href="#">Referencia</a></li>
            </ul>
        </nav>

        
    </header>

    <main>
        <section>
            <h2>Creación funciones</h2>
            <p>Cuando quieres repetir la ejecución de un bloque de código, puedes utilizar un bucle. Las funciones tienen una utilidad similar: nos permiten asociar una etiqueta (el nombre de la función) con un bloque de código a ejecutar. Además, al usar funciones estamos ayudando a estructurar mejor el código. Como ya sabes, las funciones permiten crear variables locales que no serán visibles fuera del cuerpo de las mismas.</p>
            <br>
            <?php
                echo funcion_test();
            ?>
            <h2> UD2. 5 FUNCIONES</h2>
            <h2> UD2.5 FUNCIONES.  Argumentos </h2>
            <br /> ARGUMENTOS<br />
            <br /> <br />
        </section>
  

<?php
  // FUNCIONES

  echo "<section>";


   

  //6. FUNCIONES 
    

   
    

    print "<br/> **********************";



    //FUNCIONES CONDICIONAL
   
    print "<br  /> FUNCIONES CONDICIONAL <br  /> ";

   
    print "<br  /> 1- Llamada antes de condicional";
    //precio_con_iva_condi();              
    // Da error, pues aquí aún no está definida la función
    //Además se para el código.
   
    print "<br  /> 2- Llamada después de condicional";


    
    

       print "<br /> ARGUMENTOS <br  /> ";//ARGUMENTOS
    

    

    // OPCION 1: guardandolo en una variable
   
    print "<br /> 1 - El precio con IVA es ".$precio_iva;

    // Opcion 2: sin almacenar en variable
    print "<br /> 2 - El precio con IVA es " . precio_con_iva($precio);
    
  // Variable del programa principal
  print "<br /> 3 - La Variable del programa principal (precio=10) es " . $precio;


    print "<br/><br/>  ARGUMENTOS POR DEFECTO <br  /> ";//ARGUMENTOS POR DEFECTO
    //ARGUMENTOS POR DEFECTO

   
   


    // OPCION 1: guardandolo en una variable y enviandole un IVA nuevo   //130
  
    print "<br /> 1 - El precio con IVA  actualizando al 30% es ".$precio_iva;

    // Opcion 2: sin almacenar en variable y Utilizando el IVA por defecto (0,21)  //121
    print "<br /> 2 - El precio con IVA es " . precio_iva_defecto($precio);



    //ARGUMENTOS POR valor y por referencia
    print "<br/><br/>  ARGUMENTOS POR valor y por referencia <br  /> ";//ARGUMENTOS POR DEFECTO
   

  
    print "<br/><br/>1- ANTES de llamar a la función:  El precio con IVA es ".$precio ;  //10

    precio_iva_referencia($precio);

    print "<br/>2- DESPUES de llamar a la función:  El precio con IVA es ". $precio ;  //121
    

    echo "<br><br><br><br><br><br><br> </section>";

?>

</main>

    <footer>
        <p>&copy; 2024 Mi Sitio Web. Todos los derechos reservados.</p>
    </footer>
</body>
</html>