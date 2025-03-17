<?php
//Bucles
$contador =0;
echo "<br> bucle while:";
while ($contador < 10) {
    echo "<br> $contador";// imprime 0 1 2 3 4 5 6 7 8 9
    $contador++;
}

$contador = 0;
echo "<br> bucle do while:";
do{
    echo "<br>" .$contador;//imprime los pares
    $contador+=2;
}while ($contador < 10);


echo "<br> bucle for:";
for ($i = 0; $i < 10; $i++) {
    echo "<br> valor de i:  $i"; //imprime 0 1 2 3 4 5 6 7 8 9
}
?>