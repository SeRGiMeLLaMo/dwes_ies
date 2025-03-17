<?php


//ARGUMENTOS POR valor y por referencia

$precio_consola=500;

precio_iva($precio_consola);
$precio_consola = precio_iva($precio_consola);

print "<br/><br/>  ARGUMENTOS POR VALOR DE LA VARIABLE CONSOLA (Sin aumentar el IVA) $precio_consola <br  /> ";//ARGUMENTOS POR DEFECTO

precio_iva_referencia ($precio_consola);
function precio_iva($precio_arg) {
    return $precio_arg * 1.21;
}

print "<br/><br/>  ARGUMENTOS POR POR REFERENCIA DE LA VARIABLE CONSOLA (Sin aumentar el IVA) $precio_consola <br  /> ";//ARGUMENTOS POR DEFECTO


  //  print "<br/><br/>  ARGUMENTOS POR valor y por referencia <br  /> ";//ARGUMENTOS POR DEFECTO
    function precio_iva_referencia (&$precio /*le pasas su direcion de memoria 100325*/, $iva=0.21) {
        $precio *= (1 + $iva); 
        // No es necesario usar ningún return
    }

    $precio = 10;  //100325
    //print "<br/><br/>1- ANTES de llamar a la función:  El precio con IVA es ".$precio ;  //10

    precio_iva_referencia($precio);

    //print "<br/>2- DESPUES de llamar a la función:  El precio con IVA es ". $precio ;  //121


    ?>