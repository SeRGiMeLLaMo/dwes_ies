<?php
class BookView {
    public function render($books) {
        echo "<!DOCTYPE html>";
        echo "<html lang='es'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<title>Lista de Libros</title>";
        echo "</head>";
        echo "<body>";
        echo "<h1>Libros Recientes</h1>";

        if (empty($books)) {
            echo "<p>No se encontraron libros.</p>";
        } else {
            echo "<ul>";
            foreach ($books as $book) {
                echo "<li>";
                echo "<strong>" . htmlspecialchars($book['title']) . "</strong><br>";
                echo "Autor: " . htmlspecialchars($book['subtitle']) . "<br>";
                echo "ISBN: " . htmlspecialchars($book['isbn13']) . "<br>";
                echo "<img src='" . htmlspecialchars($book['image']) . "' alt='Portada'><br>";
                echo "<a href='" . htmlspecialchars($book['url']) . "'>Más información</a>";
                echo "</li><br>";
            }
            echo "</ul>";
        }

        echo "</body>";
        echo "</html>";
    }
}
?>
