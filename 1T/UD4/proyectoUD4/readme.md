Encuestas: 
id, pregunta, respuesta_a, respuesta_b

Clases y Archivos

    1. models/Encuestas.php
    Esta clase se encarga de la interacción con la base de datos. Aquí se definen los métodos para realizar las operaciones CRUD sobre la tabla encuestas.

        Métodos:
            __construct($pdo): Constructor que recibe la conexión PDO para interactuar con la base de datos.

            getAll(): Obtiene todas las encuestas de la base de datos.

            crear($pregunta, $respuesta_a, $respuesta_b): Inserta una nueva encuesta en la base de datos.

            editar($id, $pregunta, $respuesta_a, $respuesta_b): Actualiza una encuesta existente.

            eliminar($id): Elimina una encuesta por su ID.

            getById($id): Recupera una encuesta específica por su ID.


    2. controllers/EncuestasController.php
    El controlador es el intermediario entre el modelo y la vista. Aquí se definen las acciones específicas que puede realizar el usuario.

    Atributos:

        $encuestasModel: Instancia de la clase Encuestas para acceder a sus métodos.

    Métodos:

        __construct($pdo): Constructor que inicializa el modelo Encuestas usando la conexión PDO.
        index(): Recupera todas las encuestas y carga la vista views/encuestas/index.php.
        crear(): Maneja la creación de una encuesta mediante un formulario (método POST).
        editar(): Maneja la edición de una encuesta (método POST).
        eliminar(): Maneja la eliminación de una encuesta (método POST).


    3. views/encuestas/index.php
    Esta vista se encarga de mostrar la interfaz de usuario para gestionar las encuestas. Contiene formularios para:

        Crear nuevas encuestas.
        Editar encuestas existentes.
        Eliminar encuestas.
        Además, muestra una tabla con todas las encuestas almacenadas en la base de datos.


    4. db.php
    Este archivo configura la conexión a la base de datos usando PDO. Si ocurre un error de conexión, lo captura y muestra un mensaje descriptivo.


    5. index.php
    Este archivo actúa como el punto de entrada principal de la aplicación.

        Incluye el controlador de encuestas.
        Analiza la acción (action) enviada por el usuario mediante el parámetro GET.
        Llama al método correspondiente del controlador dependiendo de la acción (crear, editar, eliminar, index).
        Flujo del Proyecto

    Inicio:

        El archivo index.php procesa la acción recibida mediante el parámetro GET (?action=).
        Por defecto, se llama a la acción index() para mostrar todas las encuestas.

        Controlador:

            El controlador (EncuestasController) maneja la lógica de cada acción.
            Utiliza el modelo (Encuestas) para interactuar con la base de datos y recuperar, insertar, actualizar o eliminar datos.

        Modelo:

            El modelo se conecta a la base de datos y realiza las operaciones solicitadas por el controlador.

        Vista:

            La vista muestra los datos devueltos por el modelo y permite al usuario interactuar con la aplicación (por ejemplo, rellenar formularios).