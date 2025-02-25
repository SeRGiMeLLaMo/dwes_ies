# Migraciones y Modelos en Laravel


## Comandos de Artisan Migrate en Laravel

En Laravel, el sistema de migraciones permite gestionar la estructura de la base de datos mediante comandos de Artisan. A continuación, se listan los comandos más utilizados, junto con una breve explicación de cada uno.

---

### Comandos Básicos

#### 1. **Ejecutar Migraciones**

Ejecuta todas las migraciones pendientes en la base de datos configurada.

```bash
php artisan migrate
```

- **Ejemplo de salida:**
  ```
  INFO Running migrations.
  2025_01_14_000001_create_users_table ......................................... DONE
  ```

#### 2. **Crear una Nueva Migración**

Genera un archivo de migración en el directorio `database/migrations`.

```bash
php artisan make:migration nombre_de_la_migracion
```

- **Opción común:**

  - `--create=nombre_tabla`: Añade automáticamente la estructura para crear una nueva tabla.

  ```bash
  php artisan make:migration create_users_table --create=users
  ```

  - `--table=nombre_tabla`: Define que la migración es para modificar una tabla existente.

  ```bash
  php artisan make:migration add_email_to_users_table --table=users
  ```

---

### Rollbacks y Modificaciones

#### 3. **Deshacer la Última Migración Ejecutada (Rollback)**

Revierte la última migración ejecutada.

```bash
php artisan migrate:rollback
```

- **Ejemplo de salida:**
  ```
  INFO Rolling back migrations.
  2025_01_14_000001_create_users_table ......................................... DONE
  ```

#### 4. **Resetear Migraciones**

Elimina todas las tablas generadas por las migraciones, dejando la base de datos vacía.

```bash
php artisan migrate:reset
```

#### 5. **Refrescar Migraciones**

Realiza un `reset` y luego vuelve a ejecutar todas las migraciones.

```bash
php artisan migrate:refresh
```

- **Opción común:**
  - `--seed`: También ejecuta los seeders después de refrescar las migraciones.

  ```bash
  php artisan migrate:refresh --seed
  ```

#### 6. **Rollback por Lote**

Permite revertir migraciones específicas mediante el número de lote.

```bash
php artisan migrate:rollback --batch=numero_lote
```

---

### Otros Comandos

#### 7. **Ver el Estado de las Migraciones**

Muestra una lista de todas las migraciones y su estado (pendiente o ejecutada).

```bash
php artisan migrate:status
```

- **Ejemplo de salida:**
  ```
  +------+---------------------------------------------------+-------+
  | Ran? | Migration                                         | Batch |
  +------+---------------------------------------------------+-------+
  | Yes  | 2025_01_14_000001_create_users_table             | 1     |
  | No   | 2025_01_14_000002_add_email_to_users_table       |       |
  +------+---------------------------------------------------+-------+
  ```

#### 8. **Borrar Tablas y Volver a Migrar**

Este comando elimina y recrea todas las tablas en un solo paso.

```bash
php artisan migrate:fresh
```

- **Opción común:**
  - `--seed`: También ejecuta los seeders después de recrear las tablas.

  ```bash
  php artisan migrate:fresh --seed
  ```

#### 9. **Migrar una Específica**

Ejecuta una migración específica, indicada por su nombre.

```bash
php artisan migrate --path=/database/migrations/nombre_de_migracion.php
```

---

### Notas Importantes

- **Convención de nombres:**
  - Las migraciones deben seguir una convención de nombres para ser fácilmente reconocibles, como `create_users_table` o `add_email_to_users_table`.
- **Directorio de migraciones:** Todos los archivos de migración se ubican en `database/migrations`.
- **Rollback seguro:** Es preferible usar `rollback` en lugar de modificar las tablas directamente en la base de datos.

---

Esta lista cubre los comandos más importantes relacionados con migraciones en Laravel. Utiliza estas herramientas para mantener una base de datos bien gestionada y sincronizada con el código de tu aplicación.
