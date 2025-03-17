<?php


    function funcion_test()
    {
        $grupo= "  ACDC";
        $disco=" <b>Highway to hell </b>";
        return " El grupo $grupo sacó el disco $disco";
    }
  
    
  function precio_con_iva() 
   {
        global $precio_movil;
        $precio_iva = $precio_movil * 1.21;
         
        print "<br  /> 1- El precio con IVA es ". $precio_iva;
    }
   
    function precio_iva_argumento($precio_arg) {
        return $precio_arg * 1.21;
    }

    
    function precio_iva_defecto($precio_arg, $iva=0.21) {
        return $precio_arg * (1 + $iva);
        }
    

      function precio_iva_referencia (&$precio /*le pasas su direcion de memoria 100325*/, $iva=0.21) {
        $precio *= (1 + $iva); 
        // No es necesario usar ningún return
    }


?>