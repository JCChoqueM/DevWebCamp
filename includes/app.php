<?php

require __DIR__ . '/../vendor/autoload.php';

// Iniciar la sesión una sola vez, antes de cualquier salida
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cargar .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

require 'funciones.php';
require 'database.php';

// Conectarnos a la base de datos
use Model\ActiveRecord;
ActiveRecord::setDB($db);