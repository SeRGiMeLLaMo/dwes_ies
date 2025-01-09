<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>procesa3</title>
</head>
<body>
    <h1>Procesa 3</h1>
    <p>El nombre que ha rellenado es <?php echo $nombre; ?> </p>
    <?php
        //recogemos valores de las variables
        $nombre = $_REQUEST['nombre'];
        $modulos = $_REQUEST['modulos'];

        print "Nombre: " . $nombre. "<br >";

        foreach($modulos as $clave => $modulo){
            print "Clave: ". $clave . " Modulo: " .$modulo. "<br >";
        }

        ECHO "EL PRINT_R ES PARA VER EL ARRAY CON GET";
        print_r($_GET);

        ECHO "EL PRINT_R ES PARA VER EL ARRAY CON REQUEST";
        print_r($_REQUEST);
    ?>
    
</body>
</html>