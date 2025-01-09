<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>procesa2</title>
</head>
<body>
    <h1>Procesa 2</h1>
    <p>El nombre que ha rellenado es <?php echo $nombre; ?> </p>
    <?php
        //recogemos valores de las variables
        $nombre = $_GET['nombre'];
        $modulos = $_GET['modulos'];

        print "Nombre: " . $nombre. "<br >";

        foreach($modulos as $clave => $modulo){
            print "Clave: ". $clave . " Modulo: " .$modulo. "<br >";
        }

        print_r($_GET);
    ?>
    
</body>
</html>