<?php

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}

$users_count = isset($_SESSION['users']) ? count($_SESSION['users']) : 0;
$libros_count = isset($_SESSION['libros']) ? count($_SESSION['libros']) : 0;

?>

<!DOCTYPE html>
<html lang="es-SV">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>style.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    <title>Dashboard</title>
</head>
<body>

<header>
    <?php require_once __DIR__ . '/../components/navbar.php'; ?> 
</header>

<main>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex items-center justify-center h-24 rounded-sm bg-gray-50 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        Usuarios totales: <?php echo $users_count; ?>
                    </p>
                </div>
                <div class="flex items-center justify-center h-24 rounded-sm bg-gray-50 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        Libros totales: <?php echo $libros_count; ?>
                    </p>
                </div>
                <div class="flex items-center justify-center h-24 rounded-sm bg-gray-50 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                        </svg>
                    </p>
                </div>
            </div>
            <div class="flex items-center justify-center h-48 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                some
            </div>

        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>