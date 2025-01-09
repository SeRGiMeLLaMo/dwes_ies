<head>
<meta charset="utf-8">
<title>LOGIN Misma Pagina</title>

    <link rel="stylesheet" href="https://unpkg.com/picocss@1.5.7/dist/pico.min.css">
    <link rel="stylesheet" href="estilos.css">

</head>
    
<body>

<?php

require ("../config/config.php");

//bloque try-catch, intenta y si no captura excepción
if(isset($_POST["enviar"])){
try{

        //$base=new PDO("mysql:host=localhost; dbport=3307; dbname=dwes","root","");
        $base=new PDO(DB_HOST.";".DB_NOMBRE,DB_USUARIO, DB_CONTRA);
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");
        // definimos nuestra consulta en SQL, 
        // :login :password son los MARCADORES para la consulta 
        $sql= "SELECT * FROM ud5_usuarios_pass where user= :login and pass= :password";
        //esta función se encarga de preparar la consulta
        $resultado=$base->prepare($sql);
        //convierte cualquier simbolo en HTML, comilla, guión bajo...
        //addslashes -> buscar en el manual php
        $login=htmlentities(addslashes($_POST["login"]));
        // lo mismo con el pass
        $password=htmlentities(addslashes($_POST["password"]));
        // ahora tenemos que identificar cada marcador de la sentencia SQL con su correspondiente valor (login/password)
        $resultado->bindValue(":login", $login);
        // bind = Unir, enlazar.. con el valor pasado en POST para enviar a SQL
        $resultado->bindValue(":password", $password); // bind = Unir, enlazar.. con el valor pasado en POST para enviar a SQL
        //ahora, ya preparada, podemos llamar a la función EXECUTE
        $resultado->execute(); 
        // No necesitamos imprimir en pantalla, solo saber si el usuario está o no está
        // Para ello utilizamos la función rowCount(), que como adivináis, nos dice el numero de registros..
        // 0 -> el usuario no existe, 1-> si el usuario existe
        // Necesitamos un usuario en nuestra tabla:  insert intoud5_usuarios_pass(id, password, usuarios); 
        $numero_registro=$resultado->rowCount();
        //ahora compruebo
        if($numero_registro!=0)
        {
            //Usuario Existe
            //echo "<h2> Adelante ! </h2>"; //Enviamos notificación en HTML
            echo "estas registrado";
            session_start();  //PARTE2
            $_SESSION["usuario"]=$_POST["login"];
            //Con esto controlo en la pagina usuarios_registro un filtro que use esta variable
         

        }else{
             // Usuario NO existe
            //Bucle infinito, le redirijo de nuevo a la página
            //header("location:login.php"); 
            echo "Usuario incorrecto";
        }


}catch(Exception $e){

    die("Error: " . $e->getMessage());

}

} // cierre condicional if isset enviar
?>

<?php 

    if( !isset($_SESSION["usuario"]) ) {
        //include("formulario.html");
    }else{
        echo "<br><b>Usuario:" . $_SESSION["usuario"];
        
    }
    
    
?>

    
</body>
<footer>
    <p>Pulse <a href="logout.php" class="contrast">aquí</a> para cerrar sesión y proteger su cuenta.</p>
</footer>
</html>
