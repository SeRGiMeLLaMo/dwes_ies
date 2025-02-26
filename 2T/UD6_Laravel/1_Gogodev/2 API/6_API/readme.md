### Documentación de la Creación de una API CRUD en Laravel

¡Hola! Aquí te dejo un resumen de cómo he creado una API CRUD usando Laravel, para gestionar notas. Este tutorial cubre desde la creación del proyecto hasta la implementación de recursos y pruebas con herramientas como ThunderClient. ¡Vamos paso a paso!

---

### 1. Crear el Proyecto

Primero, creamos un nuevo proyecto de Laravel, llamado `apicrud`, usando Composer:

```
composer create-project laravel/laravel apicrud

```

Esto inicializa el proyecto con Laravel 11, que no incluye la API por defecto, así que necesitamos instalarla.

### 2. Instalar API en Laravel 11

Ejecutamos el siguiente comando en la terminal para instalar la funcionalidad de API en Laravel 11:

```
php artisan install:api

```

Una vez hecho esto, vamos al archivo `User.php` y agregamos lo siguiente para habilitar el uso de tokens de API con Sanctum:

```
use Laravel\Sanctum\HasApiTokens;

```

---

### 3. Configurar la Base de Datos

En este ejemplo, vamos a usar SQLite para la base de datos, en vez de MySQL. Editamos el archivo `.env` y cambiamos la configuración de la base de datos:

```
DB_CONNECTION=sqlite
#DB_HOST=127.0.0.1
#DB_PORT=3306
#DB_DATABASE=laravel
#DB_USERNAME=root
#DB_PASSWORD=

```

---

### 4. Crear el Modelo y Migración

Creamos el modelo `Note` junto con su migración para la tabla de notas:

```
php artisan make:model Note --migration

```

Esto genera el archivo de migración `create_notes_table.php`. Editamos la migración para definir los campos de nuestra tabla `notes`:

```
public function up(): void
{
    Schema::create('notes', function (Blueprint $table) {
        $table->id();
        $table->string('title', 255); // Campo para el título
        $table->string('content', 255)->nullable(); // Campo para el contenido
        $table->timestamps();
    });
}

```

Ejecutamos la migración con:

```
php artisan migrate

```

---

### 5. Definir las Rutas de la API

Laravel define las rutas en el archivo `routes/api.php`. Usamos el método `resource` para definir las rutas RESTful automáticamente, ahorrándonos mucho trabajo:

```
use App\Http\Controllers\NoteController;

Route::resource('note', NoteController::class);

```

Esto crea las rutas necesarias para un CRUD completo (index, store, show, update, destroy).

---

### 6. Crear el Controlador

Creamos el controlador `NoteController` con la opción `--resource` para generar automáticamente las funciones del CRUD:

```
php artisan make:controller NoteController --resource

```

El controlador se ve más o menos así:

```
class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return response()->json($notes, 200);
    }

    public function store(NoteRequest $request)
    {
        Note::create($request->all());
        return response()->json(['success' => true], 201);
    }

    public function show(string $id)
    {
        $note = Note::find($id);
        return response()->json($note, 200);
    }

    public function update(NoteRequest $request, string $id)
    {
        $note = Note::find($id);
        $note->update($request->all());
        return response()->json(['success' => true], 204);
    }

    public function destroy(string $id)
    {
        $note = Note::find($id);
        $note->delete();
        return response()->json(['success' => true], 200);
    }
}

```

---

### 7. Validaciones

Creé una clase de solicitud personalizada `NoteRequest` para validar los datos de la nota:

```
php artisan make:request NoteRequest

```

En el archivo `NoteRequest.php`, definimos las reglas de validación para el título y el contenido:

```
public function rules(): array
{
    return [
        'title' => 'required|max:255|min:3',
        'content' => 'nullable|max:255|min:3',
    ];
}

```

---

### 8. Probar la API

Usé ThunderClient en VSCode para probar las rutas. Configuré las peticiones para hacer pruebas de creación, lectura, actualización y eliminación.

#### Ejemplo de creación (POST):

```
{
    "title": "Hello World",
    "content": "Lorem Ipsum"
}

```

#### Ejemplo de actualización (PUT):

```
{
    "title": "Updated Title",
    "content": "Updated content"
}

```

---

### 9. Mejoras con API Resources

Para personalizar la respuesta de la API, creé un `NoteResource`. Esto me permitió modificar la respuesta y agregar datos adicionales:

```
php artisan make:resource NoteResource

```

Modifiqué la clase `NoteResource` para devolver campos personalizados, como `example`:

```
class NoteResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => 'Title: ' . $this->title,
            'content' => $this->content,
            'example' => 'This is an example'
        ];
    }
}

```

Luego, modifiqué el controlador para usar este recurso:

```
public function index(): JsonResource
{
    return NoteResource::collection(Note::all());
}

public function store(NoteRequest $request): JsonResponse
{
    $note = Note::create($request->all());
    return response()->json(['success' => true, 'data' => new NoteResource($note)], 201);
}

```

---

### 10. Protecciones y Campos Ocultos

Para ocultar campos como `created_at` y `updated_at`, simplemente los definimos como `hidden` en el modelo `Note`:

```
protected $hidden = ['created_at', 'updated_at'];

```

---

### Conclusiones

Con todo esto, hemos creado una API CRUD funcional en Laravel. La API está lista para gestionar notas, con validaciones, autenticación opcional y un formato de respuesta personalizado utilizando recursos.

Recuerda que con ThunderClient puedes hacer todas las pruebas y ver cómo interactúan las diferentes rutas de la API. Además, la integración con Sanctum te permite proteger tus rutas en caso de que quieras añadir autenticación.
