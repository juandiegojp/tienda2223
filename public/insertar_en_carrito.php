<?php
require '../src/Carrito.php';
require '../src/auxiliar.php';

session_start();

try {
    $id = obtener_get('id');
    
} catch (\Throwable $th) {
    //throw $th;
}