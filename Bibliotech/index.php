<?php
// Cargar las clases ANTES de iniciar la sesión
require_once 'clases/Libro.php';
require_once 'clases/Prestamo.php';
require_once 'clases/Biblioteca.php';

// Ahora que las clases están definidas, iniciar la sesión
session_start();

// Instanciar la biblioteca. El constructor y destructor se encargan de la sesión.
$biblioteca = new Biblioteca();

// --- Lógica para manejar acciones ---

// Manejar acciones POST (agregar, editar, prestar)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'agregar' && !empty($_POST['titulo']) && !empty($_POST['autor'])) {
        $biblioteca->agregarLibro($_POST['titulo'], $_POST['autor'], $_POST['categoria'] ?? 'Sin categoría');
    }

    if ($action === 'editar' && !empty($_POST['id']) && !empty($_POST['titulo']) && !empty($_POST['autor'])) {
        $biblioteca->editarLibro($_POST['id'], $_POST['titulo'], $_POST['autor'], $_POST['categoria'] ?? 'Sin categoría');
    }

    if ($action === 'prestar' && !empty($_POST['id']) && !empty($_POST['nombre_usuario'])) {
        $biblioteca->prestarLibro($_POST['id'], $_POST['nombre_usuario']);
    }
    
    header('Location: index.php');
    exit;
}

// Manejar acciones GET (eliminar, devolver)
$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? '';

if ($action === 'eliminar' && !empty($id)) {
    $biblioteca->eliminarLibro($id);
    header('Location: index.php');
    exit;
}

if ($action === 'devolver' && !empty($id)) {
    $biblioteca->devolverLibro($id);
    header('Location: index.php');
    exit;
}

// Obtener datos para mostrar
$termino_busqueda = $_GET['search'] ?? '';
$libros = $biblioteca->buscarLibros($termino_busqueda);
$prestamos = $biblioteca->getPrestamos();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotech</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900">

<div class="container mx-auto p-4 sm:p-6 lg:p-8">
    <header class="mb-8 text-center">
        <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white">Bibliotech</h1>
        <p class="text-lg text-gray-500 dark:text-gray-400">Gestión de Libros y Préstamos</p>
    </header>

    <!-- Controles: Búsqueda y Agregar -->
    <div class="flex flex-col sm:flex-row items-center justify-between mb-6 space-y-4 sm:space-y-0">
        <button data-modal-target="add-modal" data-modal-toggle="add-modal" class="w-full sm:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button">
            + Agregar Libro
        </button>
        <form method="GET" action="index.php" class="w-full sm:w-auto">
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/></svg>
                </div>
                <input type="search" name="search" id="default-search" class="block w-full p-2.5 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar por título, autor o categoría..." value="<?= htmlspecialchars($termino_busqueda) ?>" />
            </div>
        </form>
    </div>

    <!-- Tabla de Libros -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Título</th>
                    <th scope="col" class="px-6 py-3">Autor</th>
                    <th scope="col" class="px-6 py-3">Categoría</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($libros as $libro): ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= htmlspecialchars($libro->getTitulo()) ?></th>
                    <td class="px-6 py-4"><?= htmlspecialchars($libro->getAutor()) ?></td>
                    <td class="px-6 py-4"><?= htmlspecialchars($libro->getCategoria()) ?></td>
                    <td class="px-6 py-4">
                        <?php if ($libro->getEstado() == 'disponible'): ?>
                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Disponible</span>
                        <?php else: ?>
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Prestado</span>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4 text-center space-x-2 whitespace-nowrap">
                        <button type="button" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" data-modal-target="edit-modal" data-modal-toggle="edit-modal" data-id="<?= $libro->getId() ?>" data-titulo="<?= htmlspecialchars($libro->getTitulo()) ?>" data-autor="<?= htmlspecialchars($libro->getAutor()) ?>" data-categoria="<?= htmlspecialchars($libro->getCategoria()) ?>">Editar</button>
                        <?php if ($libro->getEstado() == 'disponible'): ?>
                            <button type="button" class="font-medium text-indigo-600 dark:text-indigo-500 hover:underline" data-modal-target="loan-modal" data-modal-toggle="loan-modal" data-id="<?= $libro->getId() ?>">Prestar</button>
                        <?php else: ?>
                            <a href="index.php?action=devolver&id=<?= $libro->getId() ?>" class="font-medium text-purple-600 dark:text-purple-500 hover:underline">Devolver</a>
                        <?php endif; ?>
                        <a href="index.php?action=eliminar&id=<?= $libro->getId() ?>" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="return confirm('¿Estás seguro de que quieres eliminar este libro?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Historial de Préstamos -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Historial de Transacciones</h2>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Libro</th>
                        <th scope="col" class="px-6 py-3">Usuario</th>
                        <th scope="col" class="px-6 py-3">Fecha Préstamo</th>
                        <th scope="col" class="px-6 py-3">Fecha Devolución</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($prestamos)): ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"><td colspan="4" class="px-6 py-4 text-center">No hay transacciones registradas.</td></tr>
                    <?php else: ?>
                        <?php foreach ($prestamos as $p): ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= htmlspecialchars($p->getTituloLibro()) ?></th>
                            <td class="px-6 py-4"><?= htmlspecialchars($p->getNombreUsuario()) ?></td>
                            <td class="px-6 py-4"><?= $p->getFechaPrestamo() ?></td>
                            <td class="px-6 py-4"><?= $p->getFechaDevolucion() ?? '<i>En préstamo</i>' ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modals -->
