<?php

// Este archivo es el punto de entrada principal de nuestra aplicación de biblioteca.
// Aquí es donde todo comienza: se configura el idioma, se manejan las acciones
// de los usuarios (como agregar, buscar o eliminar libros) y se muestra la interfaz.

// Incluimos las clases necesarias para que el programa funcione.
use KBiblio\Biblioteca; // La clase que maneja nuestra colección de libros.
use KBiblio\Libro;      // La clase que representa un solo libro.
use KBiblio\Language;   // La clase para manejar los diferentes idiomas de la interfaz.

// Cargamos automáticamente todas las clases que necesitamos.
require_once __DIR__ . '/../vendor/autoload.php';

session_start();

// --- Lógica para cambiar el idioma de la página ---
// Si el usuario ha seleccionado un nuevo idioma (por ejemplo, haciendo clic en "Español"),
// guardamos su elección y recargamos la página para aplicar el cambio.
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
    header('Location: /'); // Redirigimos para limpiar la URL y evitar problemas.
    exit(); // Terminamos la ejecución del script.
}

// Obtenemos el idioma actual de la sesión o usamos 'en' (inglés) por defecto.
$lang = $_SESSION['lang'] ?? 'en';
// Creamos un objeto Language para obtener las traducciones.
$language = new Language($lang);
// Creamos una función corta 't' para facilitar el uso de las traducciones en el HTML.
$t = function($key) use ($language) {
    return $language->get($key);
};

// --- Lógica para reiniciar la biblioteca ---
// Si el usuario presiona el botón de "Reiniciar Biblioteca",
// borramos todos los libros y la configuración de la sesión.
if (isset($_POST['reset'])) {
    session_unset();   // Borra todas las variables de sesión.
    session_destroy(); // Destruye la sesión actual.
    header('Location: /'); // Redirigimos a la página principal.
    exit(); // Terminamos la ejecución.
}

// --- Inicialización de la biblioteca ---
// Si no hay una biblioteca guardada en la sesión (por ejemplo, es la primera vez que visita la página),
// creamos una nueva y le agregamos algunos libros de ejemplo.
if (!isset($_SESSION['biblioteca'])) {
    $biblioteca = new Biblioteca();
    // Agregamos algunos libros de muestra para que la biblioteca no esté vacía al inicio.
    $biblioteca->agregarLibro(new Libro("El Señor de los Anillos", "J.R.R. Tolkien", "Fantasía"));
    $biblioteca->agregarLibro(new Libro("Orgullo y Prejuicio", "Jane Austen", "Romance"));
    $biblioteca->agregarLibro(new Libro("El Hobbit", "J.R.R. Tolkien", "Fantasía"));
    $biblioteca->agregarLibro(new Libro("Matar a un Ruiseñor", "Harper Lee", "Ficción"));
    $biblioteca->agregarLibro(new Libro("1984", "George Orwell", "Distopía"));
    // Guardamos la biblioteca en la sesión para que los cambios persistan.
    $_SESSION['biblioteca'] = $biblioteca;
}

// Recuperamos la biblioteca de la sesión para trabajar con ella.
$biblioteca = $_SESSION['biblioteca'];

// --- Lógica para agregar un nuevo libro ---
// Si el usuario ha enviado el formulario para agregar un libro,
// creamos un nuevo objeto Libro y lo añadimos a la biblioteca.
if (isset($_POST['titulo']) && isset($_POST['autor']) && isset($_POST['categoria'])) {
    $biblioteca->agregarLibro(new Libro($_POST['titulo'], $_POST['autor'], $_POST['categoria']));
}

// --- Lógica para eliminar un libro ---
// Si el usuario ha hecho clic en "Eliminar" junto a un libro,
// lo quitamos de la biblioteca usando su título.
if (isset($_GET['delete'])) {
    $biblioteca->eliminarLibroPorTitulo($_GET['delete']);
    header('Location: /'); // Redirigimos para actualizar la lista.
    exit(); // Terminamos la ejecución.
}

