<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>procesa1</title>
</head>
<body>
    <h1>Procesa 1</h1>
    <?php
        //recogemos valores de las variables
        $nombre = $_POST['nombre'];
        $modulos = $_POST['modulos'];

        print "Nombre: " . $nombre. "<br >";

        foreach($modulos as $clave => $modulo){
            print "Clave: ". $clave . " Modulo: " .$modulo. "<br >";
        }

        print_r($_POST);
    ?>
    
</body>
</html>