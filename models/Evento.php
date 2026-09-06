<?php

namespace Model;

class Evento extends ActiveRecord
{
    protected static $tabla = 'eventos';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'disponibles', 'categoria_id', 'dia_id', 'hora_id', 'ponente_id'];

    public $id;
    public $nombre;
    public $descripcion;
    public $disponibles;
    public $categoria_id;
    public $dia_id;
    public $hora_id;
    public $ponente_id;
    public $categoria;  // ← Ya tenías esto
    public $dia;        // ← Añade esto
    public $hora;       // ← Añade esto
    public $ponente;    // ← Añade esto

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->disponibles = $args['disponibles'] ?? '';
        $this->categoria_id = $args['categoria_id'] ?? '';
        $this->dia_id = $args['dia_id'] ?? '';
        $this->hora_id = $args['hora_id'] ?? '';
        $this->ponente_id = $args['ponente_id'] ?? '';
        $this->categoria = null;
        $this->dia = null;      // ← Añade esto
        $this->hora = null;     // ← Añade esto
        $this->ponente = null;  // ← Añade esto
    }

    // ... resto del código
}