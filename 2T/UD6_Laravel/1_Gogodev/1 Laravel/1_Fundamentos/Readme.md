# 1.Fundamentos

# Introducción a Laravel

Laravel es un framework de PHP que sigue el patrón MVC (Modelo-Vista-Controlador) por defecto. Nos facilita el desarrollo de aplicaciones web organizando nuestro código y simplificando tareas comunes.

---

## Configuración del entorno de trabajo

Para trabajar con Laravel, necesitamos configurar nuestro entorno de desarrollo. Hay varias formas de hacerlo:

### Opción 1: Usar Composer

Si tienes Composer instalado, puedes crear un nuevo proyecto con:

```
composer create-project laravel/laravel miproyecto
```

> ⚠️ Error común: Composer debe estar en el PATH del sistema.

### Opción 2: Instalador de Laravel

Podemos instalar Laravel globalmente con:

```
composer global require laravel/installer
```

Luego, creamos un proyecto con:

```
laravel new helloworld
```

### Opción 3: Usar Laravel Herd

Si tienes Laravel Herd instalado, puedes crear un nuevo sitio fácilmente desde la interfaz gráfica.

---

## Patrón MVC en Laravel

Cuando accedemos a una URL en Laravel, se sigue este flujo:

1. **Rutas**: Laravel busca la ruta en `<span>routes/web.php</span>` o `<span>routes/api.php</span>`.
2. **Controlador**: Se encarga de procesar la petición.
3. **Modelo**: Representa la base de datos y se comunica con el controlador.
4. **Vista**: Devuelve la respuesta al usuario, normalmente con Blade.

Dos enfoques posibles:

* **Controladores más grandes y modelos más simples**
* **Modelos más grandes con controladores ligeros**

---

## Creación de Proyecto

Creamos el proyecto en una carpeta específica:

```
composer create-project laravel/laravel:^10.0 helloworld10
```

Si usamos Laravel Herd:

1. Click en "Add Site"
2. Seleccionamos la carpeta
3. Laravel se encargará del resto

Luego, accedemos al proyecto:

```
cd helloworld
npm install && npm run build
composer run dev
```

> ⚠️ Si aparece un error de seguridad en Windows con npm, hay que habilitar la ejecución de scripts.

Para iniciar Laravel:

```
php artisan serve
```

---

## Estructura del Proyecto

Al entrar en un proyecto de Laravel, estas son las carpetas más importantes:

* `<span><strong>.env</strong></span>`: Configuración del entorno (base de datos, API keys, etc.).
* `<span><strong>routes/</strong></span>`: Aquí definimos nuestras rutas:
  * `<span>web.php</span>`: Para páginas con vistas HTML.
  * `<span>api.php</span>`: Para API REST.
  * `<span>console.php</span>`: Para comandos personalizados.
* `<span><strong>resources/views/</strong></span>`: Vistas de Blade (HTML con PHP).
* `<span><strong>app/Models/</strong></span>`: Modelos para interactuar con la base de datos.
* `<span><strong>app/Http/Controllers/</strong></span>`: Controladores.
* `<span><strong>database/migrations/</strong></span>`: Esquema de la base de datos.
* `<span><strong>public/</strong></span>`: Punto de acceso al sistema (index.php).
* `<span><strong>storage/</strong></span>`: Archivos subidos, logs, caché, etc.
* `<span><strong>config/</strong></span>`: Archivos de configuración del sistema.
* `<span><strong>tests/</strong></span>`: Pruebas unitarias y de características.

---

## Creando una API REST en Laravel 11

Antes, Laravel incluía la configuración API por defecto. Ahora debemos instalarla manualmente:

```
php artisan install:api
```

Esto configura todo lo necesario y habilita Laravel Sanctum para autenticación.

---

## Creando una Vista Personalizada

Vamos a modificar la vista inicial:

1. Editamos `<span>routes/web.php</span>` y cambiamos la ruta inicial:

```
Route::view('/', 'landing.about')->name('about');
```

2. Creamos `<span>resources/views/landing/about.blade.php</span>` con:

```
<!DOCTYPE html>
<html>
<head><title>About</title></head>
<body>
<h1>About</h1>
</body>
</html>
```

Ahora, al visitar `<span>/</span>`, veremos nuestra nueva página.

Si queremos más rutas:

```
Route::view('/', 'landing.index')->name('index');
Route::view('/about', 'landing.about')->name('about');
```

---

## Conclusión

Hemos visto cómo instalar Laravel, su estructura básica y cómo manejar rutas y vistas. Lo importante ahora es practicar y entender bien el flujo de trabajo antes de meternos con cosas más avanzadas como autenticación, middleware o bases de datos complejas.
