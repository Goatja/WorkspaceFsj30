<?php
class Libro {
    private $id;
    private $titulo;
    private $autor;
    private $categoria;
    private $estado; // disponible, prestado

    public function __construct($id, $titulo, $autor, $categoria, $estado = 'disponible') {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->categoria = $categoria;
        $this->estado = $estado;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getTitulo() { return $this->titulo; }
    public function getAutor() { return $this->autor; }
    public function getCategoria() { return $this->categoria; }
    public function getEstado() { return $this->estado; }

    // Setters
    public function setTitulo($titulo) { $this->titulo = $titulo; }
    public function setAutor($autor) { $this->autor = $autor; }
    public function setCategoria($categoria) { $this->categoria = $categoria; }

    // Métodos para controlar el estado
    public function prestar() {
        if ($this->getEstado() === 'disponible') {
            $this->estado = 'prestado';
            return true;
        }
        return false;
    }

    public function devolver() {
        if ($this->getEstado() === 'prestado') {
            $this->estado = 'disponible';
            return true;
        }
        return false;
    }
}
?>