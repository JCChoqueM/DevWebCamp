<?php

namespace Model;

class Regalo extends ActiveRecord
{
    protected static $tabla = 'regalos';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    // Propiedades de referencia (no son columnas de la BD)
    public $usuario;
    public $paquete;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';

    }
}