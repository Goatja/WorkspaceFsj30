<?php
if (!isset($_SESSION['initialized'])) {
    $_SESSION['users'] = [
        [
            'id' => 1,
            'email' => 'user@example.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'user'
        ]
    ];
    $_SESSION['autores'] = [
        ['id' => 1, 'nombre' => 'Miguel de Cervantes', 'biografia' => 'Escritor español'],
        ['id' => 2, 'nombre' => 'Gabriel García Márquez', 'biografia' => 'Escritor colombiano']
    ];
    $_SESSION['categorias'] = [
        ['id' => 1, 'nombre' => 'Novela'],
        ['id' => 2, 'nombre' => 'Realismo mágico']
    ];
    $_SESSION['libros'] = [
        ['id' => 1, 'titulo' => 'Don Quijote de la Mancha', 'autor_id' => 1, 'categoria_id' => 1, 'estado' => 'disponible'],
        ['id' => 2, 'titulo' => 'Cien años de soledad', 'autor_id' => 2, 'categoria_id' => 2, 'estado' => 'prestado']
    ];
    $_SESSION['initialized'] = true;
}
?>