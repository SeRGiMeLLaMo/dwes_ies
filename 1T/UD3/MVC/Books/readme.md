Aquí tienes una estructura básica en PHP y HTML para implementar una aplicación web que usa el patrón Modelo-Vista-Controlador (MVC) sin mantenimiento de estado. La aplicación consume datos de libros desde una API pública. Esta es una aproximación simplificada sin dependencias adicionales, usando `file_get_contents` para realizar solicitudes HTTP.

### Estructura de Archivos

Crea la siguiente estructura de directorios y archivos para separar la lógica de negocio:

```
- index.php              # Punto de entrada de la aplicación
- controllers/
    - BookController.php # Controlador que obtiene datos de la API
- models/
    - BookModel.php      # Modelo para representar y gestionar los datos del libro
- views/
    - BookView.php       # Vista que muestra los datos del libro
- config.php             # Configuración general (API URL)
```

### Paso 1: Configuración

**config.php**
Define la URL de la API para obtener datos de los libros.

```php
<?php
// URL de una API pública que proporciona datos de libros
define('API_URL', 'https://api.itbook.store/1.0/new');
?>
```

### Paso 2: Crear el Modelo

**models/BookModel.php**
El modelo obtiene datos de la API y los convierte en un formato adecuado para el controlador.

```php
<?php
class BookModel {
    public function getBooks() {
        $json = file_get_contents(API_URL); // Obtiene datos de la API
        $data = json_decode($json, true); // Decodifica la respuesta JSON
        return $data['books'] ?? []; // Devuelve la lista de libros o un array vacío si no hay datos
    }
}
?>
```

### Paso 3: Crear el Controlador

**controllers/BookController.php**
El controlador llama al modelo para obtener los datos de los libros y luego los pasa a la vista.

```php
<?php
require_once 'models/BookModel.php';
require_once 'views/BookView.php';

class BookController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new BookModel();
        $this->view = new BookView();
    }

    public function displayBooks() {
        $books = $this->model->getBooks(); // Obtiene los datos del modelo
        $this->view->render($books); // Pasa los datos a la vista para mostrarlos
    }
}
?>
```

### Paso 4: Crear la Vista

**views/BookView.php**
La vista muestra la lista de libros en HTML. Utiliza los datos proporcionados por el controlador.

```php
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
```

### Paso 5: Punto de Entrada

**index.php**
Este archivo inicializa el controlador y muestra los libros. Al ejecutar `index.php`, se carga toda la aplicación y se llama a los métodos del controlador.

```php
<?php
require_once 'config.php';
require_once 'controllers/BookController.php';

$controller = new BookController();
$controller->displayBooks();
?>
```

### Explicación del Flujo de Trabajo

1. **index.php**: El punto de entrada inicializa el `BookController` y llama a `displayBooks()` para empezar el flujo.
2. **BookController.php**: El controlador llama al modelo `BookModel` para obtener los datos de la API y los pasa a la vista `BookView`.
3. **BookModel.php**: El modelo se comunica con la API pública, obtiene los datos y los devuelve al controlador.
4. **BookView.php**: La vista recibe los datos del controlador y los renderiza en HTML.

### Ejecución

Para ejecutar esta aplicación:

1. Coloca todos los archivos en el directorio raíz de tu servidor web o en el directorio `htdocs` de XAMPP.
2. Accede a `http://localhost/index.php` en el navegador para ver la lista de libros obtenida de la API pública.
