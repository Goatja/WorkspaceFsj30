<?php
class Biblioteca {
    private $libros = [];
    private $prestamos = [];

    public function __construct() {
        // Cargar datos de la sesión a propiedades privadas
        $this->libros = $_SESSION['libros'] ?? [];
        $this->prestamos = $_SESSION['prestamos'] ?? [];

        // Si no hay libros, inicializar con datos de ejemplo
        if (empty($this->libros)) {
            $this->libros = [
                new Libro(uniqid(), 'El Señor de los Anillos', 'J.R.R. Tolkien', 'Fantasía', 'disponible'),
                new Libro(uniqid(), 'Cien Años de Soledad', 'Gabriel García Márquez', 'Realismo Mágico', 'prestado'),
                new Libro(uniqid(), '1984', 'George Orwell', 'Distopía', 'disponible'),
            ];
        }
    }

    public function __destruct() {
        // Guardar datos de las propiedades privadas de vuelta a la sesión
        $_SESSION['libros'] = $this->libros;
        $_SESSION['prestamos'] = $this->prestamos;
    }

    public function getLibros() {
        return $this->libros;
    }

    public function getPrestamos() {
        return array_reverse($this->prestamos); // Mostrar los más recientes primero
    }

    public function buscarLibros($termino) {
        if (empty($termino)) {
            return $this->getLibros();
        }
        $resultado = [];
        foreach ($this->libros as $libro) {
            if (stripos($libro->getTitulo(), $termino) !== false || 
                stripos($libro->getAutor(), $termino) !== false ||
                stripos($libro->getCategoria(), $termino) !== false) {
                $resultado[] = $libro;
            }
        }
        return $resultado;
    }

    public function agregarLibro($titulo, $autor, $categoria) {
        $id = uniqid();
        $nuevoLibro = new Libro($id, $titulo, $autor, $categoria);
        $this->libros[] = $nuevoLibro;
    }

    public function getLibroPorId($id) {
        foreach ($this->libros as $libro) {
            if ($libro->getId() == $id) {
                return $libro;
            }
        }
        return null;
    }

    public function editarLibro($id, $titulo, $autor, $categoria) {
        $libro = $this->getLibroPorId($id);
        if ($libro) {
            $libro->setTitulo($titulo);
            $libro->setAutor($autor);
            $libro->setCategoria($categoria);
        }
    }

    public function eliminarLibro($id) {
        $libro = $this->getLibroPorId($id);
        if ($libro && $libro->getEstado() === 'prestado') {
            return; // No eliminar un libro prestado
        }

        $this->libros = array_filter($this->libros, function($libro) use ($id) {
            return $libro->getId() != $id;
        });
        $this->libros = array_values($this->libros); // Re-indexar array
    }

    public function prestarLibro($id_libro, $nombre_usuario) {
        $libro = $this->getLibroPorId($id_libro);
        if ($libro && $libro->prestar()) { // Usar el nuevo método de estado
            $prestamo = new Prestamo($id_libro, $libro->getTitulo(), $nombre_usuario);
            $this->prestamos[] = $prestamo;
            return true;
        }
        return false;
    }

    public function devolverLibro($id_libro) {
        $libro = $this->getLibroPorId($id_libro);
        if ($libro && $libro->devolver()) { // Usar el nuevo método de estado
            foreach (array_reverse($this->prestamos) as $prestamo) {
                if ($prestamo->getIdLibro() === $id_libro && $prestamo->getFechaDevolucion() === null) {
                    $prestamo->setFechaDevolucion();
                    break;
                }
            }
            return true;
        }
        return false;
    }
}
?>