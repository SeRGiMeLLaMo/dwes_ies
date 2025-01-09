<?php
class BookModel {
    public function getBooks() {
        $json = file_get_contents(API_URL); // Obtiene datos de la API
        $data = json_decode($json, true); // Decodifica la respuesta JSON
        return $data['books'] ?? []; // Devuelve la lista de libros o un array vacío si no hay datos
    }
}
?>
