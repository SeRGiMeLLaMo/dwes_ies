<?php
function conectar_bd() {
    $db_file = 'sistema_web.db';
    return new PDO("sqlite:" . $db_file);
}

function verificar_usuario($usuario, $password) {
    $db = conectar_bd();
    $stmt = $db->prepare("SELECT ***** FROM usuarios WHERE usuario = ?");
    $stmt->execute([$usuario]);
    $fila = $stmt->*****(PDO::FETCH_ASSOC);

    return $fila && ******* ($password, $fila['password']);
}
?>