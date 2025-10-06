<?php

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];

    foreach ($_SESSION['categorias'] as &$categoria) {
        if ($categoria['id'] == $id) {
            $categoria['nombre'] = $nombre;
            break;
        }
    }

    header('Location: /categorias');
    exit();
}

$categoria_to_edit = null;
foreach ($_SESSION['categorias'] as $categoria) {
    if ($categoria['id'] == $id) {
        $categoria_to_edit = $categoria;
        break;
    }
}

?>

<!DOCTYPE html>
<html lang="es-SV">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    <title>Editar Categoría</title>
</head>
<body>

<header>
    <?php require_once __DIR__ . '/../components/navbar.php'; ?> 
</header>

<main class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <h1 class="text-2xl font-bold mb-4">Editar Categoría</h1>

        <form method="POST" action="/edit_categoria?id=<?php echo $id; ?>" class="mb-4">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $categoria_to_edit['nombre']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ficción" required>
                </div>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar Cambios</button>
        </form>

    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>