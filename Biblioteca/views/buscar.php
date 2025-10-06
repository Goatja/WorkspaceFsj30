<?php

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}

$libros = isset($_SESSION['libros']) ? $_SESSION['libros'] : [];
$autores = isset($_SESSION['autores']) ? $_SESSION['autores'] : [];
$categorias = isset($_SESSION['categorias']) ? $_SESSION['categorias'] : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search = $_POST['search'];
    $search_by = $_POST['search_by'];

    $libros_filtrados = [];
    foreach ($libros as $libro) {
        $autor_nombre = '';
        foreach ($autores as $autor) {
            if ($autor['id'] == $libro['autor_id']) {
                $autor_nombre = $autor['nombre'];
                break;
            }
        }

        $categoria_nombre = '';
        foreach ($categorias as $categoria) {
            if ($categoria['id'] == $libro['categoria_id']) {
                $categoria_nombre = $categoria['nombre'];
                break;
            }
        }

        if ($search_by === 'all' && (stripos($libro['titulo'], $search) !== false || stripos($autor_nombre, $search) !== false || stripos($categoria_nombre, $search) !== false)) {
            $libros_filtrados[] = $libro;
        } else if ($search_by === 'titulo' && stripos($libro['titulo'], $search) !== false) {
            $libros_filtrados[] = $libro;
        } else if ($search_by === 'autor' && stripos($autor_nombre, $search) !== false) {
            $libros_filtrados[] = $libro;
        } else if ($search_by === 'categoria' && stripos($categoria_nombre, $search) !== false) {
            $libros_filtrados[] = $libro;
        }
    }
    $libros = $libros_filtrados;
}

?>

<!DOCTYPE html>
<html lang="es-SV">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    <title>Buscar Libros</title>
</head>
<body>

<header>
    <?php require_once __DIR__ . '/../components/navbar.php'; ?> 
</header>

<main class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <h1 class="text-2xl font-bold mb-4">Buscar Libros</h1>

        <form method="POST" action="/buscar" class="mb-4">
            <div class="flex">
                <label for="search_by" class="sr-only">Search by</label>
                <select id="search_by" name="search_by" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                    <option value="all" selected>Todos</option>
                    <option value="titulo">Título</option>
                    <option value="autor">Autor</option>
                    <option value="categoria">Categoría</option>
                </select>
                <div class="relative w-full">
                    <input type="search" id="search" name="search" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Buscar...">
                    <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Título
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Autor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Categoría
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($libros as $libro) : ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $libro['titulo']; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?php 
                                    $autor_nombre = '';
                                    foreach ($autores as $autor) {
                                        if ($autor['id'] == $libro['autor_id']) {
                                            $autor_nombre = $autor['nombre'];
                                            break;
                                        }
                                    }
                                    echo $autor_nombre;
                                ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php 
                                    $categoria_nombre = '';
                                    foreach ($categorias as $categoria) {
                                        if ($categoria['id'] == $libro['categoria_id']) {
                                            $categoria_nombre = $categoria['nombre'];
                                            break;
                                        }
                                    }
                                    echo $categoria_nombre;
                                ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $libro['estado']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php if ($libro['estado'] === 'disponible') : ?>
                                    <a href="/prestar?id=<?php echo $libro['id']; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Prestar</a>
                                <?php else : ?>
                                    <a href="/devolver?id=<?php echo $libro['id']; ?>" class="font-medium text-green-600 dark:text-green-500 hover:underline">Devolver</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>