// --- Lógica de búsqueda de libros ---
$resultados = []; // Aquí guardaremos los libros que coincidan con la búsqueda.
// Verificamos si el usuario ha realizado una búsqueda.
if (isset($_GET['search_by']) && isset($_GET['query'])) {
    $search_by = $_GET['search_by']; // El tipo de búsqueda (título, autor, categoría, otro).
    $query = $_GET['query'];         // El texto que el usuario quiere buscar.

    // Dependiendo del tipo de búsqueda seleccionado, llamamos al método adecuado de la biblioteca.
    if ($search_by == 'q') {
        $resultados = $biblioteca->buscarPorTitulo($query);
    } elseif ($search_by == 'author') {
        $resultados = $biblioteca->buscarPorAutor($query);
    } elseif ($search_by == 'category') {
        $resultados = $biblioteca->buscarPorCategoria($query);
    } elseif ($search_by == 'other') { // Nueva condición para 'otro'
        $resultados = $biblioteca->buscarPorOtro($query);
    }
} else {
    // Si no hay búsqueda, mostramos todos los libros de la biblioteca.
    $resultados = $biblioteca->obtenerTodosLosLibros();
}

?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $t('kbiblio'); ?></title> <!-- Título de la página, se traduce automáticamente. -->
    <!-- Incluimos los estilos de Flowbite para un diseño moderno y responsivo. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <!-- Incluimos Tailwind CSS para estilos adicionales. -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Nuestros propios estilos personalizados. -->
    <link rel="stylesheet" href="css/styles.css">
    <!-- Icono de la pestaña del navegador. -->
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/118/118955.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.158.0/three.min.js"></script>
    <script>
        // Este script se encarga de aplicar el tema oscuro o claro
        // basándose en la configuración del usuario o del sistema.
        // Esto evita un "flash" de contenido sin estilo al cargar la página.
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <canvas id="three-canvas"></canvas>
    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        <!-- Barra de navegación superior -->
        <nav class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 rounded-lg p-4 mb-6 flex justify-between items-center">
            <!-- Título principal de la aplicación -->
            <h1 class="text-2xl font-bold"><?php echo $t('kbiblio'); ?></h1>
            <div class="flex items-center">
                <!-- Botón para cambiar entre tema claro y oscuro -->
                <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                    <!-- Iconos para el tema oscuro y claro -->
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.121-3.536a1 1 0 010 1.414l-.707.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM4.95 6.364a1 1 0 00-1.414 1.414l.707.707a1 1 0 001.414-1.414l-.707-.707zM1.414 10.5a1 1 0 010-1.414l.707-.707a1 1 0 111.414 1.414l-.707.707a1 1 0 01-1.414 0zM10 16a1 1 0 01-1-1v-1a1 1 0 112 0v1a1 1 0 01-1 1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                </button>
                
                <!-- Botón para seleccionar el idioma -->
                <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
                    <?php echo strtoupper($lang); ?> <!-- Muestra el idioma actual (EN o ES) -->
                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <!-- Menú desplegable de idiomas -->
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                        <li>
                            <a href="/?lang=en" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">English</a>
                        </li>
                        <li>
                            <a href="/?lang=es" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Español</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <!-- Contenido principal: formulario para añadir libros y lista de libros -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Sección para añadir nuevos libros -->
            <div class="md:col-span-1">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 transition-all duration-300">
                    <h2 class="text-xl font-bold mb-4"><?php echo $t('add_new_book'); ?></h2>
                    <!-- Formulario para que el usuario ingrese los datos de un nuevo libro -->
                    <form action="/" method="post" class="space-y-4">
                        <div>
                            <label for="titulo" class="block mb-2 text-sm font-medium"><?php echo $t('title'); ?></label>
                            <input type="text" name="titulo" id="titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                        <div>
                            <label for="autor" class="block mb-2 text-sm font-medium"><?php echo $t('author'); ?></label>
                            <input type="text" name="autor" id="autor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                        <div>
                            <label for="categoria" class="block mb-2 text-sm font-medium"><?php echo $t('category'); ?></label>
                            <input type="text" name="categoria" id="categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all duration-300 transform hover:scale-105"><?php echo $t('add_book'); ?></button>
                    </form>
                </div>
            </div>
            <!-- Sección para mostrar la lista de libros y la barra de búsqueda -->
            <div class="md:col-span-2">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 transition-all duration-300">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold"><?php echo $t('books'); ?> <span class="text-sm font-medium text-gray-500 dark:text-gray-400"><?php echo $biblioteca->count(); ?></span></h2>
                        <div class="flex items-center space-x-2">
                            <!-- Formulario de búsqueda con un menú desplegable para elegir el tipo de búsqueda -->
                             <form action="/" method="get" class="flex items-center flex-grow">
                                <label for="search-dropdown" class="sr-only"><?php echo $t('search_by'); ?></label>
                                <button id="dropdown-button-search" data-dropdown-toggle="dropdown-search" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
                                    <?php
                                        // Muestra el tipo de búsqueda actual en el botón del desplegable.
                                        $current_search_by = $_GET['search_by'] ?? 'q';
                                        if ($current_search_by == 'q') echo $t('search_by_title');
                                        elseif ($current_search_by == 'author') echo $t('search_by_author');
                                        elseif ($current_search_by == 'category') echo $t('search_by_category');
                                        elseif ($current_search_by == 'other') echo $t('search_by_other');
                                        else echo $t('search_by_title'); // Por defecto, busca por título.
                                    ?>
                                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                                <!-- Menú desplegable con las opciones de búsqueda -->
                                <div id="dropdown-search" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button-search">
                                        <li>
                                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="event.preventDefault(); window.location.href = '/?search_by=q&query=' + encodeURIComponent(document.querySelector('input[name=\"query\"]').value); "><?php echo $t('search_by_title'); ?></button>
                                        </li>
                                        <li>
                                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="event.preventDefault(); window.location.href = '/?search_by=author&query=' + encodeURIComponent(document.querySelector('input[name=\"query\"]').value); "><?php echo $t('search_by_author'); ?></button>
                                        </li>
                                        <li>
                                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="event.preventDefault(); window.location.href = '/?search_by=category&query=' + encodeURIComponent(document.querySelector('input[name=\"query\"]').value); "><?php echo $t('search_by_category'); ?></button>
                                        </li>
                                        <li>
                                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="event.preventDefault(); window.location.href = '/?search_by=other&query=' + encodeURIComponent(document.querySelector('input[name=\"query\"]').value); "><?php echo $t('search_by_other'); ?></button>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Campo de texto para introducir la consulta de búsqueda -->
                                <div class="relative w-full">
                                    <input type="search" id="search-dropdown" name="query" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="<?php echo $t('search_placeholder'); ?>" value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>" required>
                                    <!-- Botón para enviar la búsqueda -->
                                    <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                        </svg>
                                        <span class="sr-only">Search</span>
                                    </button>
                                </div>
                                <!-- Campo oculto para enviar el tipo de búsqueda seleccionado -->
                                <input type="hidden" name="search_by" value="<?php echo $current_search_by; ?>">
                            </form>
                            <!-- Formulario para reiniciar la biblioteca -->
                            <form action="/" method="post">
                                <button type="submit" name="reset" value="1" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 transition-all duration-300 transform hover:scale-105"><?php echo $t('reset_library'); ?></button>
                            </form>
                            <!-- Enlace para limpiar la búsqueda y mostrar todos los libros -->
                             <a href="/" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 transition-all duration-300"><?php echo $t('clear_search'); ?></a>
                        </div>
                    </div>
                    <!-- Tabla para mostrar los libros -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3"><?php echo $t('title'); ?></th>
                                    <th scope="col" class="px-6 py-3"><?php echo $t('author'); ?></th>
                                    <th scope="col" class="px-6 py-3"><?php echo $t('category'); ?></th>
                                    <th scope="col" class="px-6 py-3"><?php echo $t('actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($resultados)): ?>
                                    <!-- Mensaje si no se encuentran libros -->
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td colspan="4" class="px-6 py-4 text-center"><?php echo $t('no_books_found'); ?></td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($resultados as $libro): ?>
                                        <!-- Fila para cada libro encontrado -->
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo htmlspecialchars($libro->titulo); ?></td>
                                            <td class="px-6 py-4"><a href="/?search_by=author&query=<?php echo urlencode($libro->autor); ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><?php echo htmlspecialchars($libro->autor); ?></a></td>
                                            <td class="px-6 py-4"><a href="/?search_by=category&query=<?php echo urlencode($libro->categoria); ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><?php echo htmlspecialchars($libro->categoria); ?></a></td>
                                            <td class="px-6 py-4 space-x-2">
                                                <!-- Enlaces para editar y eliminar el libro -->
                                                <a href="/edit.php?titulo=<?php echo urlencode($libro->titulo); ?>" class="font-medium text-yellow-400 dark:text-yellow-500 hover:underline"><?php echo $t('edit'); ?></a>
                                                <a href="/?delete=<?php echo urlencode($libro->titulo); ?>" class="font-medium text-red-600 dark:text-red-500 hover:underline"><?php echo $t('delete'); ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie de página -->
        <footer class="mt-6 text-center text-gray-500 dark:text-gray-400 text-sm">
            <p>© 2025 <?php echo $t('kbiblio'); ?></p> <!-- Año y nombre de la aplicación, traducido. -->
        </footer>
    </div>
    <!-- Script de Flowbite para funcionalidades interactivas (como los desplegables) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script>
        // Lógica para el botón de cambio de tema (claro/oscuro).
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Cambia los iconos del botón según el tema guardado o la preferencia del sistema.
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            // Alterna los iconos dentro del botón.
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // Si el tema ya estaba guardado en el almacenamiento local:
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'dark');
                }

            // Si el tema NO estaba guardado, lo establece según el estado actual.
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
            
        });
    </script>
    <script>
        // --- Three.js Animation (Visible but potentially distracting for "not good UX") ---
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ canvas: document.getElementById('three-canvas'), alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setClearColor(0x000000, 0); // Transparent background

        // Array to hold our animated objects
        const objects = [];

        // Function to create a random object
        function createRandomObject() {
            const geometries = [
                new THREE.BoxGeometry(1, 1, 1),
                new THREE.SphereGeometry(0.75, 32, 32),
                new THREE.TorusGeometry(0.5, 0.2, 16, 100)
            ];
            const randomGeometry = geometries[Math.floor(Math.random() * geometries.length)];

            const colors = [0xff0000, 0x00ff00, 0x0000ff, 0xffff00, 0x00ffff, 0xff00ff];
            const randomColor = colors[Math.floor(Math.random() * colors.length)];

            const material = new THREE.MeshBasicMaterial({ color: randomColor, wireframe: true });
            const object = new THREE.Mesh(randomGeometry, material);

            // Random position
            object.position.x = (Math.random() - 0.5) * 20;
            object.position.y = (Math.random() - 0.5) * 20;
            object.position.z = (Math.random() - 0.5) * 20;

            // Random scale
            const scale = Math.random() * 2 + 0.5;
            object.scale.set(scale, scale, scale);

            scene.add(object);
            objects.push(object);
        }

        // Create several random objects
        for (let i = 0; i < 20; i++) {
            createRandomObject();
        }

        camera.position.z = 15;

        // Animation loop
        function animate() {
            requestAnimationFrame(animate);

            objects.forEach(obj => {
                obj.rotation.x += Math.random() * 0.02 - 0.01; // Random slight rotation
                obj.rotation.y += Math.random() * 0.02 - 0.01;
                obj.position.x += Math.sin(Date.now() * 0.0001 + obj.id) * 0.01; // Subtle floating movement
                obj.position.y += Math.cos(Date.now() * 0.0001 + obj.id) * 0.01;
            });

            renderer.render(scene, camera);
        }
        animate();

        // Handle window resize
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });

        // Optional: Mouse interaction for more "visible" (and potentially annoying) UX
        document.addEventListener('mousemove', (event) => {
            const mouseX = (event.clientX / window.innerWidth) * 2 - 1;
            const mouseY = -(event.clientY / window.innerHeight) * 2 + 1;

            camera.position.x = mouseX * 5;
            camera.position.y = mouseY * 5;
            camera.lookAt(scene.position);
        });
    </script>
</body>
</html>