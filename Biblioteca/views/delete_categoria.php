<?php

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}

$id = $_GET['id'];

foreach ($_SESSION['categorias'] as $key => $categoria) {
    if ($categoria['id'] == $id) {
        unset($_SESSION['categorias'][$key]);
        break;
    }
}

header('Location: /categorias');
exit();
?>