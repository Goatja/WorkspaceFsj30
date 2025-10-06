<?php

namespace KBiblio;

/**
 * Clase Libro
 * Representa un libro individual con sus características básicas.
 */
class Libro
{
    /**
     * @var string El título del libro.
     */
    public string $titulo;

    /**
     * @var string El autor del libro.
     */
    public string $autor;

    /**
     * @var string La categoría o género al que pertenece el libro.
     */
    public string $categoria;

    /**
     * Constructor de la clase Libro.
     *
     * @param string $titulo El título del libro.
     * @param string $autor El autor del libro.
     * @param string $categoria La categoría del libro.
     */
    public function __construct(string $titulo, string $autor, string $categoria)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->categoria = $categoria;
    }
}
