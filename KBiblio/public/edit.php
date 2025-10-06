<?php

use KBiblio\Biblioteca;
use KBiblio\Libro;
use KBiblio\Language;

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

// Language switching logic
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
    $current_url = strtok($_SERVER["REQUEST_URI"], '?');
    header('Location: ' . $current_url . '?titulo=' . urlencode($_GET['titulo']));
    exit();
}

$lang = $_SESSION['lang'] ?? 'en';
$language = new Language($lang);
$t = function($key) use ($language) {
    return $language->get($key);
};

if (!isset($_SESSION['biblioteca'])) {
    header('Location: /');
    exit();
}

$biblioteca = $_SESSION['biblioteca'];
$libro_a_editar = null;

if (isset($_GET['titulo'])) {
    $resultados = $biblioteca->buscarPorTitulo($_GET['titulo']);
    if (!empty($resultados)) {
        $libro_a_editar = $resultados[0];
    }
}

if ($libro_a_editar === null) {
    header('Location: /');
    exit();
}

if (isset($_POST['titulo']) && isset($_POST['autor']) && isset($_POST['categoria'])) {
    $biblioteca->eliminarLibroPorTitulo($_GET['titulo']);
    $biblioteca->agregarLibro(new Libro($_POST['titulo'], $_POST['autor'], $_POST['categoria']));
    header('Location: /');
    exit();
}

?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $t('edit'); ?>: <?php echo htmlspecialchars($libro_a_editar->titulo); ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/118/118955.png">
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        <nav class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 rounded-lg p-4 mb-6 flex justify-between items-center">
            <h1 class="text-2xl font-bold"><?php echo $t('kbiblio'); ?></h1>
            <div class="flex items-center">
                <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.121-3.536a1 1 0 010 1.414l-.707.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM4.95 6.364a1 1 0 00-1.414 1.414l.707.707a1 1 0 001.414-1.414l-.707-.707zM1.414 10.5a1 1 0 010-1.414l.707-.707a1 1 0 111.414 1.414l-.707.707a1 1 0 01-1.414 0zM10 16a1 1 0 01-1-1v-1a1 1 0 112 0v1a1 1 0 01-1 1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                </button>
                
                <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
                    <?php echo strtoupper($lang); ?>
                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                        <li>
                            <a href="?lang=en&titulo=<?php echo urlencode($_GET['titulo']); ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">English</a>
                        </li>
                        <li>
                            <a href="?lang=es&titulo=<?php echo urlencode($_GET['titulo']); ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Español</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 max-w-lg mx-auto transition-all duration-300">
            <h2 class="text-xl font-bold mb-4"><?php echo $t('edit'); ?>: <?php echo htmlspecialchars($libro_a_editar->titulo); ?></h2>
            <form action="/edit.php?titulo=<?php echo urlencode($libro_a_editar->titulo); ?>" method="post" class="space-y-4">
                <div>
                    <label for="titulo" class="block mb-2 text-sm font-medium"><?php echo $t('title'); ?></label>
                    <input type="text" name="titulo" id="titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" value="<?php echo htmlspecialchars($libro_a_editar->titulo); ?>" required>
                </div>
                <div>
                    <label for="autor" class="block mb-2 text-sm font-medium"><?php echo $t('author'); ?></label>
                    <input type="text" name="autor" id="autor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" value="<?php echo htmlspecialchars($libro_a_editar->autor); ?>" required>
                </div>
                <div>
                    <label for="categoria" class="block mb-2 text-sm font-medium"><?php echo $t('category'); ?></label>
                    <input type="text" name="categoria" id="categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" value="<?php echo htmlspecialchars($libro_a_editar->categoria); ?>" required>
                </div>
                <div class="flex space-x-2">
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all duration-300 transform hover:scale-105">Update Book</button>
                    <a href="/" class="w-full text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 transition-all duration-300">Cancel</a>
                </div>
            </form>
        </div>

        <footer class="mt-6 text-center text-gray-500 dark:text-gray-400 text-sm">
            <p>© 2025 <?php echo $t('kbiblio'); ?></p>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

            // if NOT set via local storage previously
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
</body>
</html>