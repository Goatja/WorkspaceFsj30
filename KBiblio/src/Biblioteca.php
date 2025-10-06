<?php

namespace KBiblio;

/**
 * Clase Biblioteca
 * Gestiona una colección de libros, permitiendo agregarlos, buscarlos y eliminarlos.
 */
class Biblioteca
{
    /**
     * @var Libro[] Un arreglo que almacena todos los libros en la biblioteca.
     */
    private array $libros = [];

    /**
     * Agrega un nuevo libro a la colección de la biblioteca.
     *
     * @param Libro $libro El objeto Libro a agregar.
     */
    public function agregarLibro(Libro $libro): void
    {
        $this->libros[] = $libro;
    }

    /**
     * Busca libros por su título. No distingue entre mayúsculas y minúsculas.
     *
     * @param string $titulo El título o parte del título a buscar.
     * @return Libro[] Un arreglo de libros que coinciden con la búsqueda.
     */
    public function buscarPorTitulo(string $titulo): array
    {
        return array_filter($this->libros, fn(Libro $libro) => stripos($libro->titulo, $titulo) !== false);
    }

    /**
     * Busca libros por el nombre de su autor. No distingue entre mayúsculas y minúsculas.
     *
     * @param string $autor El autor o parte del nombre del autor a buscar.
     * @return Libro[] Un arreglo de libros que coinciden con la búsqueda.
     */
    public function buscarPorAutor(string $autor): array
    {
        return array_filter($this->libros, fn(Libro $libro) => stripos($libro->autor, $autor) !== false);
    }

    /**
     * Busca libros por su categoría. No distingue entre mayúsculas y minúsculas.
     *
     * @param string $categoria La categoría o parte de la categoría a buscar.
     * @return Libro[] Un arreglo de libros que coinciden con la búsqueda.
     */
    public function buscarPorCategoria(string $categoria): array
    {
        return array_filter($this->libros, fn(Libro $libro) => stripos($libro->categoria, $categoria) !== false);
    }

    /**
     * Busca libros por cualquier campo (título, autor o categoría). No distingue entre mayúsculas y minúsculas.
     *
     * @param string $query El texto a buscar en cualquier campo del libro.
     * @return Libro[] Un arreglo de libros que coinciden con la búsqueda.
     */
    public function buscarPorOtro(string $query): array
    {
        return array_filter($this->libros, fn(Libro $libro) =>
            stripos($libro->titulo, $query) !== false ||
            stripos($libro->autor, $query) !== false ||
            stripos($libro->categoria, $query) !== false
        );
    }

    /**
     * Obtiene todos los libros actualmente en la biblioteca.
     *
     * @return Libro[] Un arreglo con todos los libros.
     */
    public function obtenerTodosLosLibros(): array
    {
        return $this->libros;
    }

    /**
     * Elimina un libro de la biblioteca usando su título como referencia.
     *
     * @param string $titulo El título del libro a eliminar.
     */
    public function eliminarLibroPorTitulo(string $titulo): void
    {
        $this->libros = array_filter($this->libros, fn(Libro $libro) => $libro->titulo !== $titulo);
    }

    /**
     * Cuenta la cantidad total de libros en la biblioteca.
     *
     * @return int El número de libros.
     */
    public function count(): int
    {
        return count($this->libros);
    }
}
