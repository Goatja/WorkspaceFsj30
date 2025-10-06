<?php
class Prestamo {
    private $id_libro;
    private $titulo_libro;
    private $nombre_usuario;
    private $fecha_prestamo;
    private $fecha_devolucion;

    public function __construct($id_libro, $titulo_libro, $nombre_usuario) {
        $this->id_libro = $id_libro;
        $this->titulo_libro = $titulo_libro;
        $this->nombre_usuario = $nombre_usuario;
        $this->fecha_prestamo = date('Y-m-d H:i:s');
        $this->fecha_devolucion = null;
    }

    // Getters
    public function getIdLibro() { return $this->id_libro; }
    public function getTituloLibro() { return $this->titulo_libro; }
    public function getNombreUsuario() { return $this->nombre_usuario; }
    public function getFechaPrestamo() { return $this->fecha_prestamo; }
    public function getFechaDevolucion() { return $this->fecha_devolucion; }

    // Setter
    public function setFechaDevolucion() {
        $this->fecha_devolucion = date('Y-m-d H:i:s');
    }
}
?>