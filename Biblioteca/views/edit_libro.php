<?php

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $autor_id = $_POST['autor_id'];
    $categoria_id = $_POST['categoria_id'];
    $estado = $_POST['estado'];

    foreach ($_SESSION['libros'] as &$libro) {
        if ($libro['id'] == $id) {
            $libro['titulo'] = $titulo;
            $libro['autor_id'] = $autor_id;
            $libro['categoria_id'] = $categoria_id;
            $libro['estado'] = $estado;
            break;
        }
    }

    header('Location: /libros');
    exit();
}

$libro_to_edit = null;
foreach ($_SESSION['libros'] as $libro) {
    if ($libro['id'] == $id) {
        $libro_to_edit = $libro;
        break;
    }
}

$autores = isset($_SESSION['autores']) ? $_SESSION['autores'] : [];
$categorias = isset($_SESSION['categorias']) ? $_SESSION['categorias'] : [];

?>

<!DOCTYPE html>
<html lang="es-SV">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    <title>Editar Libro</title>
</head>
<body>

<header>
    <?php require_once __DIR__ . '/../components/navbar.php'; ?> 
</header>

<main class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <h1 class="text-2xl font-bold mb-4">Editar Libro</h1>

        <form method="POST" action="/edit_libro?id=<?php echo $id; ?>" class="mb-4">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título</label>
                    <input type="text" id="titulo" name="titulo" value="<?php echo $libro_to_edit['titulo']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="El Quijote" required>
                </div>
                <div>
                    <label for="autor_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Autor</label>
                    <select id="autor_id" name="autor_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <?php foreach ($autores as $autor) : ?>
                            <option value="<?php echo $autor['id']; ?>" <?php if ($autor['id'] == $libro_to_edit['autor_id']) echo 'selected'; ?>><?php echo $autor['nombre']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="categoria_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
                    <select id="categoria_id" name="categoria_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <?php foreach ($categorias as $categoria) : ?>
                            <option value="<?php echo $categoria['id']; ?>" <?php if ($categoria['id'] == $libro_to_edit['categoria_id']) echo 'selected'; ?>><?php echo $categoria['nombre']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                    <select id="estado" name="estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="disponible" <?php if ($libro_to_edit['estado'] == 'disponible') echo 'selected'; ?>>Disponible</option>
                        <option value="prestado" <?php if ($libro_to_edit['estado'] == 'prestado') echo 'selected'; ?>>Prestado</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar Cambios</button>
        </form>

    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>