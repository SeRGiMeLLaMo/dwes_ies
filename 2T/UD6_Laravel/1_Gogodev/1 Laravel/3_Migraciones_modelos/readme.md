# 3_Migraciones y Modelos

En este episodio, nos metemos de lleno en  **migraciones y modelos en Laravel** . Básicamente, vamos a trabajar con la base de datos de una manera limpia y organizada, sin tener que tocar directamente las tablas.

## **Configuración de la Capa de Persistencia**

### Creando el Proyecto

Primero, arrancamos con un nuevo proyecto llamado `modeldata`:

```
laravel new modeldata
```

Elegimos la opción **none** para no usar un starter kit.

### Configuración de la Base de Datos

Laravel usa **Eloquent** como ORM para manejar la base de datos. Debemos decirle a Laravel qué sistema de base de datos usaremos. En el `.env`, configuramos **SQLite** (en el video usan MySQL).

Podemos ver más detalles en `/Config/database.php`, pero en general, si no queremos cambiar algo raro, ahí no hay que tocar nada.

### Corremos las Migraciones Iniciales

```
php artisan migrate
```

Esto crea todas las tablas por defecto en nuestra base de datos. Si intentamos ejecutarlo de nuevo, Laravel nos dirá:

```
INFO Nothing to migrate.
```

✅ Con esto ya tenemos la estructura de las tablas configurada.

---

## **Migraciones**

### Crear una Nueva Migración

```
php artisan make:migration create_notes_table
```

Esto genera un archivo en `database/migrations/` con el nombre de la migración.

El archivo contiene una **clase** que extiende `Migration`, con dos métodos clave:

* **`up`** → Define la estructura de la tabla.
* **`down`** → Borra la tabla si hacemos rollback.

### Estructura de la Migración

```
Schema::create('notes', function (Blueprint $table) {
    $table->id();
    $table->string('description', 255)->nullable();
    $table->boolean('done')->default(false);
    $table->timestamps();
});
```

Después de definir la estructura, volvemos a migrar para aplicar cambios:

```
php artisan migrate
```

Nomenclatura de Tablas

* Tablas en plural y en minúsculas (`notes` y no `note`).
* Modelos en singular y con PascalCase (`Note`).

## **Rollback: ¿Y si nos equivocamos?**

Si cometemos un error en la migración, **NO** editamos la base de datos manualmente. Lo correcto es hacer un rollback.

### Opción 1: Rollback de la Última Migración

```
php artisan migrate:rollback
```

### Opción 2: Rollback Total

```
php artisan migrate:reset
```

### Opción 3: Eliminar y Reaplicar Todo

```
php artisan migrate:refresh
```



---



Si queremos modificar una tabla sin perder datos,  **creamos una nueva migración de actualización** :

```
php artisan make:migration update_notes_table
```


En lugar de `Schema::create`, usamos `Schema::table` para modificar una tabla existente.

```
Schema::table('notes', function (Blueprint $table) {
    $table->string('author');
    $table->dropColumn(['deadline']);
});
```


---



## **Modelos en Laravel**

Aquí es donde Laravel hace su magia:  **trabajamos con clases en lugar de tocar directamente la base de datos** .

Crear un Modelo

```
php artisan make:model Note
```

Esto crea el archivo `app/Models/Note.php`, donde definimos la estructura del modelo.

```
class Note extends Model
{
    protected $table = 'notes'; // Si el nombre no sigue la convención, lo especificamos aquí.

    protected $fillable = ['description', 'done', 'author']; // Campos permitidos
    protected $guarded = ['id']; // Campos protegidos (opcional)
    protected $casts = ['done' => 'boolean']; // Convertir datos al tipo correcto
}
```

Si la tabla no sigue la convención de nombres , la vinculamos manualmente:

```
protected $table = 'notas';
```


## **Atajos para Crear Modelos y Migraciones**

Para hacer **modelo + migración** en un solo paso:

```
php artisan make:model Author --migration

```

Para crear **modelo, migración, factory y más** en un solo comando:

```
php artisan make:model Flight -mfsc

```

Si queremos **crear todo de una vez** (modelo, migración, factory, seeder, policy, controller, requests):

```
php artisan make:model Flight --all
```

## **Conclusión**

✅ **Migraciones** → Definen la estructura de la base de datos sin tocarla directamente.
✅ **Modelos** → Permiten interactuar con la base de datos usando código limpio y POO.
✅ **Eloquent ORM** → Hace que trabajar con la base de datos sea más fácil y automático.
✅ **Laravel es** → Nos da herramientas para hacer todo de forma organizada y sin estrés.