<div id="add-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-full max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b rounded-t"><h3 class="text-xl font-semibold text-gray-900 dark:text-white">Agregar Nuevo Libro</h3><button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="add-modal">X</button></div>
            <div class="p-4"><form class="space-y-4" action="index.php" method="POST">
                <input type="hidden" name="action" value="agregar">
                <div><label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título</label><input type="text" name="titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required></div>
                <div><label for="autor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Autor</label><input type="text" name="autor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required></div>
                <div><label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label><input type="text" name="categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5">Guardar Libro</button>
            </form></div>
        </div>
    </div>
</div>
<div id="edit-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-full max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b rounded-t"><h3 class="text-xl font-semibold text-gray-900 dark:text-white">Editar Libro</h3><button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="edit-modal">X</button></div>
            <div class="p-4"><form class="space-y-4" action="index.php" method="POST">
                <input type="hidden" name="action" value="editar"><input type="hidden" name="id" id="edit-id">
                <div><label for="edit-titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título</label><input type="text" name="titulo" id="edit-titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required></div>
                <div><label for="edit-autor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Autor</label><input type="text" name="autor" id="edit-autor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required></div>
                <div><label for="edit-categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label><input type="text" name="categoria" id="edit-categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5">Guardar Cambios</button>
            </form></div>
        </div>
    </div>
</div>
<div id="loan-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-full max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b rounded-t"><h3 class="text-xl font-semibold text-gray-900 dark:text-white">Prestar Libro</h3><button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="loan-modal">X</button></div>
            <div class="p-4"><form class="space-y-4" action="index.php" method="POST">
                <input type="hidden" name="action" value="prestar"><input type="hidden" name="id" id="loan-id">
                <div><label for="nombre_usuario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del Solicitante</label><input type="text" name="nombre_usuario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required></div>
                <button type="submit" class="w-full text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5">Confirmar Préstamo</button>
            </form></div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.body.addEventListener('click', function(event) {
        // For Edit Modal
        let button = event.target.closest('[data-modal-toggle="edit-modal"]');
        if (button) {
            const modal = document.getElementById('edit-modal');
            modal.querySelector('#edit-id').value = button.getAttribute('data-id');
            modal.querySelector('#edit-titulo').value = button.getAttribute('data-titulo');
            modal.querySelector('#edit-autor').value = button.getAttribute('data-autor');
            modal.querySelector('#edit-categoria').value = button.getAttribute('data-categoria');
        }

        // For Loan Modal
        button = event.target.closest('[data-modal-toggle="loan-modal"]');
        if (button) {
            const modal = document.getElementById('loan-modal');
            modal.querySelector('#loan-id').value = button.getAttribute('data-id');
        }
    });
});
</script>

</body>
</html>